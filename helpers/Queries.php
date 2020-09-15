<?php

/**
 * Class Queries
 * A class with static consts to centralize the most used queries
 */
class Queries {
  const GET_CURRENT_USERID_BY_EMAIL = 'SELECT UserId FROM User WHERE Email = ? AND DateCreated >= DATE_SUB(NOW(), INTERVAL 1 YEAR)';
  const GET_AUTHID_BY_USERID = 'SELECT AuthAccountId FROM AuthAccount WHERE UserId = ?';
  const GET_AUTHACCOUNT_BY_ID = 'SELECT * FROM AuthAccount WHERE AuthAccountId = ?';
  const GET_SESSION_BY_ID = 'SELECT * FROM AuthSession WHERE SessionId = ?';
  const REPLACE_SESSION = 'REPLACE INTO AuthSession(SessionId, AuthAccountId, StartTime) VALUES (?, ?, CURRENT_TIMESTAMP)';
  const DELETE_SESSION_BY_ID = 'DELETE FROM AuthSession WHERE SessionId = ?';
  const GET_USER_BY_ID = 'SELECT * FROM User WHERE UserId = ?';
  const GET_OPERATOR_BY_USERID = 'SELECT * FROM Operator WHERE UserId = ?';
  const GET_ENTITLEMENTS_BY_OPID = 'SELECT Name FROM Entitlement WHERE EntitlementId in (SELECT EntitlementId FROM OperatorEntitlement WHERE OperatorId = ?)';
  const GET_CATEGORIES_BY_OPID = 'SELECT Name FROM Category WHERE CategoryId in (SELECT CategoryId FROM OperatorCategory WHERE OperatorId = ?)';
  const GET_GRADELEVELS_BY_OPID = 'SELECT Name FROM GradeLevel WHERE GradeLevelId in (SELECT GradeLevelId FROM OperatorGradeLevel WHERE OperatorId = ?)';

  const GET_ALL_ADMINS =
    "SELECT 
       DISTINCT O.OperatorId, 
       U.FirstName, 
       U.MiddleName, 
       U.LastName, 
       U.Suffix, 
       U.Email, 
       U.CheckedIn 
FROM Operator O 
    JOIN OperatorEntitlement OE 
        on O.OperatorId = OE.OperatorId 
    JOIN User U 
        on O.UserId = U.UserId;";

}