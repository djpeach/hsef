<?php

// CREATE
function createJudgeFromExisting($app) {
  return function() use ($app) {
    echo "Added judge entitlement to existing user";
  };
}

function createNewJudge(Slim\Slim $app) {
  return function() use ($app) {
    // initialize response and request parameters
    $reqBody = $app->req->jsonBody();
    $user = valueOrError($reqBody->user, "You must provide a user object on the request object");
    $operator = valueOrDefault($reqBody->operator, new EmptyObject());
    $judge = valueOrDefault($reqBody->judge, new EmptyObject());
    $resBody = [];

    // Additional request parameter validation if needed

    // DB Logic (build response meanwhile if needed)
    // Check for existing user with email
    $sql = DB::get()->prepare("SELECT 1 FROM User JOIN UserYear UY on User.UserId = UY.UserId WHERE Email = ? AND UY.Year = YEAR(CURRENT_TIMESTAMP)");
    execOrError($sql->execute([
      valueOrError($user->email, new BadRequest("email cannot be null or blank")),
    ]), new DatabaseError("Failed to lookup user with email: {$user->email}", 502));
    if ($sql->fetch()) {
      throw new ResourceConflict("A user this year with that email: {$user->email} already exists");
    }

    // Create User
    $sql = DB::get()->prepare("INSERT INTO User(FirstName, LastName, Suffix, Gender, Status, CheckedIn, Email) VALUES(?, ?, ?, ?, ?, ?, ?)");
    execOrError($sql->execute([
      valueOrError($user->firstName, new BadRequest("firstName cannot be null or blank")),
      valueOrError($user->lastName, new BadRequest("lastName cannot be null or blank")),
      valueOrNull($user->suffix),
      valueOrNull($user->gender),
      valueOrDefault($user->suffix, 'active'),
      funcOrNull($user->suffix, function($el) { return $el ? 1 : 0; }),
      valueOrError($user->email, new BadRequest("email cannot be null or blank")),
    ]), new DatabaseError("Failed to create new user", 502));

    $userId = DB::get()->lastInsertId();
    $resBody["userId"] = $userId;

    // Create UserYear Record
    $sql = DB::get()->prepare("INSERT INTO UserYear(Year, UserId) VALUES (YEAR(CURRENT_TIMESTAMP), ?)");
    execOrError($sql->execute([
      valueOrError($userId, new ApiException("Id for user record not found", 500))
    ]), new DatabaseError("Failed to create new user year record", 502));

    $userYearId = DB::get()->lastInsertId();

    // Create Operator
    $sql = DB::get()->prepare("INSERT INTO Operator(Title, HighestDegree, Employer, UserYearId) VALUES(?, ?, ?, ?)");
    execOrError($sql->execute([
      valueOrNull($operator->title),
      valueOrNull($operator->highestDegree),
      valueOrNull($operator->employer),
      valueOrError($userYearId, new ApiException("Id for user year record not found", 500))
    ]), new DatabaseError("Failed to create new operator", 502));

    $operatorId = DB::get()->lastInsertId();
    $resBody["operatorId"] = $operatorId;

    // Add judge entitlement
    $sql = DB::get()->prepare("INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES(?, (SELECT EntitlementId FROM Entitlement WHERE Name=?))");
    execOrError($sql->execute([
      valueOrError($operatorId, new ApiException("Id for operator record not found", 500)),
      "judge"
    ]), new DatabaseError("Failed to add judge entitlement to operator", 502));

    // Add category preferences
    if (isset($judge->categoryPreferenceIds)) {
      foreach ($judge->categoryPreferenceIds as $catId) {
        $sql = DB::get()->prepare("INSERT INTO OperatorCategory(OperatorId, CategoryId) VALUES(?, ?)");
        execOrError($sql->execute([ $operatorId, $catId ]), new DatabaseError("Failed to add category id: $catId to operator"));
      }
    }

    // Add grade level preferences
    if (isset($judge->gradeLevelPreferenceIds)) {
      foreach ($judge->gradeLevelPreferenceIds as $gradeLevelId) {
        $sql = DB::get()->prepare("INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) VALUES(?, ?)");
        execOrError($sql->execute([ $operatorId, $gradeLevelId ]), new DatabaseError("Failed to add category id: $gradeLevelId to operator"));
      }
    }

    // Finalize (build/transform/filter) response if needed

    // Send response
    $app->res->json($resBody);
  };
}

function generateSchedules(Slim\Slim $app) {
  return function() use ($app) {
    $resBody = [];

    $query = "SELECT * FROM Operator 
    JOIN UserYear UY on Operator.UserYearId = UY.UserYearId 
    JOIN User U on UY.UserId = U.UserId 
    JOIN OperatorEntitlement OE on Operator.OperatorId = OE.OperatorId 
    JOIN Entitlement E on E.EntitlementId = OE.EntitlementId 
WHERE UY.Year = YEAR(CURRENT_TIMESTAMP) 
  AND E.Name = 'judge'
  AND U.Status = 'active'";
    $judges = DB::get()->query($query)->fetchAll();
    $query = "SELECT * FROM Project 
    JOIN Booth B on B.BoothId = Project.BoothId 
    JOIN Student S on Project.ProjectId = S.ProjectId 
    JOIN Category C on Project.CategoryId = C.CategoryId 
    JOIN GradeLevel GL on S.GradeLevelId = GL.GradeLevelId 
    JOIN User U on S.UserId = U.UserId
    JOIN UserYear UY on S.UserId = UY.UserId";
    $projects = DB::get()->query($query)->fetchAll();

    $ji = 0;
    $maxJudgeIndex = count($judges) - 1;
    $startTime = DateTime::createFromFormat('H:i:s', '09:00:00');
    $endTime = DateTime::createFromFormat('H:i:s', '09:10:00');

    foreach ($projects as $project) {
      if ($ji > $maxJudgeIndex) {
        $ji = 0;
      }
      $sql = DB::get()->prepare("INSERT INTO JudgingSession(ProjectId, OperatorId, StartTime, EndTime) VALUES (?, ?, ?, ?)");

      $sql->execute([$project["ProjectId"], $judges[$ji]["OperatorId"], $startTime->format('H:i:s'), $endTime->format('H:i:s')]);
      $startTime->modify('+15 minutes');
      $endTime->modify('+15 minutes');

      $ji += 1;
    }

    $app->res->json($resBody);
  };
}

// READ
function getJudgeByOpId(Slim\Slim $app) {
  return function($id) use ($app) {
    // Initialize response and request parameters
    $resBody = [];

    // Additional request validation if needed

    // DB Logic (build response meanwhile if needed)
    $query = "SELECT O.OperatorId, O.Title, O.HighestDegree, 
       O.Employer, U.UserId, U.FirstName, U.LastName, U.Suffix, 
       U.Gender, U.Status, U.CheckedIn, U.Email 
FROM Operator O 
    JOIN OperatorEntitlement OE on O.OperatorId = OE.OperatorId
    JOIN Entitlement E on OE.EntitlementId = E.EntitlementId
    JOIN UserYear UY on O.UserYearId = UY.UserYearId 
    JOIN User U on UY.UserId = U.UserId 
WHERE E.Name = 'judge'
  AND O.OperatorId = ?";
    $sql = DB::get()->prepare($query);
    execOrError($sql->execute([
      valueOrError($id,  new ApiException("id does not exist", 500))
    ]), new DatabaseError("Error while trying to find judge with id: $id", 502));

    $judge = $sql->fetch();
    if (!$judge) {
      throw new UserNotFound("An judge with the id: $id could not be found");
    }
    $opid = $judge['OperatorId'];

    $resBody["result"] = filterNullCamelCaseKeys($judge);

    // get categoryPreferences
    $sql = DB::get()->prepare("SELECT C.CategoryId, C.Name FROM Category C 
    JOIN OperatorCategory OC on C.CategoryId = OC.CategoryId WHERE OC.OperatorId = ?");
    execOrError($sql->execute([$opid]), new DatabaseError("Could not fetch category ids for judge with opid: $opid"));
    $categories = $sql->fetchAll();
    if ($categories) {
      $resBody["judge"]["categoryPreferences"] = array_map(function($category) {
        return filterNullCamelCaseKeys($category);
      }, $categories);
    }

    // get gradeLevelPreferences
    $sql = DB::get()->prepare("SELECT GL.GradeLevelId, GL.Name FROM GradeLevel GL
    JOIN OperatorGradeLevel OGL on GL.GradeLevelId = OGL.GradeLevelId WHERE OGL.OperatorId = ?");
    execOrError($sql->execute([$opid]), new DatabaseError("Could not fetch category ids for judge with opid: $opid"));
    $gradeLevels = $sql->fetchAll();
    if ($gradeLevels) {
      $resBody["judge"]["gradeLevelPreferences"] = array_map(function($gradeLevel) {
        return filterNullCamelCaseKeys($gradeLevel);
      }, $gradeLevels);
    }

    // Finalize (build/transform/filter) response if needed

    // Send response
    $app->res->json($resBody);
  };
}

function getJudgeScheduleByOpid(Slim\Slim $app) {
  return function($opid) use ($app) {
    $resBody = [
      "sessions" => [],
    ];

    $query = "SELECT 
       JS.StartTime as startTime, 
       B.Number as boothNumber, 
       P.Name as projectName, 
       P.ProjectId as projectId, 
       JS.RawScore as currentScore
FROM JudgingSession JS 
    JOIN Project P on JS.ProjectId = P.ProjectId 
    JOIN Booth B on B.BoothId = P.BoothId 
WHERE JS.OperatorId = ?";
    $sql = DB::get()->prepare($query);
    $sql->execute([$opid]);

    $sessions = $sql->fetchAll();

    $resBody["sessions"] = $sessions;

    $app->res->json($resBody);
  };
}

// UPDATE
function updateJudgeByOpId(Slim\Slim $app) {
  return function() use ($app) {
    echo "updated judge";
  };
}

// DELETE
function deleteJudgeByOpId(Slim\Slim $app) {
  return function() use ($app) {
    echo "deleted judge";
  };
}

// LIST
function listJudges(Slim\Slim $app) {
  return function() use ($app) {
    // initialize response and request parameters
    $reqParams = valueOrDefault($app->req->jsonParams(), new EmptyObject());
    $year = valueOrDefault($reqParams->year, date("Y"));
    $status = valueOrDefault($reqParams->status, 'active');
    $searchTerm = valueOrNull($reqParams->t);
    $limit = valueOrDefault($reqParams->limit, 10);
    $offset = valueOrDefault($reqParams->offset, 0);
    $resBody = [
      "links" => [
        "base" => $app->req->getUrl().$app->req->getPath(),
      ],
      "limit" => $limit,
      "offset" => $offset
    ];

    // Additional request parameter validation if needed
    if ($limit < 0) {
      throw new BadRequest("limit cannot be negative");
    }
    if ($offset < 0) {
      throw new BadRequest("offset cannot be negative");
    }
    if (strlen($year) !== 4) {
      throw new BadRequest("year must be in the format YYYY");
    }
    if (!in_array($status, ['active', 'registered', 'invited', 'archived'])) {
      throw new BadRequest("status must be one of ['active', 'registered', 'invited', 'archived']");
    }

    $query = "SELECT O.OperatorId, O.Title, O.HighestDegree, 
       O.Employer, U.UserId, U.FirstName, U.LastName, U.Suffix, 
       U.Gender, U.Status, U.CheckedIn, U.Email 
FROM Operator O 
    JOIN OperatorEntitlement OE on O.OperatorId = OE.OperatorId
    JOIN Entitlement E on OE.EntitlementId = E.EntitlementId
    JOIN UserYear UY on O.UserYearId = UY.UserYearId 
    JOIN User U on UY.UserId = U.UserId 
WHERE E.Name = 'judge'
  AND U.Status = ?
  AND UY.Year = ?";

    $sqlParams = [
      valueOrError($status, new ApiException("status does not exist", 500)),
      valueOrError($year, new ApiException("year does not exist", 500))
    ];

    if (isset($searchTerm)) {
      $query .= " AND U.FirstName LIKE ? OR U.LastName LIKE ?";
      array_push($sqlParams, "%$searchTerm%");
      array_push($sqlParams, "%$searchTerm%");
    }

    $query .= " LIMIT ? OFFSET ?";
    // get $limit+1 results to determine if more can be fetched after this
    array_push($sqlParams, valueOrError($limit+1, new ApiException("limit does not exist", 500)));
    array_push($sqlParams, valueOrError($offset, new ApiException("offset does not exist", 500)));

    $sql = DB::get()->prepare($query);

    execOrError($sql->execute($sqlParams), new DatabaseError("Failed to retrieve $limit admins with offset $offset"));

    // Finalize (build/transform/filter) response if needed
    $admins = $sql->fetchAll();
    if ($admins) {
      if ($offset > 0) {
        // add prev url
        $prevOffset = max(0, $offset - $limit);
        $prevLimit = min($limit, $offset);
        $prevUrl = "{$app->req->getUrl()}{$app->req->getPath()}?limit=$prevLimit&offset=$prevOffset";
        $prevUrl .= isset($searchTerm) ? "&t=$searchTerm" : "";
        $prevUrl .= isset($year) ? "&year=$year" : "";
        $prevUrl .= isset($status) ? "&status=$status" : "";
        $resBody["links"]["prev"] = $prevUrl;
      }
      if (count($admins) > $limit) {
        // remove last [sentry] admin and return $limit admins only
        // add next url
        array_pop($admins);
        $nextOffset = $offset + $limit;
        $nextUrl = "{$app->req->getUrl()}{$app->req->getPath()}?limit=$limit&offset=$nextOffset";
        $nextUrl .= isset($searchTerm) ? "&t=$searchTerm" : "";
        $nextUrl .= isset($year) ? "&year=$year" : "";
        $nextUrl .= isset($status) ? "&status=$status" : "";
        $resBody["links"]["next"] = $nextUrl;
      }
    } else {
      throw new UserNotFound("No admins with the year: $year, status: '$status', and query: $searchTerm could be found");
    }
    $resBody["count"] = count($admins);
    $resBody["results"] = array_map(function($admin) {
      return filterNullCamelCaseKeys($admin);
    }, $admins);

    // Send response
    $app->res->json($resBody);
  };
}

function listPotentialJudges(Slim\Slim $app) {
  return function() use ($app) {
    // initialize response and request parameters
    $reqParams = valueOrDefault($app->req->jsonParams(), new EmptyObject());
    $year = valueOrDefault($reqParams->year, date("Y"));
    $status = valueOrDefault($reqParams->status, 'active');
    $searchTerm = valueOrNull($reqParams->t);
    $limit = valueOrDefault($reqParams->limit, 10);
    $offset = valueOrDefault($reqParams->offset, 0);
    $resBody = [
      "links" => [
        "base" => $app->req->getUrl().$app->req->getPath(),
      ],
      "limit" => $limit,
      "offset" => $offset
    ];

    // Additional request parameter validation if needed
    if ($limit < 0) {
      throw new BadRequest("limit cannot be negative");
    }
    if ($offset < 0) {
      throw new BadRequest("offset cannot be negative");
    }
    if (strlen($year) !== 4) {
      throw new BadRequest("year must be in the format YYYY");
    }
    if (!in_array($status, ['active', 'registered', 'invited', 'archived'])) {
      throw new BadRequest("status must be one of ['active', 'registered', 'invited', 'archived']");
    }

    $query = "SELECT O.OperatorId, O.Title, O.HighestDegree, 
       O.Employer, U.UserId, U.FirstName, U.LastName, U.Suffix, 
       U.Gender, U.Status, U.CheckedIn, U.Email
FROM User U
    JOIN UserYear UY on U.UserId = UY.UserId
    LEFT JOIN Operator O on UY.UserYearId = O.UserYearId
WHERE (O.OperatorId IS NULL
OR O.OperatorId NOT IN (SELECT O2.OperatorId FROM Operator O2
        JOIN OperatorEntitlement OE on O2.OperatorId = OE.OperatorId
        JOIN Entitlement E on OE.EntitlementId = E.EntitlementId
    WHERE E.Name = 'judge'))
AND U.Status = ?
AND UY.Year = ?";

    $sqlParams = [
      valueOrError($status, new ApiException("status does not exist", 500)),
      valueOrError($year, new ApiException("year does not exist", 500))
    ];

    if (isset($searchTerm)) {
      $query .= " AND U.FirstName LIKE ? OR U.LastName LIKE ?";
      array_push($sqlParams, "%$searchTerm%");
      array_push($sqlParams, "%$searchTerm%");
    }

    $query .= " LIMIT ? OFFSET ?";
    // get $limit+1 results to determine if more can be fetched after this
    array_push($sqlParams, valueOrError($limit+1, new ApiException("limit does not exist", 500)));
    array_push($sqlParams, valueOrError($offset, new ApiException("offset does not exist", 500)));

    $sql = DB::get()->prepare($query);

    execOrError($sql->execute($sqlParams), new DatabaseError("Failed to retrieve $limit admins with offset $offset"));

    // Finalize (build/transform/filter) response if needed
    $admins = $sql->fetchAll();
    if ($admins) {
      if ($offset > 0) {
        // add prev url
        $prevOffset = max(0, $offset - $limit);
        $prevLimit = min($limit, $offset);
        $resBody["links"]["prev"] = "{$app->req->getUrl()}{$app->req->getPath()}?limit=$prevLimit&offset=$prevOffset";
      }
      if (count($admins) > $limit) {
        // remove last [sentry] admin and return $limit admins only
        // add next url
        array_pop($admins);
        $nextOffset = $offset + $limit;
        $resBody["links"]["next"] = "{$app->req->getUrl()}{$app->req->getPath()}?limit=$limit&offset=$nextOffset";
      }
    } else {
      throw new UserNotFound("No potential admins with the year: $year, status: '$status', and query: $searchTerm could be found");
    }
    $resBody["count"] = count($admins);
    $resBody["results"] = array_map(function($admin) {
      return filterNullCamelCaseKeys($admin);
    }, $admins);

    // Send response
    $app->res->json($resBody);
  };
}