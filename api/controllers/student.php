<?php

// CREATE
function createNewStudent(Slim\Slim $app) {
  return function() use ($app) {
    // Initialize response and request parameters
    $reqBody = $app->req->jsonBody();
    $user = valueOrError($reqBody->user, new BadRequest("You must provide a body object on the request body"));
    $student = valueOrDefault($reqBody->student, new stdClass());
    $resBody = [];

    // Additional request parameter validation if needed

    // Check for existing resource
    $sql = DB::get()->prepare("SELECT 1 FROM User U JOIN UserYear UY on U.UserId = UY.UserId WHERE UY.Year = YEAR(CURRENT_TIMESTAMP) AND U.FirstName = ? AND U.LastName = ?");
    execOrError($sql->execute([
      valueOrError($user->firstName, new BadRequest("firstName cannot be null or blank")),
      valueOrError($user->lastName, new BadRequest("lastName cannot be null or blank")),
    ]), new DatabaseError("Failed to fetch a user when checking for existing user"));
    if ($sql->fetch()) {
      throw new ResourceConflict("User in this year with name {$user->firstName} {$user->lastName} already exists");
    }

    // DB Logic (build response meanwhile if needed)
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

    $sql = DB::get()->prepare("INSERT INTO Student(SchoolId, UserId, ProjectId, GradeLevelId) VALUES(?, ?, ?, ?)");
    execOrError($sql->execute([
      valueOrNull($student->schoolId),
      valueOrError($userId, new ApiException("userId does not exist")),
      valueOrNull($student->projectId),
      valueOrNull($student->gradeLevelId)
    ]), new DatabaseError("Failed to create new student"));

    $studentId = DB::get()->lastInsertId();
    $resBody["studentId"] = $studentId;

    // Finalize (build/transform/filter) response if needed

    // Send response
    $app->res->json($resBody);
  };
}

// READ
function getStudentById(Slim\Slim $app) {
  return function() use ($app) {
    echo "Got student by id";
  };
}

// UPDATE
function updateStudentById(Slim\Slim $app) {
  return function() use ($app) {
    echo "updated student";
  };
}

// DELETE
function deleteStudentById(Slim\Slim $app) {
  return function() use ($app) {
    echo "deleted student";
  };
}

// LIST
function listStudents(Slim\Slim $app) {
  return function() use ($app) {
    echo "got students";
  };
}