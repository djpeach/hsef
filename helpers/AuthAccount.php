<?php

/**
 * Class Post
 * A custom class to hold AuthenticationAccount details, and to help with authenticating
 */
class AuthAccount {
  private static $instance;

  private $authenticated = false;

  // Database Fields
  public $AuthAccountId;
  public $UserId;
  public $Active;
  public $PasswordHash;

  private function __construct() {}

  public static function get() {
    if (!isset(self::$instance)) {
      self::$instance = new AuthAccount();
    }
    return self::$instance;
  }

  public function isAuthenticated() {
    return $this->authenticated;
  }

  /**
   * Authenticate the user via internal strategies
   *
   * @return void
   */
  public function authenticate() {
    try {
      $this->authenticateWithSession();
    } catch (Exception $e) {
      Session::get()->flashMessage = $e->getMessage();
    }
  }

  /**
   * Authenticate user, and create auth session for them in the database
   *
   * @param string $email Email to authenticate with
   * @param string $password Password to authenticate with. (Unhashed)
   * @throws AuthException
   * @throws DatabaseException
   */
  public function authenticateWithEmailPassword($email, $password) {
    $db = DB::get();
    $sql = $db->prepare(Queries::GET_ACTIVE_USERID_BY_EMAIL);
    $sql->execute([$email]);
    $uid = $sql->fetchColumn();
    if ($uid) {
      $sql = $db->prepare(Queries::GET_AUTHID_BY_USERID);
      $sql->execute([$uid]);
      $authId = $sql->fetchColumn();
      if ($authId) {
        $this->loadFromDB($authId);
        if (password_verify($password, $this->PasswordHash)) {
          $sql = $db->prepare(Queries::REPLACE_SESSION);
          $replaced = $sql->execute([session_id(), $this->AuthAccountId]);
          if (!$replaced) {
            throw new AuthException('Could not create auth session in database, you will need to log in again');
          }
          $this->authenticated = true;
          return;
        } else {
          throw new AuthException('Password incorrect, please try again, or reset your password');
        }
      } else {
        throw new AuthException('This user does not have an auth account to log in with');
      }
    } else {
      throw new AuthException('Could not find an active user with that email address');
    }
  }

  /**
   * @param $userId
   * @return false|string
   * @throws DatabaseException
   */
  public static function generateAccountWithUserId($userId) {
    $pwd = generateRandomString(12);
    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
    $sql = DB::get()->prepare(Queries::CREATE_AUTHACCOUNT_WITH_PASSWORD_AND_USERID);
    if (!$sql->execute([$pwd, $userId])) {
      throw new DatabaseException('Failed to generate auth account for user');
    }
    return $pwd;
  }

  /**
   * Look up auth session for this user and authenticate if valid
   *
   * @throws Exception
   */
  public function authenticateWithSession() {
    $db = DB::get();

    // check session table for sessionId
    $sql = $db->prepare(Queries::GET_SESSION_BY_ID);
    $sql->execute([session_id()]);
    $authSession = $sql->fetch();
    if ($authSession) {
      $timeElapsed = strtotime(date('Y-m-d h:i:sa')) - strtotime($authSession->StartTime);
      // check if session was created in last 24 hours. (24 * 60 * 60 = 86,400 seconds)
      if ($timeElapsed > 86400) {
        $this->authenticated = false;
        $sql = $db->prepare(Queries::DELETE_SESSION_BY_ID);
        $sql->execute([session_id()]);
        throw new AuthException('This session has timed out, please log in again');
      }
      $this->loadFromDB($authSession->AuthAccountId);
      $this->authenticated = $this->Active;
    } else {
      $this->authenticated = false;
    }
  }

  /**
   * Load the auth account from the database
   *
   * @param $id
   * @throws DatabaseException
   */
  private function loadFromDB($id) {
    $db = DB::get();
    $sql = $db->prepare(Queries::GET_AUTHACCOUNT_BY_ID);
    $sql->execute([$id]);
    $obj = $sql->fetch();
    if ($obj) {
      foreach (get_object_vars($obj) as $key => $value) {
        $this->{$key} = $value;
      }
    } else {
      throw new DatabaseException ('Could not load Auth Account from database');
    }
  }

  public function logout() {
    $db = DB::get();
    $session = Session::get();

    $sql = $db->prepare(Queries::DELETE_SESSION_BY_ID);
    if ($sql->execute([session_id()])) {
      $this->authenticated = false;
      redirect('login');
    } else {
      $session->flashMessage = 'Could not log out user, please try again';
    }
  }


}