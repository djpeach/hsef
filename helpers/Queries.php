<?php require_once $_SERVER['DOCUMENT_ROOT'].'/hsef/helpers/fallback.php'; ?>
<?php

/**
 * Class Queries
 * A class with static consts to centralize the most used queries
 */
class Queries {
  const GET_AUTHID_BY_EMAIL = 'SELECT AuthAccountId FROM User WHERE Email = ?';
  const GET_PASSWORD_BY_AUTHID = 'SELECT PasswordHash FROM AuthAccount WHERE AuthAccountId = ?';
  const GET_SESSION_BY_ID = 'SELECT * FROM AuthSession WHERE SessionId = ?';
  const GET_ISACTIVE_BY_AUTHID = 'SELECT Active FROM AuthAccount WHERE AuthAccountId = ?';
  const REPLACE_SESSION = 'REPLACE INTO AuthSession(SessionId, AuthAccountId, StartTime) VALUES (?, ?, CURRENT_TIMESTAMP)';
  const DELETE_SESSION_BY_ID = 'DELETE FROM AuthSession WHERE SessionId = ?';
}