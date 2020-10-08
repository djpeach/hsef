<?php
require 'phrame/App.php';
include '../helpers/utils.php';
include '../helpers/Queries.php';
include '../helpers/DB.php';
use Phrame\App as App;

$app = new App();

// CREATE
$app->post('/school', function($req, $res) {
  $sql = DB::get()->prepare(Queries::CREATE_NEW_SCHOOL);
  $body = $req->body();
  try {
    $countyId = $body->countyId ? $body->countyId : null;
    $sql->execute([$body->schoolName, $countyId]);
    $res->json(["createdSchool"=>[
      "name" => $body->schoolName,
      "id" => DB::get()->lastInsertId()
    ]]);
  } catch (PDOException $e) {
    $res->json(["error"=>$e->getMessage()]);
  }
});

$app->post('/county', function($req, $res) {
  $sql = DB::get()->prepare(Queries::CREATE_NEW_COUNTY);
  $body = $req->body();
  try {
    $sql->execute([$body->countyName]);
    $res->json(["createdCounty"=>[
      "name" => $req->body()->countyName,
      "id" => DB::get()->lastInsertId()
    ]]);
  } catch (PDOException $e) {
    $res->json(["error"=>$e->getMessage()]);
  }
});

$app->post('/booth', function($req, $res) {
  $sql = DB::get()->prepare(Queries::CREATE_NEW_BOOTH);
  $body = $req->body();
  try {
    $sql->execute([$body->boothNumber]);
    $res->json(["createdBooth"=>[
      "name" => $body->boothNumber,
      "id" => DB::get()->lastInsertId()
    ]]);
  } catch (PDOException $e) {
    $res->json(["error"=>$e->getMessage()]);
  }
});

$app->post('/category', function($req, $res) {
  $sql = DB::get()->prepare(Queries::CREATE_NEW_CATEGORY);
  $body = $req->body();
  try {
    $sql->execute([$body->categoryName]);
    $res->json(["createdCategory"=>[
      "name" => $body->categoryName,
      "id" => DB::get()->lastInsertId()
    ]]);
  } catch (PDOException $e) {
    $res->json(["error"=>$e->getMessage()]);
  }
});

$app->post('/gradeLevel', function($req, $res) {
  $sql = DB::get()->prepare(Queries::CREATE_NEW_GRADELEVEL);
  $body = $req->body();
  try {
    $sql->execute([$body->gradeLevelName]);
    $res->json(["createdGradeLevel"=>[
      "name" => $body->gradeLevelName,
      "id" => DB::get()->lastInsertId()
    ]]);
  } catch (PDOException $e) {
    $res->json(["error"=>$e->getMessage()]);
  }
});

$app->post('/project', function($req, $res) {
  $sql = DB::get()->prepare(Queries::CREATE_NEW_PROJECT);
  $body = $req->body();
  try {
    $abstract = $body->abstract ? $body->abstract : null;
    $boothId = $body->boothId ? $body->boothId : null;
    $categoryId = $body->categoryId ? $body->categoryId : null;
    $cnid = $body->cnid ? $body->cnid : null;
    $sql->execute([$body->projectNumber, $body->projectName, $abstract, $boothId, $cnid, $categoryId]);
    $res->json(["createdProject"=>[
      "name" => $body->projectName,
      "id" => DB::get()->lastInsertId()
    ]]);
  } catch (PDOException $e) {
    $res->json(["error"=>$e->getMessage()]);
  }
});

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

$app->get('/schools/fuzzyMatch', function ($req, $res) {
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

$app->get('/counties/fuzzyMatch', function ($req, $res) {
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

$app->get('/booths/fuzzyMatch', function ($req, $res) {
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

$app->get('/categories/fuzzyMatch', function ($req, $res) {
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

$app->get('/gradeLevels/fuzzyMatch', function ($req, $res) {
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

$app->get('/projects/fuzzyMatch', function ($req, $res) {
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

$app->get('/archives/judges', function ($req, $res) {
  $sql = DB::get()->prepare(Queries::GET_JUDGES_BY_YEAR);
  $sql->execute([$req->params['year']]);
  $res->json($sql->fetchAll());
});