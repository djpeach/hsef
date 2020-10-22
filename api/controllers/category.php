<?php

// CREATE
function createNewCategory(Slim\Slim $app) {
  return function() use ($app) {
    // Initialize response and request parameters
    $reqBody = $app->req->jsonBody();
    $category = valueOrError($reqBody->category, new BadRequest("You must provide a category object on the request body"));
    $resBody = [];

    // Additional request parameter validation if needed

    // Check for existing resource
    $sql = DB::get()->prepare("SELECT 1 FROM Category WHERE Name = ?");
    execOrError($sql->execute([
      valueOrError($category->name, new BadRequest("Category name cannot be missing or blank")),
    ]), new DatabaseError("Failed when trying to fetch existing category with name: {$category->name}"));
    if ($sql->fetch()) {
      throw new ResourceConflict("A category with name {$category->name} already exists");
    }

    // DB Logic (build response meanwhile if needed)
    $sql = DB::get()->prepare("INSERT INTO Category(Name, Active) VALUES(?, ?)");
    execOrError($sql->execute([
      valueOrError($category->name, new BadRequest("Category name cannot be missing or blank")),
      valueOrDefault($category->active, true)
    ]), new DatabaseError("Failed to create new category", 502));

    $categoryId = DB::get()->lastInsertId();
    $resBody["categoryId"] = $categoryId;

    // Finalize (build/transform/filter) response if needed

    // Send response
    $app->res->json($resBody);
  };
}

// READ
function getCategoryById(Slim\Slim $app) {
  return function() use ($app) {
    echo "Got category by id";
  };
}

// UPDATE
function updateCategoryById(Slim\Slim $app) {
  return function() use ($app) {
    echo "updated category";
  };
}

// DELETE
function deleteCategoryById(Slim\Slim $app) {
  return function() use ($app) {
    echo "deleted category";
  };
}

// LIST
function listCategories(Slim\Slim $app) {
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
    $query = "SELECT C.CategoryId, C.Name, C.Active FROM Category C";

    $sqlParams = [];

    if (isset($active)) {
      $query .= " WHERE C.Active = ?";
      $intBool = $active ? 1 : 0;
      array_push($sqlParams, "%$intBool%");
    }

    if (isset($searchTerm)) {
      $whereTerm = isset($active) ? "AND" : "WHERE";
      $query .= " $whereTerm C.Name LIKE ?";
      array_push($sqlParams, "%$searchTerm%");
    }

    $query .= " LIMIT ? OFFSET ?";
    // get $limit+1 results to determine if more can be fetched after this
    array_push($sqlParams, valueOrError($limit+1, new ApiException("limit does not exist", 500)));
    array_push($sqlParams, valueOrError($offset, new ApiException("offset does not exist", 500)));

    $sql = DB::get()->prepare($query);

    execOrError($sql->execute($sqlParams), new DatabaseError("Failed to retrieve $limit categories with offset $offset"));

    // Finalize (build/transform/filter) response if needed
    $categories = $sql->fetchAll();
    if ($categories) {
      if ($offset > 0) {
        // add prev url
        $prevOffset = max(0, $offset - $limit);
        $prevLimit = min($limit, $offset);
        $prevUrl = "{$app->req->getUrl()}{$app->req->getPath()}?limit=$prevLimit&offset=$prevOffset";
        $prevUrl .= isset($searchTerm) ? "&t=$searchTerm" : "";
        $prevUrl .= isset($active) ? "&active=$active" : "";
        $resBody["links"]["prev"] = $prevUrl;
      }
      if (count($categories) > $limit) {
        // remove last [sentry] admin and return $limit admins only
        // add next url
        array_pop($categories);
        $nextOffset = $offset + $limit;
        $nextUrl = "{$app->req->getUrl()}{$app->req->getPath()}?limit=$limit&offset=$nextOffset";
        $nextUrl .= isset($searchTerm) ? "&t=$searchTerm" : "";
        $nextUrl .= isset($active) ? "&active=$active" : "";
        $resBody["links"]["next"] = $nextUrl;
      }
    } else {
      throw new UserNotFound("No".(isset($active) ? ($active ? " active" : " inactive") : "")." categories with query: $searchTerm could be found");
    }
    $resBody["count"] = count($categories);

    $resBody["results"] = array_map(function($category) {
      return filterNullCamelCaseKeys($category);
    }, $categories);

    // Send response
    $app->res->json($resBody);
  };
}