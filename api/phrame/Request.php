<?php

namespace Phrame;

require 'iRequest.php';

class Request implements iRequest {

  public $params = array();

  public function __construct() {
    // Add each $_SERVER property to the Request object
    foreach($_SERVER as $key => $value) {
      $camelName = $this->strtocamel($key);
      $this->{$camelName} = $value;
    }
  }

  private function strtocamel($string) {
    $result = strtolower($string);

    preg_match_all('/_[a-z]/', $result, $underscores);

    foreach($underscores[0] as $underscorePair) {
      $upperCaseLetter = strtoupper($underscorePair[1]);
      $result = str_replace($underscorePair, $upperCaseLetter, $result);
    }

    return $result;
  }

  public function body() {
    switch ($this->requestMethod) {
      case ("GET"):
        return null;
      case ("POST"):
        $body = json_decode(file_get_contents('php://input'));
        foreach($_POST as $key => $value) {
          $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }
        return $body;
    }
  }
}