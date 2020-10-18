<?php

function createNewAdmin($app) {
  return function() use ($app) {
    // initialize response and req parameters
    $req = json_decode($app->request->getBody());
    $user = $req->user;
    $operator = isset($req->operator) ? $req->operator : new stdClass();
    $resBody = [];

    // Validate request parameters
    if (!isset($user->firstName) || $user->firstName === "") {
      throw new BadRequest("firstName cannot be null or blank");
    }
    if (!isset($user->lastName) || $user->lastName === "") {
      throw new BadRequest("firstName cannot be null or blank");
    }

    // Create User
    $sql = DB::get()->prepare("INSERT INTO User(FirstName, LastName, Suffix, Gender, Status, CheckedIn, Email) VALUES(?, ?, ?, ?, ?, ?, ?)");
    $execute = $sql->execute([
      $user->firstName,
      $user->lastName,
      isset($user->suffix) ? ($user->suffix === "" ? null : $user->suffix) : null,
      isset($user->gender) ? ($user->gender === "" ? null : $user->gender) : null,
      isset($user->status) ? ($user->status === "" ? 'active' : $user->status) : 'active',
      isset($user->checkedIn) ? ($user->checkedIn ? 1 : 0) : null,
      isset($user->email) ? ($user->email === "" ? null : $user->email) : null
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
    $sql = DB::get()->prepare("INSERT INTO Operator(Title, HighestDegree, Employer, UserYearId) VALUES(?, ?, ?, ?)");
    $execute = $sql->execute([
      isset($operator->title) ? ($operator->title === "" ? null : $operator->title) : null,
      isset($operator->highestDegree) ? ($operator->highestDegree === "" ? null : $operator->highestDegree) : null,
      isset($operator->employer) ? ($operator->employer === "" ? null : $operator->employer) : null,
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

function listCurrentAdmins($app) {
  return function() use ($app) {
    // initialize response and req parameters
    $req = json_decode(json_encode($app->request->params()));
    $limit = isset($req->limit) ? $req->limit : 10;
    $offset = isset($req->offset) ? $req->offset : 0;
    $resBody = [
      "links" => [
        "base" => $app->request->getUrl().$app->request->getPath(),
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
    $execute = $sql->execute([$limit+1, $offset]);
    if (!$execute) {
      throw new DatabaseError("Failed to retrieve $limit admins with offset $offset", 502);
    }
    $admins = $sql->fetchAll();
    if ($admins) {
      if ($offset > 0) {
        // add prev url
        $prevOffset = max(0, $offset - $limit);
        $prevLimit = min($limit, $offset);
        $resBody["links"]["prev"] = "{$app->request->getUrl()}{$app->request->getPath()}?limit=$prevLimit&offset=$prevOffset";
      }
      if (count($admins) > $limit) {
        // remove last [sentry] admin and return $limit admins only
        // add next url
        array_pop($admins);
        $nextOffset = $offset + $limit;
        $resBody["links"]["next"] = "{$app->request->getUrl()}{$app->request->getPath()}?limit=$limit&offset=$nextOffset";
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
    $app->response->setBody(json_encode($resBody));
  };
}