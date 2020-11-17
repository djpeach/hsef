<?php

// CREATE
function createAdminFromExisting($app) {
  return function() use ($app) {
    $reqBody = $app->req->jsonBody();
    $operator = valueOrDefault($reqBody["operator"], new EmptyObject());
    $resBody = [];

    $sql = DB::get()->prepare("REPLACE INTO UserYear(Year, UserId) VALUES (YEAR(CURRENT_TIMESTAMP), ?)");
    execOrError($sql->execute([
      valueOrError($reqBody["userId"], new BadRequest("You must provide a userId on the request body"))
    ]), new DatabaseError("Error when trying to replace user year record"));

    echo "Still in dev";
  };
}

function createNewAdmin(Slim\Slim $app) {
  return function() use ($app) {
    // initialize response and request parameters
    $reqBody = $app->req->jsonBody();
    $user = valueOrError($reqBody["user"], new BadRequest("You must provide a user object on the request body"));
    $operator = valueOrDefault($reqBody["operator"], new EmptyObject());
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
    file_put_contents("php://stderr", "fName: {$user->firstName}");
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

    // Add admin entitlement
    $sql = DB::get()->prepare("INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES(?, (SELECT EntitlementId FROM Entitlement WHERE Name=?))");
    execOrError($sql->execute([
      valueOrError($operatorId, new ApiException("Id for operator record not found", 500)),
      "admin"
    ]), new DatabaseError("Failed to add admin entitlement to operator", 502));

    // Finalize (build/transform/filter) response if needed

    // Send response
    $app->res->json($resBody);
  };

}

// READ
function getAdminByOpId(Slim\Slim $app) {
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
WHERE E.Name = 'admin'
  AND O.OperatorId = ?";
    $sql = DB::get()->prepare($query);
    execOrError($sql->execute([
      valueOrError($id,  new ApiException("id does not exist", 500))
    ]), new DatabaseError("Error while trying to find admin with id: $id", 502));

    // Finalize (build/transform/filter) response if needed
    $admin = $sql->fetch();
    if (!$admin) {
      throw new UserNotFound("An admin with the id: $id could not be found");
    }

    $resBody["result"] = filterNullCamelCaseKeys($admin);

    // Send response
    $app->res->json($resBody);
  };
}

// UPDATE
function updateAdminByOpId(Slim\Slim $app) {
  return function() use ($app) {
    echo "updated admin";
  };
}

// DELETE
function deleteAdminByOpId(Slim\Slim $app) {
  return function() use ($app) {
    echo "deleted admin";
  };
}

// LIST
function listAdmins(Slim\Slim $app) {
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
WHERE E.Name = 'admin'
  AND U.Status = 'active'";

    $sqlParams = [];

    $sql = DB::get()->prepare($query);

    execOrError($sql->execute($sqlParams), new DatabaseError("Failed to fetch all admins"));

    $admins = $sql->fetchAll();

    // Finalize (build/transform/filter) response if needed
    if (!$admins) {
      throw new UserNotFound("No admins found");
    }

    $resBody["count"] = count($admins);
    $resBody["results"] = array_map(function($admin) {
      return filterNullCamelCaseKeys($admin);
    }, $admins);

    // Send response
    $app->res->json($resBody);
  };
}

function listPotentialAdmins(Slim\Slim $app) {
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
    WHERE E.Name = 'admin'))
AND UY.Year = YEAR(CURRENT_TIMESTAMP)";

    $sqlParams = [];

    $sql = DB::get()->prepare($query);

    execOrError($sql->execute($sqlParams), new DatabaseError("Failed to retrieve admins"));

    // Finalize (build/transform/filter) response if needed
    $admins = $sql->fetchAll();
    if ($admins) {
      throw new UserNotFound("No potential admins could be found");
    }
    $resBody["count"] = count($admins);
    $resBody["results"] = array_map(function($admin) {
      return filterNullCamelCaseKeys($admin);
    }, $admins);

    // Send response
    $app->res->json($resBody);
  };
}