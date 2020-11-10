<?php

// CREATE
function createNewCounty(Slim\Slim $app) {
  return function() use ($app) {
    // Initialize response and request parameters
    $reqBody = $app->req->jsonBody();
    $county = valueOrError($reqBody->county, new BadRequest("You must provide a county object on the request body"));
    $resBody = [];

    // Additional request parameter validation if needed

    // Check for existing resource
    $sql = DB::get()->prepare("SELECT 1 FROM County WHERE Name = ?");
    execOrError($sql->execute([
      valueOrError($county->name, new BadRequest("County name cannot be missing or blank")),
    ]), new DatabaseError("Failed when trying to fetch existing county with name: {$county->name}"));
    if ($sql->fetch()) {
      throw new ResourceConflict("A county with name {$county->name} already exists");
    }

    // DB Logic (build response meanwhile if needed)
    $sql = DB::get()->prepare("INSERT INTO County(Name) VALUES(?)");
    execOrError($sql->execute([
      valueOrError($county->name, new BadRequest("County name cannot be missing or blank"))
    ]), new DatabaseError("Failed to create new county", 502));

    $countyId = DB::get()->lastInsertId();
    $resBody["countyId"] = $countyId;

    // Finalize (build/transform/filter) response if needed

    // Send response
    $app->res->json($resBody);
  };
}

// READ
function getCountyById(Slim\Slim $app) {
  return function() use ($app) {
    echo "Got county by id";
  };
}

// UPDATE
function updateCountyById(Slim\Slim $app) {
  return function() use ($app) {
    echo "updated county";
  };
}

// DELETE
function deleteCountyById(Slim\Slim $app) {
  return function() use ($app) {
    echo "deleted county";
  };
}

// LIST
function listCounties(Slim\Slim $app) {
  return function() use ($app) {
    // Initialize response and request parameters
    $reqParams = valueOrDefault($app->req->jsonParams(), new EmptyObject());
    $searchTerm = valueOrNull($reqParams->t);
    $limit = valueOrDefault($reqParams->limit, 10);
    $offset = valueOrDefault($reqParams->offset, 0);
    $resBody = [
      "links" => [
        "base" => $app->req->getUrl().$app->req->getPath(),
      ],
      "limit" => $limit,
      "offset" => $offset
    ];

    // Additional request parameter validation if needed
    if ($offset < 0) {
      throw new BadRequest("offset cannot be negative");
    }

    // DB Logic (build response meanwhile if needed)
    $query = "SELECT C.CountyId, C.Name FROM County C";

    $sqlParams = [];

    if (isset($searchTerm)) {
      $query .= " WHERE C.Name LIKE ?";
      array_push($sqlParams, "%$searchTerm%");
    }

    if ($limit > 0) {
      $query .= " LIMIT ? OFFSET ?";
      // get $limit+1 results to determine if more can be fetched after this
      array_push($sqlParams, valueOrError($limit+1, new ApiException("limit does not exist", 500)));
      array_push($sqlParams, valueOrError($offset, new ApiException("offset does not exist", 500)));
    }

    $sql = DB::get()->prepare($query);

    execOrError($sql->execute($sqlParams), new DatabaseError("Failed to retrieve $limit counties with offset $offset"));

    // Finalize (build/transform/filter) response if needed
    $counties = $sql->fetchAll();
    if ($counties) {
      if ($offset > 0) {
        // add prev url
        $prevOffset = max(0, $offset - $limit);
        $prevLimit = min($limit, $offset);
        $prevUrl = "{$app->req->getUrl()}{$app->req->getPath()}?limit=$prevLimit&offset=$prevOffset";
        $prevUrl .= isset($searchTerm) ? "&t=$searchTerm" : "";
        $resBody["links"]["prev"] = $prevUrl;
      }
      if (count($counties) > $limit) {
        // remove last [sentry] admin and return $limit admins only
        // add next url
        array_pop($counties);
        $nextOffset = $offset + $limit;
        $nextUrl = "{$app->req->getUrl()}{$app->req->getPath()}?limit=$limit&offset=$nextOffset";
        $nextUrl .= isset($searchTerm) ? "&t=$searchTerm" : "";
        $resBody["links"]["next"] = $nextUrl;
      }
    } else {
      throw new UserNotFound("No counties with query: $searchTerm could be found");
    }
    $resBody["count"] = count($counties);

    $resBody["results"] = array_map(function($county) {
      return filterNullCamelCaseKeys($county);
    }, $counties);

    // Send response
    $app->res->json($resBody);
  };
}