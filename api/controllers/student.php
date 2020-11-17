<?php

// CREATE
function createNewStudent(Slim\Slim $app) {
  return function() use ($app) {
    // Initialize response and request parameters
    $reqBody = $app->req->jsonBody();
    $user = valueOrError($reqBody['user'], new BadRequest("You must provide a user object on the request body"));
    $student = valueOrDefault($reqBody['student'], new EmptyObject());
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

    // Create UserYear Record
    $sql = DB::get()->prepare("INSERT INTO UserYear(Year, UserId) VALUES (YEAR(CURRENT_TIMESTAMP), ?)");
    execOrError($sql->execute([
      valueOrError($userId, new ApiException("Id for user record not found", 500))
    ]), new DatabaseError("Failed to create new user year record", 502));

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
  return function($id) use ($app) {
    // Initialize response and request parameters
    $resBody = [];

    // Additional request validation if needed

    // DB Logic (build response meanwhile if needed)
    $query = "SELECT * FROM Student WHERE StudentId = ?";
    $sql = DB::get()->prepare($query);
    execOrError($sql->execute([
      valueOrError($id,  new ApiException("id does not exist", 500))
    ]), new DatabaseError("Error while trying to find student with id: $id", 502));
    $student = $sql->fetch();
    if (!$student) {
      throw new UserNotFound("An student with the id: $id could not be found");
    }
    $resBody["result"] = ["studentId" => $student["StudentId"]];

    // get user info
    $uid = $student["UserId"];
    $query = "SELECT UserId as Id, FirstName, LastName, Suffix, Gender, Status FROM User WHERE UserId = ?";
    $sql = DB::get()->prepare($query);
    execOrError($sql->execute([
      valueOrError($uid,  new ApiException("id does not exist", 500))
    ]), new DatabaseError("Error while trying to find user with id: $uid", 502));
    $user = $sql->fetch();
    if (!$user) {
      throw new UserNotFound("A user with the id: $uid could not be found");
    }
    $resBody["result"]["user"] = filterNullCamelCaseKeys($user);

    // get school info
    $schoolId = $student["SchoolId"];
    if ($schoolId) {
      $query = "SELECT SchoolId as Id, Name FROM School WHERE SchoolId = ?";
      $sql = DB::get()->prepare($query);
      execOrError($sql->execute([
        valueOrError($schoolId,  new ApiException("id does not exist", 500))
      ]), new DatabaseError("Error while trying to find school with id: $schoolId", 502));
      $school = $sql->fetch();
      if (!$school) {
        throw new ResourceNotFound("A school with the id: $schoolId could not be found");
      }
      $resBody["result"]["school"] = filterNullCamelCaseKeys($school);
    }

    // get gradeLevel info
    $gradeLevelId = $student["GradeLevelId"];
    if ($gradeLevelId) {
      $query = "SELECT GradeLevelId as Id, Name FROM GradeLevel WHERE GradeLevelId = ?";
      $sql = DB::get()->prepare($query);
      execOrError($sql->execute([
        valueOrError($gradeLevelId,  new ApiException("id does not exist", 500))
      ]), new DatabaseError("Error while trying to find gradeLevel with id: $gradeLevelId", 502));
      $gradeLevel = $sql->fetch();
      if (!$gradeLevel) {
        throw new ResourceNotFound("A gradeLevel with the id: $gradeLevelId could not be found");
      }
      $resBody["result"]["gradeLevel"] = filterNullCamelCaseKeys($gradeLevel);
    }

    // get project info
    $projectId = $student["ProjectId"];
    if ($schoolId) {
      $query = "SELECT ProjectId as Id, Name, Number, CourseNetworkingId, Abstract, CategoryId FROM Project WHERE ProjectId = ?";
      $sql = DB::get()->prepare($query);
      execOrError($sql->execute([
        valueOrError($projectId,  new ApiException("id does not exist", 500))
      ]), new DatabaseError("Error while trying to find project with id: $projectId", 502));
      $project = $sql->fetch();
      if (!$project) {
        throw new ResourceNotFound("A project with the id: $projectId could not be found");
      }
      $catId = $project["CategoryId"];
      if ($catId) {
        unset($project["CategoryId"]);
        $query = "SELECT CategoryId as Id, Name FROM Category WHERE CategoryId = ?";
        $sql = DB::get()->prepare($query);
        execOrError($sql->execute([
          valueOrError($catId,  new ApiException("id does not exist", 500))
        ]), new DatabaseError("Error while trying to find category with id: $catId", 502));
        $category = $sql->fetch();
        if (!$category) {
          throw new ResourceNotFound("A category with the id: $catId could not be found");
        }
      }
      $resBody["result"]["project"] = filterNullCamelCaseKeys($project);
      $resBody["result"]["project"]["category"] = filterNullCamelCaseKeys($category);
    }

    // Finalize (build/transform/filter) response if needed

    // Send response
    $app->res->json($resBody);
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
    // initialize response and request parameters
    $resBody = [];

    $query = "SELECT S.StudentId, S.SchoolId, S.UserId, S.ProjectId, S.GradeLevelId
FROM Student S
    JOIN User U on S.UserId = U.UserId
    JOIN UserYear UY on U.UserId = UY.UserId
  WHERE U.Status = 'active'
  AND UY.Year = YEAR(CURRENT_TIMESTAMP)";

    $sql = DB::get()->prepare($query);

    execOrError($sql->execute([]), new DatabaseError("Failed to retrieve students"));

    // Finalize (build/transform/filter) response if needed
    $students = $sql->fetchAll();
    if (!$students) {
      throw new UserNotFound("No students could be found");
    }
    $resBody["count"] = count($students);
    $resBody["results"] = array_map(function($student) {
      // get user info
      $uid = $student["UserId"];
      unset($student["UserId"]);
      $query = "SELECT UserId as Id, FirstName, LastName, Suffix, Gender, Status FROM User WHERE UserId = ?";
      $sql = DB::get()->prepare($query);
      execOrError($sql->execute([
        valueOrError($uid,  new ApiException("id does not exist", 500))
      ]), new DatabaseError("Error while trying to find user with id: $uid", 502));
      $user = $sql->fetch();
      if (!$user) {
        throw new UserNotFound("A user with the id: $uid could not be found");
      }
      $student["user"] = filterNullCamelCaseKeys($user);

      // get school info
      $schoolId = $student["SchoolId"];
      if ($schoolId) {
        unset($student["SchoolId"]);
        $query = "SELECT SchoolId as Id, Name FROM School WHERE SchoolId = ?";
        $sql = DB::get()->prepare($query);
        execOrError($sql->execute([
          valueOrError($schoolId,  new ApiException("id does not exist", 500))
        ]), new DatabaseError("Error while trying to find school with id: $schoolId", 502));
        $school = $sql->fetch();
        if (!$school) {
          throw new ResourceNotFound("A school with the id: $schoolId could not be found");
        }
        $student["school"] = filterNullCamelCaseKeys($school);
      }

      // get gradeLevel info
      $gradeLevelId = $student["GradeLevelId"];
      if ($gradeLevelId) {
        unset($student["GradeLevelId"]);
        $query = "SELECT GradeLevelId as Id, Name FROM GradeLevel WHERE GradeLevelId = ?";
        $sql = DB::get()->prepare($query);
        execOrError($sql->execute([
          valueOrError($gradeLevelId,  new ApiException("id does not exist", 500))
        ]), new DatabaseError("Error while trying to find gradeLevel with id: $gradeLevelId", 502));
        $gradeLevel = $sql->fetch();
        if (!$gradeLevel) {
          throw new ResourceNotFound("A gradeLevel with the id: $gradeLevelId could not be found");
        }
        $student["gradeLevel"] = filterNullCamelCaseKeys($gradeLevel);
      }

      // get project info
      $projectId = $student["ProjectId"];
      if ($schoolId) {
        unset($student["ProjectId"]);
        $query = "SELECT ProjectId as Id, Name FROM Project WHERE ProjectId = ?";
        $sql = DB::get()->prepare($query);
        execOrError($sql->execute([
          valueOrError($projectId,  new ApiException("id does not exist", 500))
        ]), new DatabaseError("Error while trying to find project with id: $projectId", 502));
        $project = $sql->fetch();
        if (!$project) {
          throw new ResourceNotFound("A project with the id: $projectId could not be found");
        }
        $student["project"] = filterNullCamelCaseKeys($project);
      }
      return filterNullCamelCaseKeys($student);
    }, $students);

    // Send response
    $app->res->json($resBody);
  };
}