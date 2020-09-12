# ----- Ups ----- #
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email, CreateBy, UpdateBy)
VALUES (1, 'Daniel', 'Peach', 'male', 'active', 'djpeach@iu.edu', 1, 1); # 1
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email, CreateBy, UpdateBy)
VALUES (2, 'Ashley', 'Harris', 'female', 'active', 'aharris@iu.edu', 1, 1); # 2
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email, CreateBy, UpdateBy)
VALUES (3, 'Daniel', 'Northam', 'male', 'active', 'dnortham@iu.edu', 1, 1); # 3
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email, CreateBy, UpdateBy)
VALUES (4, 'Kate', 'Davis', 'female', 'active', 'kdavis@iu.edu', 1, 1); # 4
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email, CreateBy, UpdateBy)
VALUES (5, 'Andy', 'Harris', 'male', 'active', 'ajharris@iu.edu', 1, 1); # 5
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email, CreateBy, UpdateBy)
VALUES (6, 'Lingma', 'Acheson', 'female', 'active', 'lacheson@iu.edu', 1, 1); # 6

INSERT INTO AuthAccount(AuthAccountId, Username, PasswordHash, CreateBy, UpdateBy)
VALUES (1, 'djpeach', '$2y$10$EEhxG.T6J7nCu5ieTllTsuvvOdF606zuGfZdur/RcTvfxpg/vxZfW', 1, 1);
INSERT INTO AuthAccount(AuthAccountId, Username, PasswordHash, CreateBy, UpdateBy)
VALUES (2, 'aharris', '$2y$10$oDxFkCtEjgAmJb7VQrpJTeq6DU5ICU1O3xBl1uWyteAh2ngusNns6', 1, 1);
INSERT INTO AuthAccount(AuthAccountId, Username, PasswordHash, CreateBy, UpdateBy)
VALUES (3, 'dnortham', '$2y$10$QEGvUI8tmr8JiBvqd6BRfel4QlSGJNadsEmtVnm5rfILLIEg0CMUi', 1, 1);
INSERT INTO AuthAccount(AuthAccountId, Username, PasswordHash, CreateBy, UpdateBy)
VALUES (4, 'kdavis', '$2y$10$PP7DCm/dqE7fPjRYyPyjDeMzuBB7hG6LDdw8v0d5ypbIyfDRXv/HC', 1, 1);
INSERT INTO AuthAccount(AuthAccountId, Username, PasswordHash, CreateBy, UpdateBy)
VALUES (5, 'ajharris', '$2y$10$qPYniUF.xnAqQLS0c9hRLeyrCURFfQ/fBS2foss9BBB88sxFNQVRC', 1, 1);
INSERT INTO AuthAccount(AuthAccountId, Username, PasswordHash, CreateBy, UpdateBy)
VALUES (6, 'lacheson', '$2y$10$FvhE/RIh5WAvzsydAj0mte8U6e3dDogK6SP.dY/PuvuG6E9k3KvWS', 1, 1);

INSERT INTO Operator(OperatorId, UserId, AuthAccountId, CreateBy, UpdateBy)
VALUES (1, 1, 1, 1, 1);
INSERT INTO Operator(OperatorId, UserId, AuthAccountId, CreateBy, UpdateBy)
VALUES (2, 2, 2, 1, 1);
INSERT INTO Operator(OperatorId, UserId, AuthAccountId, CreateBy, UpdateBy)
VALUES (3, 3, 3, 1, 1);
INSERT INTO Operator(OperatorId, UserId, AuthAccountId, CreateBy, UpdateBy)
VALUES (4, 4, 4, 1, 1);
INSERT INTO Operator(OperatorId, UserId, AuthAccountId, CreateBy, UpdateBy)
VALUES (5, 5, 5, 1, 1);
INSERT INTO Operator(OperatorId, UserId, AuthAccountId, CreateBy, UpdateBy)
VALUES (6, 6, 6, 1, 1);

INSERT INTO Entitlement(EntitlementId, Name, CreateBy, UpdateBy)
VALUES (1, 'Owner', 1, 1);
INSERT INTO Entitlement(EntitlementId, Name, CreateBy, UpdateBy)
VALUES (2, 'Moderator', 1, 1);
INSERT INTO Entitlement(EntitlementId, Name, CreateBy, UpdateBy)
VALUES (3, 'Admin', 1, 1);
INSERT INTO Entitlement(EntitlementId, Name, CreateBy, UpdateBy)
VALUES (4, 'Judge', 1, 1);
INSERT INTO Entitlement(EntitlementId, Name, CreateBy, UpdateBy)
VALUES (5, 'Viewer', 1, 1);

INSERT INTO OperatorEntitlement(OperatorEntitlementId, OperatorId, EntitlementId, CreateBy, UpdateBy)
VALUES (1, 1, 1, 1, 1);
INSERT INTO OperatorEntitlement(OperatorEntitlementId, OperatorId, EntitlementId, CreateBy, UpdateBy)
VALUES (2, 1, 2, 1, 1);
INSERT INTO OperatorEntitlement(OperatorEntitlementId, OperatorId, EntitlementId, CreateBy, UpdateBy)
VALUES (3, 1, 3, 1, 1);

# ----- Downs ----- #
DELETE FROM OperatorEntitlement WHERE OperatorId in (1, 2, 3, 4, 5, 6);
DELETE FROM Entitlement WHERE EntitlementId in (1, 2, 3, 4, 5);
DELETE FROM Operator WHERE OperatorId in (1, 2, 3, 4, 5, 6);
DELETE FROM AuthAccount WHERE AuthAccountId in (1, 2, 3, 4, 5, 6);
DELETE FROM User WHERE UserId in (1, 2, 3, 4, 5, 6);