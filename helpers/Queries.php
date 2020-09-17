<?php

/**
 * Class Queries
 * A class with static consts to centralize the most used queries
 */
class Queries {
  const GET_CURRENT_USERID_BY_EMAIL = "SELECT UserId FROM User WHERE Email = ? AND Status = 'active'";
  const GET_AUTHID_BY_USERID = 'SELECT AuthAccountId FROM AuthAccount WHERE UserId = ?';
  const GET_AUTHACCOUNT_BY_ID = 'SELECT * FROM AuthAccount WHERE AuthAccountId = ?';
  const GET_SESSION_BY_ID = 'SELECT * FROM AuthSession WHERE SessionId = ?';
  const REPLACE_SESSION = 'REPLACE INTO AuthSession(SessionId, AuthAccountId, StartTime) VALUES (?, ?, CURRENT_TIMESTAMP)';
  const DELETE_SESSION_BY_ID = 'DELETE FROM AuthSession WHERE SessionId = ?';
  const GET_USER_BY_ID = 'SELECT * FROM User WHERE UserId = ?';
  const GET_OPERATOR_BY_USERID = 'SELECT * FROM Operator WHERE UserId = ?';
  const GET_OPERATOR_BY_ID = 'SELECT * FROM Operator WHERE OperatorId = ?';
  const GET_ENTITLEMENTS_BY_OPID = 'SELECT Name FROM Entitlement WHERE EntitlementId in (SELECT EntitlementId FROM OperatorEntitlement WHERE OperatorId = ?)';
  const GET_CATEGORIES_BY_OPID = 'SELECT Name FROM Category WHERE CategoryId in (SELECT CategoryId FROM OperatorCategory WHERE OperatorId = ?)';
  const GET_GRADELEVELS_BY_OPID = 'SELECT Name FROM GradeLevel WHERE GradeLevelId in (SELECT GradeLevelId FROM OperatorGradeLevel WHERE OperatorId = ?)';

  const GET_ALL_ADMINS =
    "SELECT 
       O.OperatorId, 
       U.UserId,
       U.FirstName, 
       U.MiddleName, 
       U.LastName, 
       U.Suffix, 
       U.Email, 
       U.CheckedIn 
FROM Operator O 
    JOIN OperatorEntitlement OE 
        on O.OperatorId = OE.OperatorId 
    JOIN Entitlement E 
        on OE.EntitlementId = E.EntitlementId
    JOIN User U 
        on O.UserId = U.UserId
WHERE E.Name = 'Admin' 
GROUP BY O.OperatorId;";

  const GET_USERS_TO_PROMOTE_TO_ADMIN =
    "SELECT 
       O.OperatorId, 
       U.FirstName, 
       U.LastName,
       U.UserId
FROM Operator O
    JOIN User U on O.UserId = U.UserId
WHERE O.OperatorId NOT IN (SELECT OperatorId FROM OperatorEntitlement OE2 WHERE OE2.EntitlementId = 3)
AND (U.FirstName LIKE ? OR U.LastName LIKE ?)";

  const QUERY_USERS_BY_NAME =
    "SELECT * 
FROM User
WHERE FirstName 
          LIKE ? 
   OR LastName 
          LIKE ?";

}