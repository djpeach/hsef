<?php

class User {
  public $UserId;
  public $FirstName;
  public $MiddleName;
  public $LastName;
  public $Gender;
  public $Status;
  public $Suffix;
  public $AuthAccountId;
  public $CheckedIn;
  public $Email;
  public $Year;
  public $OperatorId;

  public function __construct() {}

  public function fullName() {
    $name = $this->FirstName;
    $name .= $this->MiddleName ? " $this->MiddleName" : "";
    $name .= " $this->LastName";
    $name .= $this->Suffix ? " $this->Suffix" : "";
    return $name;
  }
}
