
<?php

class DB {
  private static $instance;

  /**
   * DB constructor.
   * @throws DatabaseError
   */
  private function __construct() {
    try {
      $host = 'localhost';
      $db   = getenv('DB_USERNAME').'_db';
      $user = getenv('DB_USERNAME');
      $pass = getenv('DB_PWD');
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
      throw new DatabaseError();
    }
  }

  public static function get() {
    if (!isset(self::$instance)) {
      new DB();
    }
    return self::$instance;
  }
}