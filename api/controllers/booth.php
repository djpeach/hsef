<?php

// CREATE
function createNewBooth(Slim\Slim $app) {
  return function() use ($app) {
    // Initialize response and request parameters
    $reqBody = $app->req->jsonBody();
    $booth = valueOrError($reqBody->booth, new BadRequest("You must provide a booth object on the request body"));
    $resBody = [];

    // Additional request parameter validation if needed

    // Check for existing resource
    $sql = DB::get()->prepare("SELECT 1 FROM Booth WHERE Number = ?");
    execOrError($sql->execute([
      valueOrError($booth->number, new BadRequest("Booth number cannot be missing or blank")),
    ]), new DatabaseError("Failed when trying to fetch existing booth with number: {$booth->number}"));
    if ($sql->fetch()) {
      throw new ResourceConflict("A booth with number {$booth->number} already exists");
    }

    // DB Logic (build response meanwhile if needed)
    $sql = DB::get()->prepare("INSERT INTO Booth(Number, Active) VALUES(?, ?)");
    execOrError($sql->execute([
      valueOrError($booth->number, new BadRequest("Booth number cannot be missing or blank")),
      valueOrDefault($booth->active, true)
    ]), new DatabaseError("Failed to create new booth", 502));

    $boothId = DB::get()->lastInsertId();
    $resBody["boothId"] = $boothId;

    // Finalize (build/transform/filter) response if needed

    // Send response
    $app->res->json($resBody);
  };
}

// READ
function getBoothById(Slim\Slim $app) {
  return function() use ($app) {
    echo "Got booth by id";
  };
}

// UPDATE
function updateBoothById(Slim\Slim $app) {
  return function() use ($app) {
    echo "updated booth";
  };
}

// DELETE
function deleteBoothById(Slim\Slim $app) {
  return function() use ($app) {
    echo "deleted booth";
  };
}

// LIST
function listBooths(Slim\Slim $app) {
  return function() use ($app) {
    // Initialize response and request parameters
    $reqParams = valueOrDefault($app->req->jsonParams(), new stdClass());
    $searchTerm = valueOrNull($reqParams->t);
    $limit = valueOrDefault($reqParams->limit, 10);
    $offset = valueOrDefault($reqParams->offset, 0);
    $active = valueOrNull($reqParams->active);
    $resBody = [
      "links" => [
        "base" => $app->req->getUrl().$app->req->getPath(),
      ],
      "limit" => $limit,
      "offset" => $offset
    ];

    // Additional request parameter validation if needed
    if ($limit < 0) {
      throw new BadRequest("limit cannot be negative");
    }
    if ($offset < 0) {
      throw new BadRequest("offset cannot be negative");
    }

    // DB Logic (build response meanwhile if needed)
    $query = "SELECT B.BoothId, B.Number, B.Active FROM Booth B";

    $sqlParams = [];

    if (isset($active)) {
      $query .= " WHERE B.Active = ?";
      $intBool = $active ? 1 : 0;
      array_push($sqlParams, "%$intBool%");
    }

    if (isset($searchTerm)) {
      $whereTerm = isset($active) ? "AND" : "WHERE";
      $query .= " $whereTerm B.Name LIKE ?";
      array_push($sqlParams, "%$searchTerm%");
    }

    $query .= " LIMIT ? OFFSET ?";
    // get $limit+1 results to determine if more can be fetched after this
    array_push($sqlParams, valueOrError($limit+1, new ApiException("limit does not exist", 500)));
    array_push($sqlParams, valueOrError($offset, new ApiException("offset does not exist", 500)));

    $sql = DB::get()->prepare($query);

    execOrError($sql->execute($sqlParams), new DatabaseError("Failed to retrieve $limit booths with offset $offset"));

    // Finalize (build/transform/filter) response if needed
    $booths = $sql->fetchAll();
    if ($booths) {
      if ($offset > 0) {
        // add prev url
        $prevOffset = max(0, $offset - $limit);
        $prevLimit = min($limit, $offset);
        $prevUrl = "{$app->req->getUrl()}{$app->req->getPath()}?limit=$prevLimit&offset=$prevOffset";
        $prevUrl .= isset($searchTerm) ? "&t=$searchTerm" : "";
        $prevUrl .= isset($active) ? "&active=$active" : "";
        $resBody["links"]["prev"] = $prevUrl;
      }
      if (count($booths) > $limit) {
        // remove last [sentry] admin and return $limit admins only
        // add next url
        array_pop($booths);
        $nextOffset = $offset + $limit;
        $nextUrl = "{$app->req->getUrl()}{$app->req->getPath()}?limit=$limit&offset=$nextOffset";
        $nextUrl .= isset($searchTerm) ? "&t=$searchTerm" : "";
        $nextUrl .= isset($active) ? "&active=$active" : "";
        $resBody["links"]["next"] = $nextUrl;
      }
    } else {
      throw new UserNotFound("No".(isset($active) ? ($active ? " active" : " inactive") : "")." booths with query: $searchTerm could be found");
    }
    $resBody["count"] = count($booths);

    $resBody["results"] = array_map(function($booth) {
      return filterNullCamelCaseKeys($booth);
    }, $booths);

    // Send response
    $app->res->json($resBody);
  };
}