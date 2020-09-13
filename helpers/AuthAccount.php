<?php require_once $_SERVER['DOCUMENT_ROOT'].'/hsef/helpers/fallback.php'; ?>
<?php

/**
 * Class Post
 * A custom class to hold AuthenticationAccount details, and to help with authenticating
 */
class AuthAccount {
  private $authenticated;

  public function __construct() {
    $this->authenticated = false;
  }

  /**
   * @return bool return whether or not account is authenticated.
   */
  public function isAuthenticated() {
    global $session;
    if ($this->authenticated) return true;
    try {
      $this->authenticateWithSession();
    } catch (Exception $e) {
      $session->flashMessage = $e->getMessage();
      return false;
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
    $sql = $db->prepare(Queries::GET_AUTHID_BY_EMAIL);
    $sql->execute([$email]);
    if ($authId = $sql->fetchColumn()) {
      $sql = $db->prepare(Queries::GET_PASSWORD_BY_AUTHID);
      $sql->execute([$authId]);
      if ($pwdHash = $sql->fetchColumn()) {
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
    global $db;

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

  public function logout() {
    global $db;

    $this->authenticated = false;
    $sql = $db->prepare(Queries::DELETE_SESSION_BY_ID);
    $sql->execute([session_id()]);
  }


}