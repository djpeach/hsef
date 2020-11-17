<?php

require_once __DIR__."/../utils.php";

function loginWithEmailPassword(Slim\Slim $app) {
  return function() use ($app) {
    $reqBody = $app->req->jsonBody();
    $resBody = [];
    // find user with email and current year that is active
    $query = "SELECT * FROM User U
    JOIN AuthAccount AA on U.UserId = AA.UserId 
    JOIN UserYear UY on U.UserId = UY.UserId 
    JOIN Operator O on UY.UserYearId = O.UserYearId
WHERE Email = ? AND UY.Year = YEAR(CURRENT_TIMESTAMP) AND U.Status = 'active'";
    $sql = DB::get()->prepare($query);
    execOrError($sql->execute([
      valueOrError($reqBody["email"], new BadRequest("No email on request"))
    ]), new DatabaseError("Failed while trying to fetch user with email {$reqBody['email']}"));

    $user = $sql->fetch(PDO::FETCH_OBJ);
    if ($user) {
      if ($reqBody["password"] === $user->PasswordHash) {
        $resBody["userId"] = $user->UserId;
        $resBody["operatorId"] = $user->OperatorId;
        $app->res->json($resBody);
      } else {
        throw new ApiException("Incorrect password, try again");
      }
    } else {
      throw new UserNotFound("No active user with email {$reqBody['email']} for this year could be found");
    }
  };
}

function logout(Slim\Slim $app) {
  return function() use ($app) {
    $app->res->json(["success" => true]);
  };
}

function resetPwdEmail(Slim\Slim $app) {
  return function() use ($app) {

    $reqBody = $app->req->jsonBody();

    $sql = DB::get()->prepare("SELECT AuthAccountId FROM AuthAccount AA JOIN User U on AA.UserId = U.UserId WHERE U.Email = ?");
    $sql->execute([$reqBody['email']]);
    $authAccount = $sql->fetch(PDO::FETCH_OBJ);

    if (!$authAccount) {
      throw new UserNotFound("Could not find a user with that email");
    }

    $sql = DB::get()->prepare("INSERT INTO OneTimeToken(Token, AuthAccountId) VALUES (?, ?)");
    $randKey = generateRandomString(10);
    $sql->execute([$randKey, $authAccount->AuthAccountId]);

    $to = $reqBody['email']; // note the comma
    $subject = 'HSEF password reset';
    $message = "
<html>
<head>
  <title>Password reset request from HSEF</title>
</head>
<body>
  <p>Click the link below to reset your password</p>
  <a href='http://localhost:8080/pwdReset?k=".$randKey."'>Reset Password</a>
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
      throw new ApiException("Failed to send password reset email");
    }

  };
}

function resetPwdEmailSubmit(Slim\Slim $app) {
  return function() use ($app) {
    $reqBody = $app->req->jsonBody();
    $sql = DB::get()->prepare("SELECT * FROM OneTimeToken WHERE Token = ?");
    $sql->execute([$reqBody['key']]);

    $ott = $sql->fetch(PDO::FETCH_OBJ);
    if (!$ott) {
      throw new ResourceNotFound("Reset token is invalid");
    }

    $sql = DB::get()->prepare("UPDATE AuthAccount SET PasswordHash = ? WHERE AuthAccountId = ?");
    $sql->execute([$reqBody['pwd'], $ott->AuthAccountId]);

    $sql = DB::get()->prepare("DELETE FROM OneTimeToken WHERE OneTimeTokenId = ?");
    $sql->execute([$ott->OneTimeTokenId]);
  };
}