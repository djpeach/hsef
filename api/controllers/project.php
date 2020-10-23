<?php

// CREATE
function createNewProject(Slim\Slim $app) {
  return function() use ($app) {
    // Initialize response and request parameters
    $reqBody = $app->req->jsonBody();
    $project = valueOrError($reqBody->project, new BadRequest("You must provide a project object on the request body"));
    $resBody = [];

    // Additional request parameter validation if needed

    // Check for existing resource
    $sql = DB::get()->prepare("SELECT 1 FROM Project WHERE Name = ?");
    execOrError($sql->execute([
      valueOrError($project->name, new BadRequest("Project name cannot be missing or blank")),
    ]), new DatabaseError("Failed when trying to fetch existing project with name: {$project->name}"));
    if ($sql->fetch()) {
      throw new ResourceConflict("A project this year with name {$project->name} already exists");
    }

    // DB Logic (build response meanwhile if needed)
    $sql = DB::get()->prepare("INSERT INTO Project(Number, Name, Abstract, BoothId, CourseNetworkingId, CategoryId) VALUES(?, ?, ?, ?, ?, ?)");
    execOrError($sql->execute([
      valueOrNull($project->number),
      valueOrError($project->name, new BadRequest("Project name cannot be missing or blank")),
      valueOrNull($project->abstract),
      valueOrNull($project->boothId),
      valueOrNull($project->courseNetworkingId),
      valueOrNull($project->categoryId),
    ]), new DatabaseError("Failed to create new project", 502));

    $projectId = DB::get()->lastInsertId();
    $resBody["projectId"] = $projectId;

    // Finalize (build/transform/filter) response if needed

    // Send response
    $app->res->json($resBody);
  };
}

// READ
function getProjectById(Slim\Slim $app) {
  return function() use ($app) {
    echo "Got project by id";
  };
}

// UPDATE
function updateProjectById(Slim\Slim $app) {
  return function() use ($app) {
    echo "updated project";
  };
}

// DELETE
function deleteProjectById(Slim\Slim $app) {
  return function() use ($app) {
    echo "deleted project";
  };
}

// LIST
function listProjects(Slim\Slim $app) {
  return function() use ($app) {
    // Initialize response and request parameters
    $reqParams = valueOrDefault($app->req->jsonParams(), new stdClass());
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
    if ($limit < 0) {
      throw new BadRequest("limit cannot be negative");
    }
    if ($offset < 0) {
      throw new BadRequest("offset cannot be negative");
    }

    // DB Logic (build response meanwhile if needed)
    $query = "SELECT P.ProjectId, P.Name, P.Number, P.BoothId, P.CategoryId FROM Project P";

    $sqlParams = [];

    if (isset($searchTerm)) {
      $query .= " WHERE P.Name LIKE ?";
      array_push($sqlParams, "%$searchTerm%");
    }

    $query .= " LIMIT ? OFFSET ?";
    // get $limit+1 results to determine if more can be fetched after this
    array_push($sqlParams, valueOrError($limit+1, new ApiException("limit does not exist", 500)));
    array_push($sqlParams, valueOrError($offset, new ApiException("offset does not exist", 500)));

    $sql = DB::get()->prepare($query);

    execOrError($sql->execute($sqlParams), new DatabaseError("Failed to retrieve $limit categories with offset $offset"));

    // Finalize (build/transform/filter) response if needed
    $projects = $sql->fetchAll();
    if ($projects) {
      if ($offset > 0) {
        // add prev url
        $prevOffset = max(0, $offset - $limit);
        $prevLimit = min($limit, $offset);
        $prevUrl = "{$app->req->getUrl()}{$app->req->getPath()}?limit=$prevLimit&offset=$prevOffset";
        $prevUrl .= isset($searchTerm) ? "&t=$searchTerm" : "";
        $resBody["links"]["prev"] = $prevUrl;
      }
      if (count($projects) > $limit) {
        // remove last [sentry] admin and return $limit admins only
        // add next url
        array_pop($projects);
        $nextOffset = $offset + $limit;
        $nextUrl = "{$app->req->getUrl()}{$app->req->getPath()}?limit=$limit&offset=$nextOffset";
        $nextUrl .= isset($searchTerm) ? "&t=$searchTerm" : "";
        $resBody["links"]["next"] = $nextUrl;
      }
    } else {
      throw new UserNotFound("No".(isset($active) ? ($active ? " active" : " inactive") : "")." categories with query: $searchTerm could be found");
    }
    $resBody["count"] = count($projects);

    $resBody["results"] = array_map(function($project) {
      // get booth info
      $boothId = $project["BoothId"];
      if ($boothId) {
        unset($project["BoothId"]);
        $query = "SELECT BoothId as Id, Number FROM Booth WHERE BoothId = ?";
        $sql = DB::get()->prepare($query);
        execOrError($sql->execute([
          valueOrError($boothId,  new ApiException("boothId does not exist", 500))
        ]), new DatabaseError("Error while trying to find booth with id: $boothId", 502));
        $booth = $sql->fetch();
        if (!$booth) {
          throw new ResourceNotFound("A booth with the id: $boothId could not be found");
        }
        $project["booth"] = filterNullCamelCaseKeys($booth);
      }

      // get category info
      $categoryId = $project["CategoryId"];
      if ($categoryId) {
        unset($project["CategoryId"]);
        $query = "SELECT CategoryId as Id, Name FROM Category WHERE CategoryId = ?";
        $sql = DB::get()->prepare($query);
        execOrError($sql->execute([
          valueOrError($categoryId,  new ApiException("categoryId does not exist", 500))
        ]), new DatabaseError("Error while trying to find category with id: $categoryId", 502));
        $category = $sql->fetch();
        if (!$category) {
          throw new ResourceNotFound("A category with the id: $category could not be found");
        }
        $project["category"] = filterNullCamelCaseKeys($category);
      }
      return filterNullCamelCaseKeys($project);
    }, $projects);

    // Send response
    $app->res->json($resBody);
  };
}