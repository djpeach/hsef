<?php

require_once __DIR__.'/../Slim/Slim/Middleware.php';

class JSONMiddleware extends \Slim\Middleware {
  public function call() {
    $this->next->call();
    $resBody = $this->app->res->getBody();
    $this->app->res->headers->set("Content-Type", "application/json");
  }
}