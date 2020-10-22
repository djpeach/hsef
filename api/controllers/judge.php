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
    $operator = valueOrDefault($reqBody->operator, new stdClass());
    $judge = valueOrDefault($reqBody->judge, new stdClass());
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
    echo "got judges";
  };
}

function listPotentialJudges(Slim\Slim $app) {
  return function() use ($app) {
    echo "got judges";
  };
}