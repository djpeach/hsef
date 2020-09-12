<?php
  class Errors {
    private $isEmpty;

    public function __construct($isEmpty = true) {
      $this->isEmpty = $isEmpty;
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
?>