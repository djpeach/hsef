<?php

class User {
  private static $instance;

  // Database Fields
  public $UserId;
  public $FirstName;
  public $LastName;
  public $Gender;
  public $Status;
  public $Suffix;
  public $AuthAccountId;
  public $CheckedIn;
  public $Email;
  public $Year;
  public $OperatorId;

  private function __construct($userId) {
    $this->UserId = $userId;
    $this->loadFromDB();
  }

  public static function get($userId = null) {
    if (!isset(self::$instance)) {
      self::$instance = new User($userId);
    }
    return self::$instance;
  }

  /**
   * Load the user from the database
   *
   * @throws DatabaseException
   */
  private function loadFromDB() {
    $db = DB::get();
    $sql = $db->prepare(Queries::GET_USER_BY_ID);
    $sql->execute([$this->UserId]);
    $obj = $sql->fetch();
    if ($obj) {
      foreach (get_object_vars($obj) as $key => $value) {
        $this->{$key} = $value;
      }
    } else {
      throw new DatabaseException ('Could not load User from database');
    }
  }

  public static function fullName($user = null) {
    if (!$user) {
      $user = self::$instance;
    }
    $name = $user->FirstName;
    $name .= " $user->LastName";
    $name .= $user->Suffix ? " $user->Suffix" : "";
    return $name;
  }
}
