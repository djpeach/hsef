<?php
class Post {
  public function __construct() {
    foreach ($_POST as $key => $postProp) {
      $this->{$key} = $postProp;
    }
  }

  public function __set($name, $value) {
    $this->{$name} = $value;
  }

  public function __get($name) {
    if (isset($this->{$name})) {
      return $this->{$name};
    }

    return NULL;
  }

  public function __isset($name) {
    return isset($this->{$name});
  }

  public function __unset($name) {
    unset($this->{$name});
  }
}