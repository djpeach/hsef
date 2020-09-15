<?php

/**
 * Class Session
 * A class to make using $_SESSION unified and familiar
 */
class Session {

  private static $instance;

  private function __construct() {
    ini_set('session.cookie_lifetime', 86400);
    ini_set('session.name', 'hsef');

    session_start();
  }

  public static function get() {
    if (!isset(self::$instance)) {
      self::$instance = new Session();
    }
    return self::$instance;
  }

  public function __set($name, $value) {
    $_SESSION[$name] = $value;
  }

  public function __get($name) {
    if (isset($_SESSION[$name])) {
      return $_SESSION[$name];
    }

    return NULL;
  }

  public function __isset($name) {
    return isset($_SESSION[$name]);
  }

  public function __unset($name) {
    unset($_SESSION[$name]);
  }
}

Session::get();