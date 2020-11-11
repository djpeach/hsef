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
    $resBody = [];

    // DB Logic (build response meanwhile if needed)
    $query = "SELECT B.BoothId, B.Number, B.Active FROM Booth B";

    $sqlParams = [];

    $sql = DB::get()->prepare($query);

    execOrError($sql->execute($sqlParams), new DatabaseError("Failed to retrieve booths"));

    // Finalize (build/transform/filter) response if needed
    $booths = $sql->fetchAll();
    if (!$booths) {
      throw new UserNotFound("No booths could be found");

    }
    $resBody["count"] = count($booths);

    $resBody["results"] = array_map(function($booth) {
      return filterNullCamelCaseKeys($booth);
    }, $booths);

    // Send response
    $app->res->json($resBody);
  };
}