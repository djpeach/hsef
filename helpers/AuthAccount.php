<?php

/**
 * Class Post
 * A custom class to hold AuthenticationAccount details, and to help with authenticating
 */
class AuthAccount {
  private $authenticated;
  private $entitlements;

  public function __construct() {
    $this->authenticated = false;
    $this->entitlements = [];
  }

  public function isAuthenticated() {
    return $this->authenticated;
  }

  public function getEntitlements() {
    return $this->entitlements;
  }

  /**
   * @return bool return whether or not account is authenticated.
   */
  public function authenticate() {
    global $session;
    try {
      $this->authenticateWithSession();
    } catch (Exception $e) {
      $session->flashMessage = $e->getMessage();
      return $this->authenticated;
    }
    return $this->authenticated;
  }

  /**
   * @param string $email Email to authenticate with
   * @param string $password Password to authenticate with. (Unhashed)
   * @return bool Return true if authenticated.
   * @throws Exception
   */
  public function authenticateWithEmailPassword($email, $password) {
    global $db;
    $sql = $db->prepare(Queries::GET_ACTIVE_AUTHID_BY_EMAIL);
    $sql->execute([$email]);
    $authId = $sql->fetchColumn();
    if ($authId) {
      $sql = $db->prepare(Queries::GET_PASSWORD_BY_AUTHID);
      $sql->execute([$authId]);
      $pwdHash = $sql->fetchColumn();
      if ($pwdHash) {
        if (password_verify($password, $pwdHash)) {
          $sql = $db->prepare(Queries::REPLACE_SESSION);
          $sql->execute([session_id(), $authId]);
          $this->authenticated = true;
          return true;
        } else {
          throw new Exception('Password was incorrect. Please try again, or reset your password');
        }
      } else {
        throw new Exception('No authorized account found with the corresponding id, please contact an admin');
      }
    } else {
      throw new Exception('Could not find a user with that email address');
    }
  }

  /**
   * @throws Exception
   */
  public function authenticateWithSession() {
    global $db, $user;

    // check session table for sessionId
    $sql = $db->prepare(Queries::GET_SESSION_BY_ID);
    $sql->execute([session_id()]);
    if ($authSession = $sql->fetch()) {
      $authId = $authSession->AuthAccountId;
      $startTime = $authSession->StartTime;
      $timeElapsed = strtotime(date('Y-m-d h:i:sa')) - strtotime($startTime);
      // check if session was created in last 24 hours. (24 * 60 * 60 = 86,400 seconds)
      if ($timeElapsed > 86400) {
        $this->authenticated = false;
        $sql = $db->prepare(Queries::DELETE_SESSION_BY_ID);
        $sql->execute([session_id()]);
        throw new Exception('This session has timed out, please log in again');
      }
      $sql = $db->prepare(Queries::GET_ISACTIVE_BY_AUTHID);
      $sql->execute([$authId]);
      if ($isActive = $sql->fetchColumn()) {
        $this->authenticated = $isActive;
        if ($this->authenticated) {
          $this->loadUser($authId);
          $this->loadEntitlements();
        }
        return;
      } else {
        $this->authenticated = false;
        throw new Exception('No account associated with this id');
      }
    } else {
      $this->authenticated = false;
      return;
    }
  }

  /**
   * Loads the user
   *
   * @param $authId
   * @throws Exception
   */
  private function loadUser($authId) {
    global $db, $user;

    $sql = $db->prepare(Queries::GET_USER_BY_AUTHID);
    $sql->execute([$authId]);
    if (!($user = $sql->fetchObject('User'))) {
      throw new Exception('Could not find user with that AuthAccountId in the database');
    }

    // add OperatorId to User Profile
    $sql = $db->prepare(Queries::GET_OPID_BY_USERID);
    $sql->execute([$user->UserId]);
    $opid = $sql->fetchColumn();
    if ($opid) {
      $user->OperatorId = $opid;
    } else {
      throw new Exception('Could not find operator with that UserId in the database');
    }
  }

  private function loadEntitlements() {
    global $db, $user;

    $sql = $db->prepare(Queries::GET_ENTITLEMENTS_BY_OPID);
    $sql->execute([$user->OperatorId]);
    $this->entitlements = $sql->fetchAll(PDO::FETCH_COLUMN);
  }

  public function logout() {
    global $db;

    $this->authenticated = false;
    $sql = $db->prepare(Queries::DELETE_SESSION_BY_ID);
    $sql->execute([session_id()]);
    redirect('login');
  }


}