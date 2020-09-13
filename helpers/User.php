<?php require_once $_SERVER['DOCUMENT_ROOT'].'/hsef/helpers/fallback.php'; ?>
<?php

class User {
  public $UserId;
  public $FirstName;
  public $MiddleName;
  public $LastName;
  public $Gender;
  public $Status;
  public $AuthAccountId;
  public $CheckedIn;
  public $Email;
  public $Year;
  public $OperatorId;

  public function __construct() {}
}
