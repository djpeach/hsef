<?php

require_once __DIR__.'/../Slim/Slim/Middleware.php';

class LoggerMiddleware extends \Slim\Middleware {

  private function buildParamUrl($req) {
    $url = $req->getUrl();
    $url .= $req->getPath();
    $paramCount = count($req->params());
    if ($paramCount > 0) {
      $url .= "?";
    }
    $i = 0;
    foreach($req->params() as $key => $value) {
      $i++;
      $url .= "$key=$value";
      if ($i < $paramCount) {
        $url .= "&";
      }
    }
    return $url;
  }

  public function call() {
    $app = $this->app;
    $req = $app->request;
    $paramUrl = $this->buildParamUrl($req);
    file_put_contents("php://stderr", "{$req->getMethod()} request: {$paramUrl} ");
    $body = $req->getBody();
    if ($body) {
      file_put_contents("php://stderr", "\n\t{$body}");
    }
    file_put_contents("php://stderr", "\n\t\t@ ");

    $this->next->call();
  }
}