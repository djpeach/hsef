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
    $resBody = [];

    // DB Logic (build response meanwhile if needed)
    $query = "SELECT C.CategoryId, C.Name, C.Active FROM Category C";

    $sqlParams = [];

    $sql = DB::get()->prepare($query);

    execOrError($sql->execute($sqlParams), new DatabaseError("Failed to retrieve categories"));

    // Finalize (build/transform/filter) response if needed
    $categories = $sql->fetchAll();
    if (!$categories) {
      throw new UserNotFound("No categories could be found");

    }
    $resBody["count"] = count($categories);

    $resBody["results"] = array_map(function($category) {
      return filterNullCamelCaseKeys($category);
    }, $categories);

    // Send response
    $app->res->json($resBody);
  };
}