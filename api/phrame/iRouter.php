<?php

namespace Phrame;

interface iRouter {
  public function get($route, $controller);
  public function post($route, $controller);
  public function handle($req, $res);
}
