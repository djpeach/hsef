<?php
function strtocamel($str) {
  $res = strtolower($str);
  preg_match_all('/_[a-z]/', $res, $_UppercasePairs);
  foreach ($_UppercasePairs[0] as $_UppercasePair) {
    $res = str_replace($_UppercasePair, strtoupper($_UppercasePair[1]), $res);
  }
  return $res;
}

function cameltostr($camel) {
  $res = $camel;
  preg_match_all('/[A-Z]/', $res, $UppercaseLetters);
  foreach ($UppercaseLetters[0] as $UppercaseLetter) {
    $res = str_replace($UppercaseLetter, ' '.$UppercaseLetter, $res);
  }
  return ucfirst($res);
}


class Post {
  public function __construct() {
    foreach ($_POST as $key => $postProp) {
      $this->{$key} = $postProp;
    }
  }

  public function __get($name) {
    if (isset($this->{$name})) {
      return $this->{$name};
    }

    return NULL;
  }
}

class Errors {
  private $isEmpty;

  public function __construct() {
    $this->isEmpty = $_SERVER['REQUEST_METHOD'] === 'POST';
  }

  public function __get($name) {
    if (isset($this->{$name})) {
      return $this->{$name};
    }

    return NULL;
  }

  public function __set($name, $value) {
    $this->isEmpty = false;
    $this->{$name} = $value;
  }

  public function isEmpty() {
    return $this->isEmpty;
  }
}