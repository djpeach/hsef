<?php require_once $_SERVER['DOCUMENT_ROOT'].'/helpers/fallback.php'; ?>
<?php

class AuthAccount {
  private $authenticated;

  public function __construct() {
    $this->authenticated = false;
  }

  public function isAuthenticated() {
    if ($this->authenticated) return true;
    try {
      $this->authenticateWithSession();
    } catch (Exception $e) {
      // TODO: Log this exception bc something went wrong trying to authenticate with session.
      return false;
    }
    return $this->authenticated;
  }

  /**
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
        }
        throw new Exception('Password was incorrect. Please try again, or reset your password');
      }
      throw new Exception('No authorized account found with the corresponding id, please contact an admin');
    }
    throw new Exception('Could not find a user with that email address');
  }

  /**
   * @throws Exception
   */
  public function authenticateWithSession() {
    global $session, $db;

    // check session table for sessionId
    $sql = $db->prepare(Queries::GET_AUTHID_BY_SESSIONID);
    $sql->execute([session_id()]);
    if ($authId = $sql->fetchColumn()) {
      $sql = $db->prepare(Queries::GET_ISACTIVE_BY_AUTHID);
      $sql->execute([$authId]);
      if ($isActive = $sql->fetchColumn()) {
        $this->authenticated = $isActive;
        return;
      }
      throw new Exception('No account associated with this id');
    }
    throw new Exception('No account associated with this session');
    // check auth account with authaccountid is active
    // set authenticated to true
  }


}