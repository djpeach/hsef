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