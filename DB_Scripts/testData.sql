# ----- Ups ----- #
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email)
VALUES (1, 'Daniel', 'Peach', 'male', 'active', 'djpeach@iu.edu'); # 1
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email)
VALUES (2, 'Ashley', 'Harris', 'female', 'active', 'harris16@iu.edu'); # 2
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email)
VALUES (3, 'Daniel', 'Northam', 'male', 'active', 'dnortham@iu.edu'); # 3
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email)
VALUES (4, 'Kate', 'Davis', 'female', 'active', 'kadadavi@iu.edu'); # 4
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email)
VALUES (5, 'Andy', 'Harris', 'male', 'active', 'ajharris@iupui.edu'); # 5
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email)
VALUES (6, 'Lingma', 'Acheson', 'female', 'active', 'linglu@iupui.edu'); # 6

INSERT INTO AuthAccount(AuthAccountId, Username, PasswordHash, UserId)
VALUES (1, 'djpeach', '$2y$10$EEhxG.T6J7nCu5ieTllTsuvvOdF606zuGfZdur/RcTvfxpg/vxZfW', 1);
INSERT INTO AuthAccount(AuthAccountId, Username, PasswordHash, UserId)
VALUES (2, 'harris16', '$2y$10$oDxFkCtEjgAmJb7VQrpJTeq6DU5ICU1O3xBl1uWyteAh2ngusNns6', 2);
INSERT INTO AuthAccount(AuthAccountId, Username, PasswordHash, UserId)
VALUES (3, 'dnortham', '$2y$10$QEGvUI8tmr8JiBvqd6BRfel4QlSGJNadsEmtVnm5rfILLIEg0CMUi', 3);
INSERT INTO AuthAccount(AuthAccountId, Username, PasswordHash, UserId)
VALUES (4, 'kadadavi', '$2y$10$PP7DCm/dqE7fPjRYyPyjDeMzuBB7hG6LDdw8v0d5ypbIyfDRXv/HC', 4);
INSERT INTO AuthAccount(AuthAccountId, Username, PasswordHash, UserId)
VALUES (5, 'ajharris', '$2y$10$qPYniUF.xnAqQLS0c9hRLeyrCURFfQ/fBS2foss9BBB88sxFNQVRC', 5);
INSERT INTO AuthAccount(AuthAccountId, Username, PasswordHash, UserId)
VALUES (6, 'linglu', '$2y$10$FvhE/RIh5WAvzsydAj0mte8U6e3dDogK6SP.dY/PuvuG6E9k3KvWS', 6);

INSERT INTO Operator(OperatorId, UserId)
VALUES (1, 1);
INSERT INTO Operator(OperatorId, UserId)
VALUES (2, 2);
INSERT INTO Operator(OperatorId, UserId)
VALUES (3, 3);
INSERT INTO Operator(OperatorId, UserId)
VALUES (4, 4);
INSERT INTO Operator(OperatorId, UserId)
VALUES (5, 5);
INSERT INTO Operator(OperatorId, UserId)
VALUES (6, 6);

INSERT INTO Entitlement(EntitlementId, Name)
VALUES (1, 'owner');
INSERT INTO Entitlement(EntitlementId, Name)
VALUES (2, 'moderator');
INSERT INTO Entitlement(EntitlementId, Name)
VALUES (3, 'admin');
INSERT INTO Entitlement(EntitlementId, Name)
VALUES (4, 'judge');
INSERT INTO Entitlement(EntitlementId, Name)
VALUES (5, 'viewer');

INSERT INTO OperatorEntitlement(OperatorId, EntitlementId)
VALUES (1, 1);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId)
VALUES (1, 2);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId)
VALUES (1, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId)
VALUES (1, 4);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId)
VALUES (1, 5);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId)
VALUES (2, 1);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId)
VALUES (2, 2);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId)
VALUES (2, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId)
VALUES (2, 4);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId)
VALUES (2, 5);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId)
VALUES (3, 1);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId)
VALUES (3, 2);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId)
VALUES (3, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId)
VALUES (3, 4);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId)
VALUES (3, 5);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId)
VALUES (4, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId)
VALUES (5, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId)
VALUES (6, 3);

# ----- Downs ----- #
SET FOREIGN_KEY_CHECKS = 0;
DELETE FROM OperatorEntitlement WHERE OperatorId in (1, 2, 3, 4, 5, 6);
DELETE FROM Entitlement WHERE EntitlementId in (1, 2, 3, 4, 5);
DELETE FROM Operator WHERE OperatorId in (1, 2, 3, 4, 5, 6);
DELETE FROM User WHERE UserId in (1, 2, 3, 4, 5, 6);
DELETE FROM AuthAccount WHERE AuthAccountId in (1, 2, 3, 4, 5, 6);
SET FOREIGN_KEY_CHECKS = 1;