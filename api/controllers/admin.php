<?php

function createNewAdmin($app) {
  return function() use ($app) {
    $req = json_decode($app->request->getBody());
    $user = $req->user;
    $sql = DB::get()->prepare("INSERT INTO User(FirstName, LastName, Suffix, Gender, Status, CheckedIn, Email) VALUES(?, ?, ?, ?, ?, ?, ?)");
    $execute = $sql->execute([
      $user->firstName,
      $user->lastName,
      $user->suffix,
      $user->gender,
      $user->status ? $user->status : 'active',
      $user->checkedIn ? 1 : 0,
      $user->email
    ]);
    if (!$execute) {
      throw new DatabaseError("Failed to execute", 500);
    }
    $app->response->setBody(json_encode("{userId: ".DB::get()->lastInsertId()."}"));
  };
}

function createAdminFromExisting($app) {
  return function() use ($app) {
    echo "Added admin entitlement to existing user";
  };
}