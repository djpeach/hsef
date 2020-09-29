<?php

class ModalLoader {
  private static $instance;
  private $modals = [];

  private function __construct() {}

  public static function get() {
    if (!isset(self::$instance)) {
      self::$instance = new ModalLoader();
    }
    return self::$instance;
  }

  public function add($modalName) {
    if (!in_array($modalName, $this->modals)) {
      array_push($this->modals, $modalName);
    }
  }

  public function pop() {
    return array_shift($this->modals);
  }
}