<?php

# this is relative to the root index.php
require 'server/vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/', function() use ($app) {
  $app->response->write('Hello World!');
});

$app->run();