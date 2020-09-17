<?php
require 'phrame/App.php';
use Phrame\App as App;

$app = new App();

$app->get('/users/query', function ($req, $res) {
  $res->json([["name"=>"Daniel Peach", "id"=>1],["name"=>"Ashley Harris", "id"=>2],["name"=>"Daniel Northam", "id"=>3],["name"=>"Kate Davis", "id"=>4]]);
});