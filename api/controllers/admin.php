<?php

function createNewAdmin(Slim\Slim $app) {
  return function() use ($app) {
    // initialize response and req parameters
    $reqBody = json_decode($app->req->getBody());
    $user = $reqBody->user;
    $operator = valueOrDefault($reqBody->operator, new stdClass());
    $resBody = [];

    // Create User
    $sql = DB::get()->prepare("INSERT INTO User(FirstName, LastName, Suffix, Gender, Status, CheckedIn, Email) VALUES(?, ?, ?, ?, ?, ?, ?)");
    execOrError($sql->execute([
      valueOrError($user->firstName, new BadRequest("firstName cannot be null or blank")),
      valueOrError($user->lastName, new BadRequest("lastName cannot be null or blank")),
      valueOrNull($user->suffix),
      valueOrNull($user->gender),
      valueOrDefault($user->suffix, 'active'),
      funcOrNull($user->suffix, function($el) { return $el ? 1 : 0; }),
      valueOrNull($user->email),
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

    // Send response
    $app->res->json($resBody);
  };

}

function createAdminFromExisting($app) {
  return function() use ($app) {
    echo "Added admin entitlement to existing user";
  };
}

function listCurrentAdmins(Slim\Slim $app) {
  return function() use ($app) {
    // initialize response and req parameters
    $reqParams = json_decode(json_encode($app->req->params()));
    $limit = valueOrDefault($reqParams->limit, 10);
    $offset = valueOrDefault($reqParams->offset, 0);
    $resBody = [
      "links" => [
        "base" => $app->req->getUrl().$app->req->getPath(),
      ],
      "limit" => $limit,
      "offset" => $offset
    ];

    // Validate request parameters
    if ($limit < 0) {
      throw new BadRequest("limit cannot be negative");
    }
    if ($offset < 0) {
      throw new BadRequest("offset cannot be negative");
    }

    $query = "SELECT O.OperatorId, U.UserId, U.FirstName, U.LastName, U.Suffix, U.CheckedIn, U.Email, O.Title, O.HighestDegree, O.Employer FROM Operator O 
    JOIN OperatorEntitlement OE on O.OperatorId = OE.OperatorId 
    JOIN Entitlement E on OE.EntitlementId = E.EntitlementId 
    JOIN UserYear UY on O.UserYearId = UY.UserYearId 
    JOIN User U on UY.UserId = U.UserId 
WHERE E.Name = 'admin' 
  AND UY.Year = YEAR(CURRENT_TIMESTAMP) LIMIT ? OFFSET ?";
    $sql = DB::get()->prepare($query);

    // get $limit+1 results to determine if more can be fetched after this
    execOrError($sql->execute([
      valueOrError($limit+1, new ApiException("limit does not exist", 500)),
      valueOrError($offset, new ApiException("offset does not exist", 500)),
    ]), new DatabaseError("Failed to retrieve $limit admins with offset $offset", 502));

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
    }
    $resBody["count"] = count($admins);
    $resBody["results"] = array_map(function($admin) {
      // filter out null values and camelCase keys
      foreach ($admin as $key => $value) {
        unset($admin[$key]);
        if ($value !== null) {
          $admin[lcfirst($key)] = $value;
        }
      }
      return $admin;
    }, $admins);

    // Send response
    $app->res->json($resBody);
  };
}