<?php

// CREATE
function createNewSchool(Slim\Slim $app) {
  return function() use ($app) {
    // Initialize response and request parameters
    $reqBody = $app->req->jsonBody();
    $school = valueOrError($reqBody->school, new BadRequest("You must provide a school object on the request body"));
    $resBody = [];

    // Additional request parameter validation if needed

    // Check for existing resource
    $sql = DB::get()->prepare("SELECT 1 FROM School WHERE Name = ?");
    execOrError($sql->execute([
      valueOrError($school->name, new BadRequest("School name cannot be missing or blank")),
    ]), new DatabaseError("Failed when trying to fetch existing school with name: {$school->name}"));
    if ($sql->fetch()) {
      throw new ResourceConflict("A school with name {$school->name} already exists");
    }

    // DB Logic (build response meanwhile if needed)
    $sql = DB::get()->prepare("INSERT INTO School(Name, CountyId) VALUES(?, ?)");
    execOrError($sql->execute([
      valueOrError($school->name, new BadRequest("School name cannot be missing or blank")),
      valueOrNull($school->countyId)
    ]), new DatabaseError("Failed to create new school", 502));

    $schoolId = DB::get()->lastInsertId();
    $resBody["schoolId"] = $schoolId;

    // Finalize (build/transform/filter) response if needed

    // Send response
    $app->res->json($resBody);
  };
}

// READ
function getSchoolById(Slim\Slim $app) {
  return function() use ($app) {
    echo "Got school by id";
  };
}

// UPDATE
function updateSchoolById(Slim\Slim $app) {
  return function() use ($app) {
    echo "updated school";
  };
}

// DELETE
function deleteSchoolById(Slim\Slim $app) {
  return function() use ($app) {
    echo "deleted school";
  };
}

// LIST
function listSchools(Slim\Slim $app) {
  return function() use ($app) {
    echo "got schools";
  };
}