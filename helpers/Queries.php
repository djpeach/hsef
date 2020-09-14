<?php

/**
 * Class Queries
 * A class with static consts to centralize the most used queries
 */
class Queries {
  const GET_ACTIVE_AUTHID_BY_EMAIL = 'SELECT AuthAccountId FROM User WHERE Email = ? AND DateCreated >= DATE_SUB(NOW(), INTERVAL 1 YEAR)';
  const GET_PASSWORD_BY_AUTHID = 'SELECT PasswordHash FROM AuthAccount WHERE AuthAccountId = ?';
  const GET_SESSION_BY_ID = 'SELECT * FROM AuthSession WHERE SessionId = ?';
  const GET_ISACTIVE_BY_AUTHID = 'SELECT Active FROM AuthAccount WHERE AuthAccountId = ?';
  const REPLACE_SESSION = 'REPLACE INTO AuthSession(SessionId, AuthAccountId, StartTime) VALUES (?, ?, CURRENT_TIMESTAMP)';
  const DELETE_SESSION_BY_ID = 'DELETE FROM AuthSession WHERE SessionId = ?';
  const GET_OPID_BY_USERID = 'SELECT OperatorId FROM Operator WHERE UserId = ?';
  const GET_USER_BY_AUTHID = 'SELECT * FROM User WHERE AuthAccountId = ?';
  const GET_ENTITLEMENTS_BY_OPID = 'SELECT Name FROM Entitlement WHERE EntitlementId in (SELECT EntitlementId FROM OperatorEntitlement WHERE OperatorId = ?)';
}