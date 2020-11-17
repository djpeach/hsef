<?php
require 'Slim/Slim/Slim.php';
\Slim\Slim::registerAutoloader();
require_once 'exceptions.php';
require_once 'DB.php';
require_once 'utils.php';

error_reporting(E_ALL & ~E_NOTICE);

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
$app->add(new \JSONMiddleware());

$app->get('/ping', function() {
  echo 'pong';
});

$app->group('/create', createRouter($app));
$app->group('/read', readRouter($app));
$app->group('/update', updateRouter($app));
$app->group('/delete', deleteRouter($app));
$app->group('/list', listRouter($app));
$app->group('/auth', authRouter($app));

$app->error(function (Exception $e) use ($app) {
  try {
    throw $e;
  } catch (ApiException $e) {
    $app->res->setStatus($e->getCode());
    $app->res->json($e->data);
  } catch (PDOException $e) {
    $err = [
      "error" => get_class($e),
      "code" => $e->errorInfo[1],
      "message" => $e->getMessage(),
      "file" => $e->getFile(),
      "line" => $e->getLine(),
    ];
    if ($err["code"] === 1062) { // duplicate entry
      $app->res->setStatus(419);
      $app->res->json($err);
    } else if ($err["code"] === 1048) { // missing data
      $app->res->setStatus(400);
      $app->res->json($err);
    } else {
      $app->res->setStatus(500);
      $app->res->json($err);
    }
  } catch (Exception $e) {
    $err = [
      "error" => get_class($e),
      "code" => $e->getCode(),
      "message" => $e->getMessage(),
      "file" => $e->getFile(),
      "line" => $e->getLine(),
    ];
    $app->res->setStatus($e->getCode());
    $app->res->json($err);
  }
});

$app->run();