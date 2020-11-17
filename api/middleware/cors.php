<?php

require_once __DIR__.'/../Slim/Slim/Middleware.php';

class CorsMiddleware extends \Slim\Middleware {
  public function call() {
    $app = $this->app;
    $res = $app->res;
    $req = $app->req;
    

    $allowedOrigins = [
      'http://localhost:8080',
      'http://localhost:9000',
      'http://corsair.cs.iupui.edu:24631',
      'http://10.0.0.183:8080',
      'http://192.168.1.2:8080'
    ];

    $reqOrigin = $req->headers->get('origin');
    if (in_array($reqOrigin, $allowedOrigins)) {
      $origin = $reqOrigin;
    } else {
      $origin = 'http://corsair.cs.iupui.edu:24631';
    }

    $headers = [
      "Access-Control-Allow-Origin" => $origin,
      "Access-Control-Allow-Methods" => "GET, POST, OPTIONS, PUT, DELETE",
      "Access-Control-Allow-Headers" => "X-Requested-With, content-type, Authorization",
      "Access-Control-Max-Age" => "86400",
      "Access-Control-Allow-Credentials" => 'true',
    ];

    foreach ($headers as $key => $val) {
      $res->headers->set($key, $val);
    }

    // add options route handler for whatever the request may be
    if ($app->req->isOptions()) {
      $app->options('/:route+', function() {});
    }
    $this->next->call();
  }
}