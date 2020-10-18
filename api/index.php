<?php
require 'Slim/Slim/Slim.php';
\Slim\Slim::registerAutoloader();
require_once 'exceptions.php';
require_once 'DB.php';

// require needed files
$directories = [ "middleware", "routers"];
foreach ($directories as $directory) {
  foreach(glob($directory."/*.php") as $file) {
    require_once $file;
  }
}

$app = new Slim\Slim([
  "debug" => false
]);
$app->add(new \LoggerMiddleware());
$app->add(new \CorsMiddleware());

$app->get('/ping', function() {
  echo 'pong';
});

$app->group('/create', createRouter($app));
$app->group('/read', readRouter($app));
$app->group('/update', updateRouter($app));
$app->group('/delete', deleteRouter($app));
$app->group('/list', listRouter($app));

$app->error(function (Exception $e) use ($app) {
  try {
    throw $e;
  } catch (ApiException $e) {
    $app->response->setStatus($e->getCode());
    $app->response->setBody(json_encode($e->data));
  } catch (PDOException $e) {
    $err = [
      "error" => get_class($e),
      "code" => $e->errorInfo[1],
      "message" => $e->getMessage()
    ];
    if ($err["code"] === 1062) { // duplicate entry
      $app->response->setStatus(419);
      $app->response->setBody(json_encode($err));
    } else if ($err["code"] === 1048) { // missing data
      $app->response->setStatus(400);
      $app->response->setBody(json_encode($err));
    } else {
      $app->response->setStatus(500);
      $app->response->setBody(json_encode($err));
    }
  } catch (Exception $e) {
    $err = [
      "error" => get_class($e),
      "code" => $e->getCode(),
      "message" => $e->getMessage()
    ];
    $app->response->setStatus($e->getCode());
    $app->response->setBody(json_encode($err));
  }
});

$app->run();