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
# students
INSERT INTO User(UserId, FirstName, LastName, Status)
VALUES (7, 'Beatrice', 'Ortega', 'active');
INSERT INTO User(UserId, FirstName, LastName, Status)
VALUES (8, 'Elysia', 'Driscoll', 'active');
INSERT INTO User(UserId, FirstName, LastName, Status)
VALUES (9, 'Jazmin', 'Roberson', 'active');
INSERT INTO User(UserId, FirstName, LastName, Status)
VALUES (10, 'Lindsey', 'Stone', 'active');
INSERT INTO User(UserId, FirstName, LastName, Status)
VALUES (11, 'Peggy', 'Finnegan', 'active');
INSERT INTO User(UserId, FirstName, LastName, Status)
VALUES (12, 'Sebastien', 'Glover', 'active');
INSERT INTO User(UserId, FirstName, LastName, Status)
VALUES (13, 'Darnell', 'Lennon', 'active');
INSERT INTO User(UserId, FirstName, LastName, Status)
VALUES (14, 'Aamir', 'Browning', 'active');
INSERT INTO User(UserId, FirstName, LastName, Status)
VALUES (15, 'Parker', 'Henderson', 'active');

INSERT INTO AuthAccount(AuthAccountId, PasswordHash, UserId)
VALUES (1, '$2y$10$EEhxG.T6J7nCu5ieTllTsuvvOdF606zuGfZdur/RcTvfxpg/vxZfW', 1);
INSERT INTO AuthAccount(AuthAccountId, PasswordHash, UserId)
VALUES (2, '$2y$10$oDxFkCtEjgAmJb7VQrpJTeq6DU5ICU1O3xBl1uWyteAh2ngusNns6', 2);
INSERT INTO AuthAccount(AuthAccountId, PasswordHash, UserId)
VALUES (3, '$2y$10$QEGvUI8tmr8JiBvqd6BRfel4QlSGJNadsEmtVnm5rfILLIEg0CMUi', 3);
INSERT INTO AuthAccount(AuthAccountId,  PasswordHash, UserId)
VALUES (4, '$2y$10$PP7DCm/dqE7fPjRYyPyjDeMzuBB7hG6LDdw8v0d5ypbIyfDRXv/HC', 4);
INSERT INTO AuthAccount(AuthAccountId, PasswordHash, UserId)
VALUES (5, '$2y$10$qPYniUF.xnAqQLS0c9hRLeyrCURFfQ/fBS2foss9BBB88sxFNQVRC', 5);
INSERT INTO AuthAccount(AuthAccountId, PasswordHash, UserId)
VALUES (6, '$2y$10$FvhE/RIh5WAvzsydAj0mte8U6e3dDogK6SP.dY/PuvuG6E9k3KvWS', 6);

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

INSERT INTO Student(UserId)
VALUES (7);
INSERT INTO Student(UserId)
VALUES (8);
INSERT INTO Student(UserId)
VALUES (9);
INSERT INTO Student(UserId)
VALUES (10);
INSERT INTO Student(UserId)
VALUES (11);
INSERT INTO Student(UserId)
VALUES (12);
INSERT INTO Student(UserId)
VALUES (13);
INSERT INTO Student(UserId)
VALUES (14);
INSERT INTO Student(UserId)
VALUES (15);

INSERT INTO Booth(Number)
VALUES (100);
INSERT INTO Booth(Number)
VALUES (101);
INSERT INTO Booth(Number)
VALUES (102);
INSERT INTO Booth(Number)
VALUES (103);
INSERT INTO Booth(Number)
VALUES (104);
INSERT INTO Booth(Number)
VALUES (105);

# ----- Downs ----- #
SET FOREIGN_KEY_CHECKS = 0;
DELETE FROM OperatorEntitlement WHERE OperatorId in (1, 2, 3, 4, 5, 6);
DELETE FROM Entitlement WHERE EntitlementId in (1, 2, 3, 4, 5);
DELETE FROM Operator WHERE OperatorId in (1, 2, 3, 4, 5, 6);
DELETE FROM User WHERE UserId in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15);
DELETE FROM AuthAccount WHERE AuthAccountId in (1, 2, 3, 4, 5, 6);
DELETE FROM Student WHERE UserId in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15);
DELETE FROM Booth WHERE Number in (100, 101, 102, 103, 104, 105);
SET FOREIGN_KEY_CHECKS = 1;