<?php

function createNewAdmin($app) {
  return function() use ($app) {
    $req = json_decode($app->request->getBody());
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