<?php

namespace Phrame;

require 'Router.php';
require 'Request.php';
require 'Response.php';

class App {

  private $router;

  public function __construct() {
    $this->router = new Router();
  }

  public function get($route, $controller) {
    $this->router->get($route, $controller);
  }

  public function post($route, $controller) {
    $this->router->post($route, $controller);
  }

  private function run() {
    $req = new Request();
    $res = new Response();
    $this->router->handle($req, $res);
  }

  public function __destruct() {
    $this->run();
  }
}
