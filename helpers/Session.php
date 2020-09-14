<?php

ini_set('session.cookie_lifetime', 86400);
ini_set('session.name', 'hsef');

/**
 * Class Session
 * A class to make using $_SESSION unified and familiar
 */
class Session {

  public function __construct() {
    session_start();
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