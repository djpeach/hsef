<?php

/**
 * Class Queries
 * A class with static consts to centralize the most used queries
 */
class Queries {

  // Auth Account
  const CREATE_NEW_AUTHACCOUNT = "INSERT INTO AuthAccount(PasswordHash, UserId) VALUES(?, ?)";
  const GET_AUTHACCOUNT_BY_UID = "SELECT * FROM AuthAccount WHERE UserId = ?";
  const GET_AUTHACCOUNT_BY_ID = "SELECT * FROM AuthAccount WHERE AuthAccountId = ?";
  const GET_AUTHACCOUNT_BY_OPID = "SELECT * FROM AuthAccount WHERE UserId = (SELECT UserId FROM Operator WHERE OperatorId = ?)";
  const RESET_PASSWORD_BY_OPID = "UPDATE AuthAccount SET PasswordHash=? WHERE UserId = (SELECT UserId FROM Operator WHERE OperatorId = ?)";
  const DELETE_AUTHACCOUNT_BY_ID = "DELETE FROM AuthAccount WHERE AuthAccountId = ?";

  // Auth Session
  const REPLACE_SESSION = "REPLACE INTO AuthSession(SessionId, AuthAccountId, StartTime) VALUES (?, ?, CURRENT_TIMESTAMP)";
  const GET_SESSION_BY_ID = "SELECT * FROM AuthSession WHERE SessionId = ?";
  const DELETE_SESSION_BY_ID = "DELETE FROM AuthSession WHERE SessionId = ?";

  // Booths
  const CREATE_ACTIVE_BOOTH = "INSERT INTO Booth(Number, Active) VALUES(?, true)";
  const GET_ACTIVE_BOOTHS = "SELECT * FROM Booth WHERE Active = true";
  const UPDATE_BOOTH_NUMBER_BY_ID = "UPDATE Booth SET Number=? WHERE BoothId = ?";
  const DEACTIVATE_BOOTH_BY_ID = "UPDATE Booth SET Active=false WHERE BoothId = ?";
  const ACTIVATE_BOOTH_BY_ID = "UPDATE Booth SET Active=true WHERE BoothId = ?";
  const DELETE_BOOTH_BY_ID = "DELETE FROM Booth WHERE BoothId = ?";

  // Categories
  const CREATE_ACTIVE_CATEGORY = "INSERT INTO Category(Name, Active) VALUES(?, true)";
  const GET_CATEGORY_NAMES_BY_OPID = "SELECT Name FROM Category WHERE CategoryId in (SELECT CategoryId FROM OperatorCategory WHERE OperatorId = ?)";
  const UPDATE_CATEGORY_NAME_BY_ID = "UPDATE Category SET Name=? WHERE CategoryId = ?";
  const DEACTIVATE_CATEGORY_BY_ID = "UPDATE Category SET Active=false WHERE CategoryId = ?";
  const ACTIVATE_CATEGORY_BY_ID = "UPDATE Category SET Active=true WHERE CategoryId = ?";
  const DELETE_CATEGORY_BY_ID = "DELETE FROM Category WHERE CategoryId = ?";

  // Counties
  const CREATE_COUNTY_WITH_NAME = "INSERT INTO County(Name) VALUES (?)";
  const QUERY_COUNTIES_BY_NAME = "SELECT * FROM County WHERE Name LIKE ?";
  const UPDATE_COUNTY_NAME_BY_ID = "UPDATE County SET Name=? WHERE CountyId = ?";
  const DELETE_COUNTY_BY_ID = "DELETE FROM County WHERE CountyId = ?";

  // Entitlements
  // TODO: Allow creation and management of Entitlements
  const GET_ENTITLEMENT_NAMES_BY_OPID = "SELECT Name FROM Entitlement WHERE EntitlementId in (SELECT EntitlementId FROM OperatorEntitlement WHERE OperatorId = ?)";

  // Grade Levels
  const CREATE_ACTIVE_GRADELEVEL = "INSERT INTO GradeLevel(Name, Active) VALUES(?, true)";
  const GET_GRADELEVEL_NAMES_BY_OPID = "SELECT Name FROM GradeLevel WHERE GradeLevelId in (SELECT GradeLevelId FROM OperatorGradeLevel WHERE OperatorId = ?)";
  const UPDATE_GRADELEVEL_NAME_BY_ID = "UPDATE GradeLevel SET Name=? WHERE GradeLevelId = ?";
  const DEACTIVATE_GRADELEVEL_BY_ID = "UPDATE GradeLevel SET Active=false WHERE GradeLevelId = ?";
  const ACTIVATE_GRADELEVEL_BY_ID = "UPDATE GradeLevel SET Active=true WHERE GradeLevelId = ?";
  const DELETE_GRADELEVEL_BY_ID = "DELETE FROM GradeLevel WHERE GradeLevelId = ?";

  // JudgingSessions
  // TODO: Strategize management of judging sessions

  // Operators
  const CREATE_NEW_OPERATOR_WITH_UID = "INSERT INTO Operator(UserId, Title, HighestDegree) VALUES (?, ?, ?)";
  const GET_OPERATOR_BY_UID = "SELECT * FROM Operator WHERE UserId = ?";
  const GET_OPERATOR_BY_ID = "SELECT * FROM Operator WHERE OperatorId = ?";
  const UPDATE_OPERATOR_BY_UID = "UPDATE Operator SET Title=?, HIGHESTDEGREE=? WHERE UserId = ?";
  const UPDATE_OPERATOR_BY_ID = "UPDATE Operator SET Title=?, HIGHESTDEGREE=? WHERE OperatorId = ?";
  const DELETE_OPERATOR_BY_ID = "DELETE FROM Operator WHERE OperatorId = ?";

  // Operator Category Preferences
  const ADD_CATEGORY_TO_OPERATOR = "INSERT INTO OperatorCategory(CategoryId, OperatorId) VALUES(?, ?)";
  const REMOVE_CATEGORY_FROM_OPERATOR = "DELETE FROM OperatorCategory WHERE CategoryId = ? AND OperatorId = ?";

  // Operator Entitlements
  const ADD_ENTITLEMENT_TO_OPERATOR = "INSERT INTO OperatorEntitlement(EntitlementId, OperatorId) VALUES(?, ?)";
  const REMOVE_ENTITLEMENT_FROM_OPERATOR = "DELETE FROM OperatorEntitlement WHERE EntitlementId = ? AND OperatorId = ?";
  const NEW_ADMIN_BY_UID = "INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES ((SELECT UserId FROM Operator WHERE Operator.OperatorId = ?), (SELECT EntitlementId FROM Entitlement WHERE Name = 'admin'))";
  const REMOVE_ADMIN_BY_OPID = "DELETE FROM OperatorEntitlement WHERE OperatorId = ? and EntitlementId = (SELECT EntitlementId FROM Entitlement WHERE Name = 'admin')";
  const NEW_JUDGE_BY_UID = "INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES ((SELECT UserId FROM Operator WHERE Operator.OperatorId = ?), (SELECT EntitlementId FROM Entitlement WHERE Name = 'judge'))";
  const REMOVE_JUDGE_BY_OPID = "DELETE FROM OperatorEntitlement WHERE OperatorId = ? and EntitlementId = (SELECT EntitlementId FROM Entitlement WHERE Name = 'judge')";
  const NEW_MODERATOR_BY_UID = "INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES ((SELECT UserId FROM Operator WHERE Operator.OperatorId = ?), (SELECT EntitlementId FROM Entitlement WHERE Name = 'moderator'))";
  const REMOVE_MODERATOR_BY_OPID = "DELETE FROM OperatorEntitlement WHERE OperatorId = ? and EntitlementId = (SELECT EntitlementId FROM Entitlement WHERE Name = 'moderator')";

  // Operator Grade Level Preferences
  const ADD_GRADELEVEL_TO_OPERATOR = "INSERT INTO OperatorGradeLevel(GradeLevelId, OperatorId) VALUES(?, ?)";
  const REMOVE_GRADELEVEL_FROM_OPERATOR = "DELETE FROM OperatorGradeLevel WHERE GradeLevelId = ? AND OperatorId = ?";

  // Projects
  const CREATE_NEW_PROJECT_WITH_NAME = "INSERT INTO Project(Name) VALUES(?)";
  const CREATE_NEW_PROJECT = "INSERT INTO Project(Number, Name, GradeLevelId, Abstract, BoothId, CourseNetworkingId, CategoryId) VALUES(?, ?, ?, ?, ?, ?, ?)";
  const GET_PROJECT_BY_ID = "SELECT * FROM Project WHERE ProjectId = ?";
  const UPDATE_PROJECT_BY_ID = "UPDATE Project SET Number=?, Name=?, GradeLevelId=?, Abstract=?, BoothId=?, CourseNetworkingId=?, CategoryId=? WHERE ProjectId = ?";

  // Rankings
  // TODO: Strategize management of rankings

  // Schools
  // TODO

  // Students
  // TODO

  // Time Slots
  // TODO: Strategize management of time slots

  // Users
  const GET_ACTIVE_USER_BY_EMAIL = "SELECT * FROM User WHERE Email = ? AND Status = 'active'";
  const GET_USER_BY_ID = "SELECT * FROM User WHERE UserId = ?";
  const GET_USER_BY_OPID = "SELECT * FROM User WHERE UserId = (SELECT UserId FROM Operator WHERE OperatorId = ?)";
  const GET_USER_BY_AUTHID = "SELECT * FROM User WHERE UserId = (SELECT UserId FROM AuthAccount WHERE AuthAccountId = ?)";
  const QUERY_USERS_BY_NAME = "SELECT * FROM User WHERE FirstName OR LastName LIKE ?";
  const UPDATE_USER_BY_OPID = "UPDATE User SET FirstName=?, LastName=?, Suffix=?, Email=? WHERE UserId = (SELECT UserId FROM Operator WHERE OperatorId = ?)";
  const CREATE_NEW_USER_WITH_EMAIL = "INSERT INTO User(FirstName, LastName, Suffix, Status, Email) VALUES(?, ?, ?, 'active', ?)";
  const ARCHIVE_USER_BY_OPID = "UPDATE User SET Status='archived' WHERE UserId = (SELECT UserId FROM Operator WHERE OperatorId = ?)";
  const ARCHIVE_USER_BY_UID = "UPDATE User SET Status='archived' WHERE UserId = ?";

  // User Years
  // TODO

  // Joins
  const GET_ALL_ACTIVE_ADMINS =
    "SELECT 
       O.OperatorId, 
       U.UserId,
       U.FirstName, 
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
WHERE E.Name = 'admin'
AND U.Status = 'active'
GROUP BY O.OperatorId;";

  const GET_ALL_ACTIVE_JUDGES =
    "SELECT 
       O.OperatorId, 
       U.UserId,
       U.FirstName, 
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
WHERE E.Name = 'judge'
AND U.Status = 'active'
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

  const GET_USERS_TO_PROMOTE_TO_JUDGE =
    "SELECT 
       O.OperatorId, 
       U.FirstName, 
       U.LastName,
       U.UserId
FROM Operator O
    JOIN User U on O.UserId = U.UserId
WHERE O.OperatorId NOT IN (SELECT OperatorId FROM OperatorEntitlement OE2 WHERE OE2.EntitlementId = 4)
AND (U.FirstName LIKE ? OR U.LastName LIKE ?)";
}