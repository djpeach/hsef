<?php

# this is relative to the root index.php
# TODO: check that this file exists, if not assume dev is trying to run server only from api directory and try that
require 'api/vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/ping', function() use ($app) {
  $app->response->write('pong');
});

$app->run();