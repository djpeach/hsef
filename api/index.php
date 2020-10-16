<?php
require 'Slim/Slim/Slim.php';
require 'middleware/cors.php';

\Slim\Slim::registerAutoloader();

$app = new Slim\Slim();
$app->add(new \CorsMiddleware());

$app->get('/ping', function() use ($app) {
  echo 'pong';
});

$app->run();