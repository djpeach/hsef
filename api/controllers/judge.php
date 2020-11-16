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
       JS.JudgingSessionId as sessionId,
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
    $resBody = [];

    $query = "SELECT O.OperatorId, O.Title, O.HighestDegree, 
       O.Employer, U.UserId, U.FirstName, U.LastName, U.Suffix, 
       U.Gender, U.Status, U.CheckedIn, U.Email 
FROM Operator O 
    JOIN OperatorEntitlement OE on O.OperatorId = OE.OperatorId
    JOIN Entitlement E on OE.EntitlementId = E.EntitlementId
    JOIN UserYear UY on O.UserYearId = UY.UserYearId 
    JOIN User U on UY.UserId = U.UserId 
WHERE E.Name = 'judge'
  AND U.Status = 'active'
  AND UY.Year = YEAR(CURRENT_TIMESTAMP)";

    $sql = DB::get()->prepare($query);

    execOrError($sql->execute([]), new DatabaseError("Failed to retrieve judges"));

    // Finalize (build/transform/filter) response if needed
    $judges = $sql->fetchAll();
    if (!$judges) {
      throw new UserNotFound("No judges could be found");
    }
    $resBody["count"] = count($judges);
    $resBody["results"] = array_map(function($admin) {
      return filterNullCamelCaseKeys($admin);
    }, $judges);

    // Send response
    $app->res->json($resBody);
  };
}

function listPotentialJudges(Slim\Slim $app) {
  return function() use ($app) {
    // initialize response and request parameters
    $resBody = [];

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
AND UY.Year = YEAR(CURRENT_TIMESTAMP)";

    $sqlParams = [];

    $sql = DB::get()->prepare($query);

    execOrError($sql->execute($sqlParams), new DatabaseError("Failed to retrieve judges"));

    // Finalize (build/transform/filter) response if needed
    $judges = $sql->fetchAll();
    if (!$judges) {
      throw new UserNotFound("No potential judges could be found");
    }
    $resBody["count"] = count($judges);
    $resBody["results"] = array_map(function($admin) {
      return filterNullCamelCaseKeys($admin);
    }, $judges);

    // Send response
    $app->res->json($resBody);
  };
}