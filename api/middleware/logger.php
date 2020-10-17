<?php

require_once __DIR__.'/../Slim/Slim/Middleware.php';

class LoggerMiddleware extends \Slim\Middleware {
  public function call() {
    $app = $this->app;
    $req = $app->request;
    file_put_contents("php://stderr", "{$req->getMethod()} request: {$req->getBody()}\n\t@ ");

    $this->next->call();
  }
}