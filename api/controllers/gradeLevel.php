<?php

// CREATE
function createNewGradeLevel(Slim\Slim $app) {
  return function() use ($app) {
    // Initialize response and request parameters
    $reqBody = $app->req->jsonBody();
    $gradeLevel = valueOrError($reqBody->gradeLevel, new BadRequest("You must provide a gradeLevel object on the request body"));
    $resBody = [];

    // Additional request parameter validation if needed

    // Check for existing resource
    $sql = DB::get()->prepare("SELECT 1 FROM GradeLevel WHERE Name = ?");
    execOrError($sql->execute([
      valueOrError($gradeLevel->name, new BadRequest("GradeLevel name cannot be missing or blank")),
    ]), new DatabaseError("Failed when trying to fetch existing gradeLevel with name: {$gradeLevel->name}"));
    if ($sql->fetch()) {
      throw new ResourceConflict("A gradeLevel with name {$gradeLevel->name} already exists");
    }

    // DB Logic (build response meanwhile if needed)
    $sql = DB::get()->prepare("INSERT INTO GradeLevel(Name, Active) VALUES(?, ?)");
    execOrError($sql->execute([
      valueOrError($gradeLevel->name, new BadRequest("GradeLevel name cannot be missing or blank")),
      valueOrDefault($gradeLevel->active, true)
    ]), new DatabaseError("Failed to create new gradeLevel", 502));

    $gradeLevelId = DB::get()->lastInsertId();
    $resBody["gradeLevelId"] = $gradeLevelId;

    // Finalize (build/transform/filter) response if needed

    // Send response
    $app->res->json($resBody);
  };
}

// READ
function getGradeLevelById(Slim\Slim $app) {
  return function() use ($app) {
    echo "Got gradeLevel by id";
  };
}

// UPDATE
function updateGradeLevelById(Slim\Slim $app) {
  return function() use ($app) {
    echo "updated gradeLevel";
  };
}

// DELETE
function deleteGradeLevelById(Slim\Slim $app) {
  return function() use ($app) {
    echo "deleted gradeLevel";
  };
}

// LIST
function listGradeLevels(Slim\Slim $app) {
  return function() use ($app) {
    echo "got gradeLevels";
  };
}