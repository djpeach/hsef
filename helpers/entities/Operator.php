<?php

class Operator {
  private static $instance;

  // Database Fields
  public $OperatorId;
  public $UserId;

  private $entitlements = [];
  private $categoryPrefs = [];
  private $gradeLevelPrefs = [];

  private function __construct($userId) {
    $this->UserId = $userId;
    $this->loadFromDB();
    $this->loadEntitlements();
    $this->loadCategoryPreferences();
    $this->loadGradeLevelPreferences();
  }

  public static function get($userId = null) {
    if (!isset(self::$instance)) {
      self::$instance = new Operator($userId);
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

    $sql = $db->prepare(Queries::GET_OPERATOR_BY_UID);
    $sql->execute([$this->UserId]);
    $obj = $sql->fetch();
    if ($obj) {
      foreach (get_object_vars($obj) as $key => $value) {
        $this->{$key} = $value;
      }
    } else {
      throw new DatabaseException ('Could not load Operator from database');
    }
  }

  /**
   * Loads entitlements of the Operator from the database
   * @throws DatabaseException
   */
  private function loadEntitlements() {
    $db = DB::get();
    $sql = $db->prepare(Queries::GET_ENTITLEMENT_NAMES_BY_OPID);
    if ($sql->execute([$this->OperatorId])) {
      $entitlements = $sql->fetchAll(PDO::FETCH_COLUMN);
      if ($entitlements) {
        $this->entitlements = array_map('strtolower', $entitlements);
      }
    } else {
      throw new DatabaseException ('Could not fetch Operator Entitlements from database');
    }
  }

  /**
   * Loads category preferences of the Operator from the database
   * @throws DatabaseException
   */
  private function loadCategoryPreferences() {
    $db = DB::get();
    $sql = $db->prepare(Queries::GET_CATEGORY_NAMES_BY_OPID);
    if ($sql->execute([$this->OperatorId])) {
      $categories = $sql->fetchAll(PDO::FETCH_COLUMN);
      if ($categories) {
        $this->categoryPrefs = array_map('strtolower', $categories);
      }
    } else {
      throw new DatabaseException ('Could not fetch Operator Category Preferences from database');
    }
  }

  /**
   * Loads grade level preferences of the Operator from the database
   * @throws DatabaseException
   */
  private function loadGradeLevelPreferences() {
    $db = DB::get();
    $sql = $db->prepare(Queries::GET_GRADELEVEL_NAMES_BY_OPID);
    if ($sql->execute([$this->OperatorId])) {
      $gradeLevels = $sql->fetchAll(PDO::FETCH_COLUMN);
      if ($gradeLevels) {
        $this->gradeLevelPrefs = array_map('strtolower', $gradeLevels);
      }
    } else {
      throw new DatabaseException ('Could not fetch Operator GradeLevel Preferences from database');
    }
  }

  public function getEntitlements() {
    return $this->entitlements;
  }

  /**
   * Check if the user has the required entitlement
   *
   * @param $entitlement
   * @return bool
   */
  public function hasReqEntitlement($entitlement) {
    return in_array(strtolower($entitlement), $this->entitlements);
  }

  /**
   * Check if the user has the all the required entitlements
   *
   * @param $entitlements
   * @return bool
   */
  public function hasAllReqEntitlements($entitlements) {
    foreach ($entitlements as $entitlement) {
      if (!in_array(strtolower($entitlement), $this->entitlements)) {
        return false;
      }
    }
    return true;
  }

  /**
   * Check if the user has at least one required entitlement
   *
   * @param $entitlements
   * @return bool
   */
  public function hasOneOfReqEntitlement($entitlements) {
    foreach ($entitlements as $entitlement) {
      if (in_array(strtolower($entitlement), $this->entitlements)) {
        return true;
      }
    }
    return false;
  }
}
