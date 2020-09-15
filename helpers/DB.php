<?php

class DB {
  private static $instance;

  private function __construct() {
    try {
      $host = 'localhost';
      $db   = 'djpeach_db';
      $user = 'djpeach';
      $pass = 'djpeach';
      $charset = 'utf8mb4';

      $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
      $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_EMULATE_PREPARES   => false,
      ];

      self::$instance = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
      // TODO: list admin email, or auto-send email.
      print $e;
      print "Error connecting to database. Contact a admin ASAP!";
      die();
    }
  }

  public static function get() {
    if (!isset(self::$instance)) {
      new DB();
    }
    return self::$instance;
  }
}