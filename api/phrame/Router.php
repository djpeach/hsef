<?php

namespace Phrame;

require 'iRouter.php';

class Router implements iRouter {

  private $GET;
  private $POST;

  public function __construct() {}

  public function get($route, $controller) {
    $this->GET[$route] = $controller;
  }

  public function post($route, $controller) {
    $this->POST[$route] = $controller;
  }

  private function normalizeRoute($rawRoute) {
    $route = str_replace('/hsef/api', '', $rawRoute);
    if (strlen($route) > 1 && substr($route, -1) === '/') {
      $route = substr($route, 0, -1);
    }
    return $route;
  }

  public function handle($req, $res) {
    $method = strtoupper($req->requestMethod);
    $methodsMap = $this->{$method};
    $route = $this->normalizeRoute($req->requestUri);
    $handler = $methodsMap[$route];
    $handler($req, $res);
  }
}