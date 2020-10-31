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
    if ($limit < 0) {
      throw new BadRequest("limit cannot be negative");
    }
    if ($offset < 0) {
      throw new BadRequest("offset cannot be negative");
    }

    // DB Logic (build response meanwhile if needed)
    $query = "SELECT S.SchoolId, S.Name, S.CountyId FROM School S";

    $sqlParams = [];

    if (isset($searchTerm)) {
      $query .= " WHERE S.Name LIKE ?";
      array_push($sqlParams, "%$searchTerm%");
    }

    $query .= " LIMIT ? OFFSET ?";
    // get $limit+1 results to determine if more can be fetched after this
    array_push($sqlParams, valueOrError($limit+1, new ApiException("limit does not exist", 500)));
    array_push($sqlParams, valueOrError($offset, new ApiException("offset does not exist", 500)));

    $sql = DB::get()->prepare($query);

    execOrError($sql->execute($sqlParams), new DatabaseError("Failed to retrieve $limit schools with offset $offset"));

    // Finalize (build/transform/filter) response if needed
    $schools = $sql->fetchAll();
    if ($schools) {
      if ($offset > 0) {
        // add prev url
        $prevOffset = max(0, $offset - $limit);
        $prevLimit = min($limit, $offset);
        $prevUrl = "{$app->req->getUrl()}{$app->req->getPath()}?limit=$prevLimit&offset=$prevOffset";
        $prevUrl .= isset($searchTerm) ? "&t=$searchTerm" : "";
        $resBody["links"]["prev"] = $prevUrl;
      }
      if (count($schools) > $limit) {
        // remove last [sentry] admin and return $limit admins only
        // add next url
        array_pop($schools);
        $nextOffset = $offset + $limit;
        $nextUrl = "{$app->req->getUrl()}{$app->req->getPath()}?limit=$limit&offset=$nextOffset";
        $nextUrl .= isset($searchTerm) ? "&t=$searchTerm" : "";
        $resBody["links"]["next"] = $nextUrl;
      }
    } else {
      throw new UserNotFound("No schools with query: $searchTerm could be found");
    }
    $resBody["count"] = count($schools);

    $resBody["results"] = array_map(function($school) {
      $countyId = $school["CountyId"];
      if ($countyId) {
        unset($school["CountyId"]);
        $sql = DB::get()->prepare("SELECT CountyId as Id, Name FROM County WHERE CountyId = ?");
        execOrError($sql->execute([ $countyId ]), new DatabaseError("Error when fetching county with id: $countyId"));
        $county = $sql->fetch();
        if (!$county) {
          throw new ResourceNotFound("No county with id: $countyId could be found");
        }
        $school["county"] = filterNullCamelCaseKeys($county);
      }
      return filterNullCamelCaseKeys($school);
    }, $schools);

    // Send response
    $app->res->json($resBody);
  };
}