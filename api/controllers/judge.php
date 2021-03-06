<?php

require_once __DIR__."/../utils.php";

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
    $resBody = [];

    // Additional request parameter validation if needed

    // DB Logic (build response meanwhile if needed)
    // Check for existing user with email
    $sql = DB::get()->prepare("SELECT 1 FROM User JOIN UserYear UY on User.UserId = UY.UserId WHERE Email = ? AND UY.Year = YEAR(CURRENT_TIMESTAMP)");
    execOrError($sql->execute([
      valueOrError($reqBody['email'], new BadRequest("email cannot be null or blank")),
    ]), new DatabaseError("Failed to lookup user with email: {$reqBody['email']}", 502));
    if ($sql->fetch()) {
      throw new ResourceConflict("A user this year with that email: {$reqBody['email']} already exists");
    }

    // Create User
    $sql = DB::get()->prepare("INSERT INTO User(FirstName, LastName, Suffix, Gender, Status, CheckedIn, Email) VALUES(?, ?, ?, ?, ?, ?, ?)");
    execOrError($sql->execute([
      valueOrError($reqBody['firstName'], new BadRequest("firstName cannot be null or blank")),
      valueOrError($reqBody['lastName'], new BadRequest("lastName cannot be null or blank")),
      null,
      valueOrNull($reqBody['gender']),
      'active',
      0,
      valueOrError($reqBody['email'], new BadRequest("email cannot be null or blank")),
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
      valueOrNull($reqBody['title']),
      valueOrNull($reqBody['highestDegree']),
      valueOrNull($reqBody['employer']),
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
//    if (isset($judge->categoryPreferenceIds)) {
//      foreach ($judge->categoryPreferenceIds as $catId) {
//        $sql = DB::get()->prepare("INSERT INTO OperatorCategory(OperatorId, CategoryId) VALUES(?, ?)");
//        execOrError($sql->execute([ $operatorId, $catId ]), new DatabaseError("Failed to add category id: $catId to operator"));
//      }
//    }

    // Add grade level preferences
//    if (isset($judge->gradeLevelPreferenceIds)) {
//      foreach ($judge->gradeLevelPreferenceIds as $gradeLevelId) {
//        $sql = DB::get()->prepare("INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) VALUES(?, ?)");
//        execOrError($sql->execute([ $operatorId, $gradeLevelId ]), new DatabaseError("Failed to add category id: $gradeLevelId to operator"));
//      }
//    }

    // Finalize (build/transform/filter) response if needed

    // email judge
    $to = $reqBody['email'];
    $subject = 'HSEF judging assignment';
    $message = "
<html>
<head>
  <title>Assigned to judge at HSEF</title>
</head>
<body>
  <p>You have been made a judge as HSEF</p>
  <p>Click the link below to go to the login form. Then select 'Forgot Password' in order to create your auth account and set a password.</p>
  <a href='http://corsair.cs.iupui.edu:24631/hsef'>Login Page</a>
</body>
</html>
";

    $headers = array("From: webmaster@hsef.org",
      "Reply-To: djpeach@iu.edu",
      "X-Mailer: PHP/" . PHP_VERSION,
      'Content-type: text/html; charset=iso-8859-1',
      'MIME-Version: 1.0',
      "To: {$reqBody['email']}"
    );

    if (!mail($to, $subject, $message, implode("\r\n", $headers))) {
      throw new ApiException("Failed to send judge welcome email");
    } else {
      echo "sent email to {$reqBody['email']}";
    }

    // Send response
    $app->res->json($resBody);
  };
}

function createPublicJudge(Slim\Slim $app) {
  return function() use ($app) {
    $reqBody = json_decode($app->req->getBody(), true);

    // see if judge from previous year exists. If so, create new userYear record and change status to pending
    $sql = DB::get()->prepare("SELECT * FROM User U WHERE Email = ?");
    $sql->execute([valueOrError($reqBody["email"], new BadRequest("must provide email"))]);
    execOrError($sql->execute([
      valueOrError($reqBody["email"], new BadRequest("must provide email")),
    ]), new DatabaseError("Error while attempting to fetch existing user during public judge registration"));

    $existingUser = $sql->fetch(PDO::FETCH_OBJ);
    if ($existingUser) {
      $sql = DB::get()->prepare("INSERT INTO UserYear(Year, UserId) VALUES (YEAR(CURRENT_TIMESTAMP), ?)");
      execOrError($sql->execute([$existingUser->UserId]), new DatabaseError("Error while attempting to create new user year record during public judge registration"));

      $sql = DB::get()->prepare("UPDATE User SET Status = 'pending' WHERE UserId = ?");
      execOrError($sql->execute([$existingUser->UserId]), new DatabaseError("Error while attempting to change user status to pending during public judge registration"));
    } else {
      // create new user record
      $sql = DB::get()->prepare("INSERT INTO User(FirstName, LastName, Suffix, Gender, Status, Email) VALUES (?, ?, ?, ?, ?, ?)");
      execOrError($sql->execute([
        valueOrError($reqBody["firstName"], new BadRequest("Must provide a value for firstName")),
        valueOrError($reqBody["lastName"], new BadRequest("Must provide a value for lastName")),
        valueOrNull($reqBody["suffix"]),
        valueOrNull($reqBody["gender"]),
        "registered",
        valueOrError($reqBody["email"], new BadRequest("Must provide a value for email")),
      ]), new DatabaseError("Error while attempting to create new user record during public judge registration"));
      $userId = DB::get()->lastInsertId();

      // create new user year record
      $sql = DB::get()->prepare("INSERT INTO UserYear(Year, UserId) VALUES (YEAR(CURRENT_TIMESTAMP), ?)");
      execOrError($sql->execute([
        valueOrError($userId, new DatabaseError("Could not get userId for newly created user record")),
      ]), new DatabaseError("Error while attempting to create new user year record during public judge registration"));
      $userYearId = DB::get()->lastInsertId();

      // create new operator record
      $sql = DB::get()->prepare("INSERT INTO Operator(Title, HighestDegree, Employer, UserYearId) VALUES (?, ?, ?, ?)");
      execOrError($sql->execute([
        valueOrNull($reqBody["title"]),
        valueOrNull($reqBody["highestDegree"]),
        valueOrNull($reqBody["employer"]),
        valueOrError($userYearId, new DatabaseError("Could not get userYearId for newly created user year record"))
      ]), new DatabaseError("Error while attempting to create new operator record during public judge registration"));
      $opid = DB::get()->lastInsertId();

      // add judge entitlement
      $sql = DB::get()->prepare("REPLACE INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (?, (SELECT EntitlementId FROM Entitlement WHERE Name = 'judge'))");
      execOrError($sql->execute([$opid]), new DatabaseError("Error while adding judge entitlement to operator during judge approval"));
    }




    // else, create a new user, and userYear record. set status to pending
    echo 'hey';
  };
}

function savePreferences(Slim\Slim $app) {
  return function($opid) use ($app) {
    $reqBody = $app->req->jsonBody();

    foreach ($reqBody['categories'] as $catId) {
      $sql = DB::get()->prepare("REPLACE INTO OperatorCategory(OperatorId, CategoryId) VALUES (?, ?)");
      $sql->execute([$opid, $catId]);
    }

    foreach ($reqBody['gradeLevels'] as $glId) {
      $sql = DB::get()->prepare("REPLACE INTO OperatorGradeLevel(OperatorId, GradeLevelId) VALUES (?, ?)");
      $sql->execute([$opid, $glId]);
    }
  };
}

function approveJudge(Slim\Slim $app) {
  return function($opid) use ($app) {

    // get user for opid
    $sql = DB::get()->prepare("SELECT UserId, Email FROM User Where UserId = (SELECT UserId FROM UserYear WHERE UserYearId = (SELECT UserYearId FROM Operator WHERE OperatorId = ?))");
    execOrError($sql->execute([$opid]), new DatabaseError("Error while getting user by operator id during judge approval"));

    $user = valueOrError($sql->fetch(PDO::FETCH_OBJ), new UserNotFound("Could not find a user for that operator id"));
    file_put_contents("php://stderr", $user->UserId);

    // set status to active
    $sql = DB::get()->prepare("UPDATE User SET Status = 'active' WHERE UserId = ?");
    execOrError($sql->execute([$user->UserId]), new DatabaseError("Error while making user active during judge approval"));

    // create auth account
    $sql = DB::get()->prepare("REPLACE INTO AuthAccount(PasswordHash, UserId) VALUES (?, ?)");
    execOrError($sql->execute([generateRandomString(), $user->UserId]), new DatabaseError("Error while creating auth account for judge during judge approval"));
    $authAccountId = valueOrError(DB::get()->lastInsertId(), new DatabaseError("Could not get auth account id for newly created auth account during judge approval"));

    // create one time token for pwd reset
    $sql = DB::get()->prepare("REPLACE INTO OneTimeToken(Token, AuthAccountId) VALUES (?, ?)");
    $randKey = generateRandomString(10);
    $sql->execute([$randKey, $authAccountId]);

    // email judge
    $to = $user->Email;
    $subject = 'HSEF judging approval!';
    $message = "
<html>
<head>
  <title>Approved to judge at HSEF</title>
</head>
<body>
  <p>Your judge registration has been approved</p>
  <p>Click the link below to set your password, then you can log in with this email and password to select your judging category and grade level preferences</p>
  <a href='http://corsair.cs.iupui.edu:24631/hsef?page=password-reset&k=".$randKey."'>Set Password</a>
</body>
</html>
";

    $headers = array("From: webmaster@hsef.org",
      "Reply-To: djpeach@iu.edu",
      "X-Mailer: PHP/" . PHP_VERSION,
      'Content-type: text/html; charset=iso-8859-1',
      'MIME-Version: 1.0',
      "To: {$user->Email}"
    );

    if (!mail($to, $subject, $message, implode("\r\n", $headers))) {
      throw new ApiException("Failed to send judge welcome email");
    } else {
      echo "sent email to {$user->Email}";
    }
  };
}

function denyJudge(Slim\Slim $app) {
  return function($opid) use ($app) {
    // get user for opid
    $sql = DB::get()->prepare("SELECT UserId FROM User Where UserId = (Select UserId FROM UserYear WHERE UserYearId = (SELECT UserYearId FROM Operator WHERE OperatorId = ?))");
    execOrError($sql->execute([$opid]), new DatabaseError("Error while getting user by operator id during judge denial"));

    $user = valueOrError($sql->fetch(PDO::FETCH_OBJ), new UserNotFound("Could not find a user for that operator id"));

    // set status to archived
    $sql = DB::get()->prepare("UPDATE User SET Status = 'archived' WHERE UserId = ?");
    execOrError($sql->execute([$user->UserId]), new DatabaseError("Error while making user active during judge denial"));
  };
}

function updateCheckedIn(Slim\Slim $app) {
  return function($opid) use ($app) {
    $reqBody = $app->req->jsonBody();
    $checkedIn = valueOrError($reqBody["checkedIn"], new BadRequest("Must provide a value for checkedIn"));
    $checkedIn = $checkedIn == "true" ? 1 : 0;
    $sql = DB::get()->prepare("UPDATE User SET CheckedIn = ? WHERE UserId = (SELECT UserId FROM UserYear WHERE UserYearId = (SELECT UserYearId FROM Operator WHERE OperatorId = ?))");
    execOrError($sql->execute([ $checkedIn, $opid ]), new DatabaseError("Error while updating checked in during updateCheckedIn"));
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
  return function($opid) use ($app) {
    $reqBody = $app->req->jsonBody();
    $user = $reqBody["user"];
    $operator = $reqBody["operator"];
    $authAccount = $reqBody["authAccount"];

    if (!empty($user)) {
      $query = "UPDATE User SET ";
      $queryArgs = [];
      foreach ($user as $key => $value) {
        $key = ucfirst($key);
        $query .= "$key = ?, ";
        array_push($queryArgs, $value);
      }
      $query = substr($query, 0, -2);
      $query .= " WHERE UserId = (SELECT UserId FROM UserYear WHERE UserYearId = (SELECT UserYearId FROM Operator WHERE OperatorId = ?))";
      array_push($queryArgs, $opid);
      $sql = DB::get()->prepare($query);
      $sql->execute($queryArgs);
    }

    if (!empty($operator)) {
      $query = "UPDATE Operator SET ";
      $queryArgs = [];
      foreach ($operator as $key => $value) {
        $key = ucfirst($key);
        $query .= "$key = ?, ";
        array_push($queryArgs, $value);
      }
      $query = substr($query, 0, -2);
      $query .= " WHERE OperatorId = ?";
      array_push($queryArgs, $opid);
      $sql = DB::get()->prepare($query);
      $sql->execute($queryArgs);
    }

    if (!empty($authAccount)) {
      $query = "UPDATE AuthAccount SET ";
      $queryArgs = [];
      foreach ($authAccount as $key => $value) {
        $key = ucfirst($key);
        $query .= "$key = ?, ";
        array_push($queryArgs, $value);
      }
      $query = substr($query, 0, -2);
      $query .= " WHERE UserId = (SELECT UserId FROM UserYear WHERE UserYearId = (SELECT UserYearId FROM Operator WHERE OperatorId = ?))";
      array_push($queryArgs, $opid);
      $sql = DB::get()->prepare($query);
      $sql->execute($queryArgs);
    }

    $app->res->json(["success" => true]);
  };
}

// DELETE
function deleteJudgeByOpId(Slim\Slim $app) {
  return function() use ($app) {
    echo "deleted judge";
  };
}

// LIST
function listJudgePreferences(Slim\Slim $app) {
  return function($opid) use ($app) {
    $reqBody = $app->req->jsonBody();

    // get categoryPreferences
    $sql = DB::get()->prepare("SELECT C.CategoryId, C.Name FROM Category C 
    JOIN OperatorCategory OC on C.CategoryId = OC.CategoryId WHERE OC.OperatorId = ?");
    execOrError($sql->execute([$opid]), new DatabaseError("Could not fetch category ids for judge with opid: $opid"));
    $categories = $sql->fetchAll();
    if ($categories) {
      $resBody["categories"] = array_map(function($category) {
        return filterNullCamelCaseKeys($category);
      }, $categories);
    }

    // get gradeLevelPreferences
    $sql = DB::get()->prepare("SELECT GL.GradeLevelId, GL.Name FROM GradeLevel GL
    JOIN OperatorGradeLevel OGL on GL.GradeLevelId = OGL.GradeLevelId WHERE OGL.OperatorId = ?");
    execOrError($sql->execute([$opid]), new DatabaseError("Could not fetch category ids for judge with opid: $opid"));
    $gradeLevels = $sql->fetchAll();
    if ($gradeLevels) {
      $resBody["gradeLevels"] = array_map(function($gradeLevel) {
        return filterNullCamelCaseKeys($gradeLevel);
      }, $gradeLevels);
    }

    $app->res->json([
      "results" => $resBody
    ]);
  };
}

function listJudgePreferenceOptions(Slim\Slim $app) {
  return function() use ($app) {

    // get categoryPreferences
    $sql = DB::get()->prepare("SELECT C.CategoryId, C.Name FROM Category C");
    $sql->execute([]);
    $categories = $sql->fetchAll();
    if ($categories) {
      $resBody["categories"] = array_map(function($category) {
        return filterNullCamelCaseKeys($category);
      }, $categories);
    }

    // get gradeLevelPreferences
    $sql = DB::get()->prepare("SELECT GL.GradeLevelId, GL.Name FROM GradeLevel GL");
    $sql->execute([]);
    $gradeLevels = $sql->fetchAll();
    if ($gradeLevels) {
      $resBody["gradeLevels"] = array_map(function($gradeLevel) {
        return filterNullCamelCaseKeys($gradeLevel);
      }, $gradeLevels);
    }

    $app->res->json([
      "results" => $resBody
    ]);
  };
}

function listJudges(Slim\Slim $app) {
  return function() use ($app) {
    // initialize response and request parameters
    $resBody = [];
    $reqParams = $app->req->jsonParams();
    $status = valueOrDefault($reqParams["status"], "active");

    if (!in_array($status, ['active', 'registered', 'invited', 'archived'])) {
      throw new BadRequest("status must be one of ['active', 'registered', 'invited', 'archived']");
    }

    $query = "SELECT O.OperatorId, O.Title, O.HighestDegree,
       O.Employer, U.UserId, U.FirstName, U.LastName, U.Suffix,
       U.Gender, U.Status, U.CheckedIn, U.Email, AA.PasswordHash 
FROM Operator O
    JOIN OperatorEntitlement OE on O.OperatorId = OE.OperatorId
    JOIN Entitlement E on OE.EntitlementId = E.EntitlementId
    JOIN UserYear UY on O.UserYearId = UY.UserYearId
    JOIN User U on UY.UserId = U.UserId
    LEFT JOIN AuthAccount AA on U.UserId = AA.UserId
WHERE E.Name = 'judge'
  AND U.Status = ?
  AND UY.Year = YEAR(CURRENT_TIMESTAMP)";

    $sql = DB::get()->prepare($query);

    execOrError($sql->execute([$status]), new DatabaseError("Failed to retrieve judges"));

    // Finalize (build/transform/filter) response if needed
    $judges = $sql->fetchAll();
    if (!$judges) {
      throw new UserNotFound("No judges could be found");
    }

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