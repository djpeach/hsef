<?php
require 'phrame/App.php';
include '../helpers/utils.php';
include '../helpers/Queries.php';
include '../helpers/DB.php';
use Phrame\App as App;

$app = new App();

/**
 * params:
 *    query => The query string to fuzzy match against
 * return:
 *    {UserId: int, FirstName: string, LastName: string}
 */
$app->get('/users/fuzzyMatch', function ($req, $res) {
  $sql = DB::get()->prepare(Queries::QUERY_USERS_BY_NAME);
  $query = "%{$req->params['term']}%";
  $sql->execute([$query, $query]);
  $users = array_map(function($user) {
    return [
      "label" => $user->FirstName.' '.$user->LastName,
      "value" => $user->UserId
    ];
  }, $sql->fetchAll());
  $res->json($users);
});

/**
 * params:
 *    query => The query string to fuzzy match against
 * return:
 *    {UserId: int, FirstName: string, LastName: string}
 */
$app->get('/users/fuzzyMatch/promote-to-admin', function ($req, $res) {
  $sql = DB::get()->prepare(Queries::GET_USERS_TO_PROMOTE_TO_ADMIN);
  $query = "%{$req->params['term']}%";
  $sql->execute([$query, $query]);
  $users = array_map(function($user) {
    return [
      "label" => $user->FirstName.' '.$user->LastName,
      "value" => $user->UserId
    ];
  }, $sql->fetchAll());
  $res->json($users);
});

/**
 * params:
 *    query => The query string to fuzzy match against
 * return:
 *    {UserId: int, FirstName: string, LastName: string}
 */
$app->get('/users/fuzzyMatch/promote-to-judge', function ($req, $res) {
  $sql = DB::get()->prepare(Queries::GET_USERS_TO_PROMOTE_TO_JUDGE);
  $query = "%{$req->params['term']}%";
  $sql->execute([$query, $query]);
  $users = array_map(function($user) {
    return [
      "label" => $user->FirstName.' '.$user->LastName,
      "value" => $user->UserId
    ];
  }, $sql->fetchAll());
  $res->json($users);
});

/**
 * params:
 *    query => The query string to fuzzy match against
 * return:
 *    {UserId: int, FirstName: string, LastName: string}
 */
$app->get('/users/fuzzyMatch/school', function ($req, $res) {
  $sql = DB::get()->prepare(Queries::QUERY_SCHOOLS_BY_NAME);
  $query = "%{$req->params['term']}%";
  $sql->execute([$query]);
  $schools = array_map(function($school) {
    return [
      "label" => $school->Name,
      "value" => $school->SchoolId
    ];
  }, $sql->fetchAll());
  $res->json($schools);
});

/**
 * params:
 *    query => The query string to fuzzy match against
 * return:
 *    {UserId: int, FirstName: string, LastName: string}
 */
$app->get('/users/fuzzyMatch/county', function ($req, $res) {
  $sql = DB::get()->prepare(Queries::QUERY_COUNTIES_BY_NAME);
  $query = "%{$req->params['term']}%";
  $sql->execute([$query]);
  $counties = array_map(function($county) {
    return [
      "label" => $county->Name,
      "value" => $county->CountyId
    ];
  }, $sql->fetchAll());
  $res->json($counties);
});

/**
 * params:
 *    query => The query string to fuzzy match against
 * return:
 *    {UserId: int, FirstName: string, LastName: string}
 */
$app->get('/users/fuzzyMatch/booth', function ($req, $res) {
  $sql = DB::get()->prepare(Queries::QUERY_BOOTHS_BY_NUMBER);
  $query = "%{$req->params['term']}%";
  $sql->execute([$query]);
  $booths = array_map(function($booth) {
    return [
      "label" => $booth->Number,
      "value" => $booth->BoothId
    ];
  }, $sql->fetchAll());
  $res->json($booths);
});

/**
 * params:
 *    query => The query string to fuzzy match against
 * return:
 *    {UserId: int, FirstName: string, LastName: string}
 */
$app->get('/users/fuzzyMatch/category', function ($req, $res) {
  $sql = DB::get()->prepare(Queries::QUERY_CATEGORIES_BY_NAME);
  $query = "%{$req->params['term']}%";
  $sql->execute([$query]);
  $categories = array_map(function($category) {
    return [
      "label" => $category->Name,
      "value" => $category->CategoryId
    ];
  }, $sql->fetchAll());
  $res->json($categories);
});

/**
 * params:
 *    query => The query string to fuzzy match against
 * return:
 *    {UserId: int, FirstName: string, LastName: string}
 */
$app->get('/users/fuzzyMatch/gradeLevel', function ($req, $res) {
  $sql = DB::get()->prepare(Queries::QUERY_GRADELEVELS_BY_NAME);
  $query = "%{$req->params['term']}%";
  $sql->execute([$query]);
  $categories = array_map(function($category) {
    return [
      "label" => $category->Name,
      "value" => $category->GradeLevelId
    ];
  }, $sql->fetchAll());
  $res->json($categories);
});

/**
 * params:
 *    query => The query string to fuzzy match against
 * return:
 *    {UserId: int, FirstName: string, LastName: string}
 */
$app->get('/users/fuzzyMatch/project', function ($req, $res) {
  $sql = DB::get()->prepare(Queries::QUERY_PROJECTS_BY_NAME);
  $query = "%{$req->params['term']}%";
  $sql->execute([$query]);
  $categories = array_map(function($category) {
    return [
      "label" => $category->Name,
      "value" => $category->ProjectId
    ];
  }, $sql->fetchAll());
  $res->json($categories);
});

$app->post('/school', function($req, $res) {
  // TODO: Create new school
  $sql = DB::get()->prepare(Queries::CREATE_NEW_SCHOOL);
  $body = $req->body();
  try {
    $countyId = $body->countyId ? $body->countyId : null;
    $sql->execute([$req->body()->name, $countyId]);
    $res->json(["createdSchool"=>[
      "name" => $body->name,
      "id" => DB::get()->lastInsertId()
    ]]);
  } catch (PDOException $e) {
    $res->json(["error"=>$e->getMessage()]);
  }
});

$app->post('/county', function($req, $res) {
  // TODO: Create new school
  $sql = DB::get()->prepare(Queries::CREATE_NEW_COUNTY);
  try {
    $sql->execute([$req->body()->name]);
    $res->json(["createdCounty"=>[
      "name" => $req->body()->name,
      "id" => DB::get()->lastInsertId()
    ]]);
  } catch (PDOException $e) {
    $res->json(["error"=>$e->getMessage()]);
  }
});

$app->post('/booth', function($req, $res) {
  // TODO: Create new school
  $sql = DB::get()->prepare(Queries::CREATE_NEW_BOOTH);
  try {
    $sql->execute([$req->body()->boothNumber]);
    $res->json(["createdBooth"=>[
      "name" => $req->body()->boothNumber,
      "id" => DB::get()->lastInsertId()
    ]]);
  } catch (PDOException $e) {
    $res->json(["error"=>$e->getMessage()]);
  }
});

$app->post('/category', function($req, $res) {
  // TODO: Create new school
  $sql = DB::get()->prepare(Queries::CREATE_NEW_CATEGORY);
  try {
    $sql->execute([$req->body()->categoryName]);
    $res->json(["createdCategory"=>[
      "name" => $req->body()->categoryName,
      "id" => DB::get()->lastInsertId()
    ]]);
  } catch (PDOException $e) {
    $res->json(["error"=>$e->getMessage()]);
  }
});

$app->post('/gradeLevel', function($req, $res) {
  // TODO: Create new school
  $sql = DB::get()->prepare(Queries::CREATE_NEW_GRADELEVEL);
  try {
    $sql->execute([$req->body()->name]);
    $res->json(["createdGradeLevel"=>[
      "name" => $req->body()->name,
      "id" => DB::get()->lastInsertId()
    ]]);
  } catch (PDOException $e) {
    $res->json(["error"=>$e->getMessage()]);
  }
});

$app->post('/project', function($req, $res) {
  // TODO: Create new school
  $sql = DB::get()->prepare(Queries::CREATE_NEW_PROJECT);
  try {
    $body = $req->body();
    $abstract = isset($body->abstract) ? $body->abstract : null;
    $boothId = isset($body->boothId) ? $body->boothId : null;
    $categoryId = isset($body->categoryId) ? $body->categoryId : null;
    $cnid = isset($body->cnid) ? $body->cnid : null;
    $sql->execute([$body->number, $body->name, $abstract, $boothId, $cnid, $categoryId]);
    $res->json(["createdProject"=>[
      "name" => $body->name,
      "id" => DB::get()->lastInsertId()
    ]]);
  } catch (PDOException $e) {
    $res->json(["error"=>$e->getMessage()]);
  }
});