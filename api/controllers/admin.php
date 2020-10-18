<?php

function createNewAdmin($app) {
  return function() use ($app) {
    $req = json_decode($app->request->getBody());
    $resBody = [];

    // Create User
    $user = $req->user;
    $sql = DB::get()->prepare("INSERT INTO User(FirstName, LastName, Suffix, Gender, Status, CheckedIn, Email) VALUES(?, ?, ?, ?, ?, ?, ?)");
    $execute = $sql->execute([
      $user->firstName,
      $user->lastName,
      isset($user->suffix) ? $user->suffix : null,
      isset($user->gender) ? $user->gender : null,
      isset($user->status) ? $user->status : 'active',
      isset($user->checkedIn) ? ($user->checkedIn ? 1 : 0) : null,
      isset($user->email) ? $user->email : null
    ]);
    if (!$execute) {
      throw new DatabaseError("Failed to create new user", 502);
    }
    $userId = DB::get()->lastInsertId();
    $resBody["userId"] = $userId;

    // Create UserYear Record
    $sql = DB::get()->prepare("INSERT INTO UserYear(Year, UserId) VALUES (YEAR(CURRENT_TIMESTAMP), ?)");
    $execute = $sql->execute([$userId]);
    if (!$execute) {
      throw new DatabaseError("Failed to create new user year record", 502);
    }
    $userYearId = DB::get()->lastInsertId();

    // Create Operator
    $operator = isset($req->operator) ? $req->operator : new stdClass();
    $sql = DB::get()->prepare("INSERT INTO Operator(Title, HighestDegree, Employer, UserYearId) VALUES(?, ?, ?, ?)");
    $execute = $sql->execute([
      isset($operator->title) ? $operator->title : null,
      isset($operator->highestDegree) ? $operator->highestDegree : null,
      isset($operator->employer) ? $operator->employer : null,
      $userYearId
    ]);
    if (!$execute) {
      throw new DatabaseError("Failed to create new operator", 502);
    }
    $operatorId = DB::get()->lastInsertId();
    $resBody["operatorId"] = $operatorId;

    // Add admin entitlement
    $sql = DB::get()->prepare("INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES(?, (SELECT EntitlementId FROM Entitlement WHERE Name=?))");
    $execute = $sql->execute([$operatorId, 'admin']);
    if (!$execute) {
      throw new DatabaseError("Failed to add admin entitlement to operator", 502);
    }

    // Send response
    $app->response->setBody(json_encode($resBody));
  };
}

function createAdminFromExisting($app) {
  return function() use ($app) {
    echo "Added admin entitlement to existing user";
  };
}