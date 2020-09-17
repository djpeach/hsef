<?php

class JS {
  private static $instance;
  private $scripts = [];

  private function __construct() {}

  public static function get() {
    if (!isset(self::$instance)) {
      self::$instance = new JS();
    }
    return self::$instance;
  }

  public function add($scriptName) {
    if (!in_array($scriptName, $this->scripts)) {
      array_push($this->scripts, $scriptName);
    }
  }

  public function loadScripts() {
    foreach ($this->scripts as $script) {
      echo "<script src='/hsef/js/$script.js'></script>\n";
    }
  }
}