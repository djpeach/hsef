<?php require_once $_SERVER['DOCUMENT_ROOT'].'/hsef/helpers/fallback.php'; ?>
<?php
class Queries {
  const GET_AUTHID_BY_EMAIL = 'SELECT AuthAccountId FROM User WHERE Email = ?';
  const GET_PASSWORD_BY_AUTHID = 'SELECT PasswordHash FROM AuthAccount WHERE AuthAccountId = ?';
  const GET_AUTHID_BY_SESSIONID = 'SELECT AuthAccountId FROM AuthSession WHERE SessionId = ?';
  const GET_ISACTIVE_BY_AUTHID = 'SELECT Active FROM AuthAccount WHERE AuthAccountId = ?';
  const REPLACE_SESSION = 'REPLACE INTO AuthSession(SessionId, AuthAccountId, StartTime) VALUES (?, ?, CURRENT_TIMESTAMP)';
}