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
    echo "got counties";
  };
}