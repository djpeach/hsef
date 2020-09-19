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

  private function pullOffParams($rawRoute, $req) {
    preg_match_all('/[?,&]([^[=,&]]*[^&]*)/', $rawRoute, $queries);
    foreach ($queries[1] as $query) {
      preg_match_all('/([^=]*)={0,1}(.*)/', $query, $queryParts);
      $key = $queryParts[1][0];
      $value = $queryParts[2][0];
      $req->params[$key] = $value;
    }
    preg_match('/([^?]*)/', $rawRoute, $route);
    return $route[0];
  }

  private function normalizeRoute($rawRoute) {
    $route = str_replace('/hsef/api', '', $rawRoute);
    if (strlen($route) > 1 && substr($route, -1) === '/') {
      $route = substr($route, 0, -1);
    }
    return $route;
  }

  public function handle($req, $res) {
    $methodsMap = $this->{strtoupper($req->requestMethod)};
    $route = $this->pullOffParams($req->requestUri, $req);
    $route = $this->normalizeRoute($route);
    if (array_key_exists($route, $methodsMap)) {
      $methodsMap[$route]($req, $res);
    } else {
      header("{$req->serverProtocol} 404 Not Found");
    }
  }
}