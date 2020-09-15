<?php
require 'phrame/App.php';
use Phrame\App as App;

$app = new App();

$app->get('/', function($req, $res) {
  $res->json($req);
});

$app->get('/ping', function($req, $res) {
  $res->send('pong');
});

$app->get('/another/test', function($req, $res) {
  $res->send('success');
});

$app->delete('/admin/:id', function($req, $res) {
  // run db delete
  $res->send('success');
});