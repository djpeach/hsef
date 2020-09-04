<?php

require '../../vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/', function() use ($app) {
  $app->response->write('Welcome');
});

$app->run();