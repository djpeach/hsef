<?php

function loginWithEmailPassword(Slim\Slim $app) {
  return function() use ($app) {
    $reqBody = valueOrDefault($app->req->jsonBody(), new EmptyObject());
    $resBody = [];
    // find user with email and current year that is active
    $query = "SELECT * FROM User U
    JOIN AuthAccount AA on U.UserId = AA.UserId 
    JOIN UserYear UY on U.UserId = UY.UserId 
WHERE Email = ? AND UY.Year = YEAR(CURRENT_TIMESTAMP) AND U.Status = 'active'";
    $sql = DB::get()->prepare($query);
    execOrError($sql->execute([
      valueOrError($reqBody->email, new BadRequest("No email on request"))
    ]), new DatabaseError("Failed while trying to fetch user with email {$reqBody->email}"));

    $user = $sql->fetch(PDO::FETCH_OBJ);
    if ($user) {
      if (password_verify(
        valueOrError($reqBody->password, new BadRequest("No password on request")),
        valueOrError($user->PasswordHash, new ApiException("No password on auth account"))
      )) {
        $app->res->json($resBody);
      } else {
        throw new ApiException("Incorrect password, try again");
      }
    } else {
      throw new UserNotFound("No active user with email {$reqBody->email} for this year could be found");
    }
  };
}

function logout(Slim\Slim $app) {
  return function() use ($app) {
    $app->res->json(["success" => true]);
  };
}