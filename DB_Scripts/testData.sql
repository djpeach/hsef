# ----- Ups ----- #
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email) VALUES (1, 'Daniel', 'Peach', 'male', 'active', 'djpeach@iu.edu'); # 1
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email) VALUES (2, 'Ashley', 'Harris', 'female', 'active', 'harris16@iu.edu'); # 2
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email) VALUES (3, 'Daniel', 'Northam', 'male', 'active', 'dnortham@iu.edu'); # 3
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email) VALUES (4, 'Kate', 'Davis', 'female', 'active', 'kadadavi@iu.edu'); # 4
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email) VALUES (5, 'Andy', 'Harris', 'male', 'active', 'ajharris@iupui.edu'); # 5
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email) VALUES (6, 'Lingma', 'Acheson', 'female', 'active', 'linglu@iupui.edu'); # 6
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email) VALUES (7, 'Ethan', 'Netsch', 'male', 'active', 'enetsch@iu.edu'); # 6
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email) VALUES (8, 'Robert', 'Yost', 'male', 'active', 'ryost@iupui.edu'); # 6
# students
INSERT INTO User(UserId, FirstName, LastName, Status) VALUES (9, 'Jazmin', 'Roberson', 'active');
INSERT INTO User(UserId, FirstName, LastName, Status) VALUES (10, 'Lindsey', 'Stone', 'active');
INSERT INTO User(UserId, FirstName, LastName, Status) VALUES (11, 'Peggy', 'Finnegan', 'active');
INSERT INTO User(UserId, FirstName, LastName, Status) VALUES (12, 'Sebastien', 'Glover', 'active');
INSERT INTO User(UserId, FirstName, LastName, Status) VALUES (13, 'Darnell', 'Lennon', 'active');
INSERT INTO User(UserId, FirstName, LastName, Status) VALUES (14, 'Aamir', 'Browning', 'active');
INSERT INTO User(UserId, FirstName, LastName, Status) VALUES (15, 'Parker', 'Henderson', 'active');
INSERT INTO User(UserId, FirstName, LastName, Status) VALUES (16, 'Beatrice', 'Ortega', 'active');
INSERT INTO User(UserId, FirstName, LastName, Status) VALUES (17, 'Elysia', 'Driscoll', 'active');

INSERT INTO AuthAccount(AuthAccountId, PasswordHash, UserId) VALUES (1, '$2y$10$EEhxG.T6J7nCu5ieTllTsuvvOdF606zuGfZdur/RcTvfxpg/vxZfW', 1);
INSERT INTO AuthAccount(AuthAccountId, PasswordHash, UserId) VALUES (2, '$2y$10$oDxFkCtEjgAmJb7VQrpJTeq6DU5ICU1O3xBl1uWyteAh2ngusNns6', 2);
INSERT INTO AuthAccount(AuthAccountId, PasswordHash, UserId) VALUES (3, '$2y$10$QEGvUI8tmr8JiBvqd6BRfel4QlSGJNadsEmtVnm5rfILLIEg0CMUi', 3);
INSERT INTO AuthAccount(AuthAccountId, PasswordHash, UserId) VALUES (4, '$2y$10$PP7DCm/dqE7fPjRYyPyjDeMzuBB7hG6LDdw8v0d5ypbIyfDRXv/HC', 4);
INSERT INTO AuthAccount(AuthAccountId, PasswordHash, UserId) VALUES (5, '$2y$10$qPYniUF.xnAqQLS0c9hRLeyrCURFfQ/fBS2foss9BBB88sxFNQVRC', 5);
INSERT INTO AuthAccount(AuthAccountId, PasswordHash, UserId) VALUES (6, '$2y$10$FvhE/RIh5WAvzsydAj0mte8U6e3dDogK6SP.dY/PuvuG6E9k3KvWS', 6);
INSERT INTO AuthAccount(AuthAccountId, PasswordHash, UserId) VALUES (7, '$2y$10$FvhE/RIh5WAvzsydAj0mte8U6e3dDogK6SP.dY/PuvuG6E9k3KvWS', 7);
INSERT INTO AuthAccount(AuthAccountId, PasswordHash, UserId) VALUES (8, '$2y$10$FvhE/RIh5WAvzsydAj0mte8U6e3dDogK6SP.dY/PuvuG6E9k3KvWS', 8);

INSERT INTO Operator(OperatorId, UserId) VALUES (1, 1);
INSERT INTO Operator(OperatorId, UserId) VALUES (2, 2);
INSERT INTO Operator(OperatorId, UserId) VALUES (3, 3);
INSERT INTO Operator(OperatorId, UserId) VALUES (4, 4);
INSERT INTO Operator(OperatorId, UserId) VALUES (5, 5);
INSERT INTO Operator(OperatorId, UserId) VALUES (6, 6);
INSERT INTO Operator(OperatorId, UserId) VALUES (7, 7);
INSERT INTO Operator(OperatorId, UserId) VALUES (8, 8);

INSERT INTO Entitlement(EntitlementId, Name) VALUES (1, 'owner');
INSERT INTO Entitlement(EntitlementId, Name) VALUES (3, 'admin');
INSERT INTO Entitlement(EntitlementId, Name) VALUES (4, 'judge');
INSERT INTO Entitlement(EntitlementId, Name) VALUES (5, 'viewer');

INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (1, 1);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (1, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (1, 4);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (1, 5);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (2, 1);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (2, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (2, 4);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (2, 5);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (3, 1);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (3, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (3, 4);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (3, 5);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (4, 1);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (4, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (4, 4);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (4, 5);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (5, 1);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (5, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (5, 4);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (5, 5);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (6, 1);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (6, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (6, 4);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (6, 5);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (7, 1);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (7, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (7, 4);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (7, 5);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (8, 1);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (8, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (8, 4);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (8, 5);

INSERT INTO Student(UserId) VALUES (7);
INSERT INTO Student(UserId) VALUES (8);
INSERT INTO Student(UserId) VALUES (9);
INSERT INTO Student(UserId) VALUES (10);
INSERT INTO Student(UserId) VALUES (11);
INSERT INTO Student(UserId) VALUES (12);
INSERT INTO Student(UserId) VALUES (13);
INSERT INTO Student(UserId) VALUES (14);
INSERT INTO Student(UserId) VALUES (15);

INSERT INTO Booth(Number) VALUES (100);
INSERT INTO Booth(Number) VALUES (101);
INSERT INTO Booth(Number) VALUES (102);
INSERT INTO Booth(Number) VALUES (103);
INSERT INTO Booth(Number) VALUES (104);
INSERT INTO Booth(Number) VALUES (105);
INSERT INTO Booth(Number) VALUES (106);
INSERT INTO Booth(Number) VALUES (107);
INSERT INTO Booth(Number) VALUES (108);
INSERT INTO Booth(Number) VALUES (109);
INSERT INTO Booth(Number) VALUES (110);
INSERT INTO Booth(Number) VALUES (111);
INSERT INTO Booth(Number) VALUES (112);
INSERT INTO Booth(Number) VALUES (113);
INSERT INTO Booth(Number) VALUES (114);
INSERT INTO Booth(Number) VALUES (115);

INSERT INTO Category(CategoryId, Name) VALUES (1, 'Science');
INSERT INTO Category(CategoryId, Name) VALUES (2, 'Biology');
INSERT INTO Category(CategoryId, Name) VALUES (3, 'Chemistry');
INSERT INTO Category(CategoryId, Name) VALUES (4, 'Astronomy');
INSERT INTO Category(CategoryId, Name) VALUES (5, 'Computers');
INSERT INTO Category(CategoryId, Name) VALUES (6, 'Robotics');
INSERT INTO Category(CategoryId, Name) VALUES (7, 'Geology');
INSERT INTO Category(CategoryId, Name) VALUES (8, 'Physics');
INSERT INTO Category(CategoryId, Name) VALUES (9, 'Math');
INSERT INTO Category(CategoryId, Name) VALUES (10, 'Botany');

INSERT INTO County(CountyId, Name) VALUES (1, 'Adams');
INSERT INTO County(CountyId, Name) VALUES (2, 'Allen');
INSERT INTO County(CountyId, Name) VALUES (3, 'Bartholomew');
INSERT INTO County(CountyId, Name) VALUES (4, 'Benton');
INSERT INTO County(CountyId, Name) VALUES (5, 'Blackford');
INSERT INTO County(CountyId, Name) VALUES (6, 'Boone');
INSERT INTO County(CountyId, Name) VALUES (7, 'Brown');
INSERT INTO County(CountyId, Name) VALUES (8, 'Carroll');
INSERT INTO County(CountyId, Name) VALUES (9, 'Cass');
INSERT INTO County(CountyId, Name) VALUES ('Clark');
INSERT INTO County(CountyId, Name) VALUES ('Clay');
INSERT INTO County(CountyId, Name) VALUES ('Clinton');
INSERT INTO County(CountyId, Name) VALUES ('Crawford');
INSERT INTO County(CountyId, Name) VALUES ('Daviess');
INSERT INTO County(CountyId, Name) VALUES ('De Kalb');
INSERT INTO County(CountyId, Name) VALUES ('Dearborn');
INSERT INTO County(CountyId, Name) VALUES ('Decatur');
INSERT INTO County(CountyId, Name) VALUES ('Delaware');
INSERT INTO County(CountyId, Name) VALUES ('Dubois');
INSERT INTO County(CountyId, Name) VALUES ('Elkhart');
INSERT INTO County(CountyId, Name) VALUES ('Fayette');
INSERT INTO County(CountyId, Name) VALUES ('Floyd');
INSERT INTO County(CountyId, Name) VALUES ('Fountain');
INSERT INTO County(CountyId, Name) VALUES ('Franklin');
INSERT INTO County(CountyId, Name) VALUES ('Fulton');
INSERT INTO County(CountyId, Name) VALUES ('Gibson');
INSERT INTO County(CountyId, Name) VALUES ('Grant');
INSERT INTO County(CountyId, Name) VALUES ('Greene');
INSERT INTO County(CountyId, Name) VALUES ('Hamilton');
INSERT INTO County(CountyId, Name) VALUES ('Hancock');
INSERT INTO County(CountyId, Name) VALUES ('Harrison');
INSERT INTO County(CountyId, Name) VALUES ('Hendricks');
INSERT INTO County(CountyId, Name) VALUES ('Henry');
INSERT INTO County(CountyId, Name) VALUES ('Howard');
INSERT INTO County(CountyId, Name) VALUES ('Huntington');
INSERT INTO County(CountyId, Name) VALUES ('Jackson');
INSERT INTO County(CountyId, Name) VALUES ('Jasper');
INSERT INTO County(CountyId, Name) VALUES ('Jay');
INSERT INTO County(CountyId, Name) VALUES ('Jefferson');
INSERT INTO County(CountyId, Name) VALUES ('Jennings');
INSERT INTO County(CountyId, Name) VALUES ('Johnson');
INSERT INTO County(CountyId, Name) VALUES ('Knox');
INSERT INTO County(CountyId, Name) VALUES ('Kosciusko');
INSERT INTO County(CountyId, Name) VALUES ('La Porte');
INSERT INTO County(CountyId, Name) VALUES ('Lagrange');
INSERT INTO County(CountyId, Name) VALUES ('Lake');
INSERT INTO County(CountyId, Name) VALUES ('Lawrence');
INSERT INTO County(CountyId, Name) VALUES ('Madison');
INSERT INTO County(CountyId, Name) VALUES ('Marion');
INSERT INTO County(CountyId, Name) VALUES ('Marshall');
INSERT INTO County(CountyId, Name) VALUES ('Martin');
INSERT INTO County(CountyId, Name) VALUES ('Miami');
INSERT INTO County(CountyId, Name) VALUES ('Monroe');
INSERT INTO County(CountyId, Name) VALUES ('Montgomery');
INSERT INTO County(CountyId, Name) VALUES ('Morgan');
INSERT INTO County(CountyId, Name) VALUES ('Newton');
INSERT INTO County(CountyId, Name) VALUES ('Noble');
INSERT INTO County(CountyId, Name) VALUES ('Ohio');
INSERT INTO County(CountyId, Name) VALUES ('Orange');
INSERT INTO County(CountyId, Name) VALUES ('Owen');
INSERT INTO County(CountyId, Name) VALUES ('Parke');
INSERT INTO County(CountyId, Name) VALUES ('Perry');
INSERT INTO County(CountyId, Name) VALUES ('Pike');
INSERT INTO County(CountyId, Name) VALUES ('Porter');
INSERT INTO County(CountyId, Name) VALUES ('Posey');
INSERT INTO County(CountyId, Name) VALUES ('Pulaski');
INSERT INTO County(CountyId, Name) VALUES ('Putnam');
INSERT INTO County(CountyId, Name) VALUES ('Randolph');
INSERT INTO County(CountyId, Name) VALUES ('Ripley');
INSERT INTO County(CountyId, Name) VALUES ('Rush');
INSERT INTO County(CountyId, Name) VALUES ('Scott');
INSERT INTO County(CountyId, Name) VALUES ('Shelby');
INSERT INTO County(CountyId, Name) VALUES ('Spencer');
INSERT INTO County(CountyId, Name) VALUES ('St Joseph');
INSERT INTO County(CountyId, Name) VALUES ('Starke');
INSERT INTO County(CountyId, Name) VALUES ('Steuben');
INSERT INTO County(CountyId, Name) VALUES ('Sullivan');
INSERT INTO County(CountyId, Name) VALUES ('Switzerland');
INSERT INTO County(CountyId, Name) VALUES ('Tippecanoe');
INSERT INTO County(CountyId, Name) VALUES ('Tipton');
INSERT INTO County(CountyId, Name) VALUES ('Union');
INSERT INTO County(CountyId, Name) VALUES ('Vanderburgh');
INSERT INTO County(CountyId, Name) VALUES ('Vermillion');
INSERT INTO County(CountyId, Name) VALUES ('Vigo');
INSERT INTO County(CountyId, Name) VALUES ('Wabash');
INSERT INTO County(CountyId, Name) VALUES ('Warren');
INSERT INTO County(CountyId, Name) VALUES ('Warrick');
INSERT INTO County(CountyId, Name) VALUES ('Washington');
INSERT INTO County(CountyId, Name) VALUES ('Wayne');
INSERT INTO County(CountyId, Name) VALUES ('Wells');
INSERT INTO County(CountyId, Name) VALUES ('White');
INSERT INTO County(CountyId, Name) VALUES ('Whitley');

INSERT INTO GradeLevel(GradeLevelId, Name) VALUES (1, '1st Grade');
INSERT INTO GradeLevel(GradeLevelId, Name) VALUES (2, '2nd Grade');
INSERT INTO GradeLevel(GradeLevelId, Name) VALUES (3, '3rd Grade');
INSERT INTO GradeLevel(GradeLevelId, Name) VALUES (4, '4th Grade');
INSERT INTO GradeLevel(GradeLevelId, Name) VALUES (5, '5th Grade');
INSERT INTO GradeLevel(GradeLevelId, Name) VALUES (6, '6th Grade');
INSERT INTO GradeLevel(GradeLevelId, Name) VALUES (7, '7th Grade');
INSERT INTO GradeLevel(GradeLevelId, Name) VALUES (8, '8th Grade');
INSERT INTO GradeLevel(GradeLevelId, Name) VALUES (9, '9th Grade');
INSERT INTO GradeLevel(GradeLevelId, Name) VALUES (10, '10th Grade');
INSERT INTO GradeLevel(GradeLevelId, Name) VALUES (11, '11th Grade');
INSERT INTO GradeLevel(GradeLevelId, Name) VALUES (12, '12th Grade');

INSERT INTO OperatorCategory(OperatorId, CategoryId) values (1, 1);
INSERT INTO OperatorCategory(OperatorId, CategoryId) values (1, 2);
INSERT INTO OperatorCategory(OperatorId, CategoryId) values (1, 3);
INSERT INTO OperatorCategory(OperatorId, CategoryId) values (2, 2);
INSERT INTO OperatorCategory(OperatorId, CategoryId) values (2, 3);
INSERT INTO OperatorCategory(OperatorId, CategoryId) values (2, 4);
INSERT INTO OperatorCategory(OperatorId, CategoryId) values (3, 3);
INSERT INTO OperatorCategory(OperatorId, CategoryId) values (3, 4);
INSERT INTO OperatorCategory(OperatorId, CategoryId) values (3, 5);
INSERT INTO OperatorCategory(OperatorId, CategoryId) values (4, 4);
INSERT INTO OperatorCategory(OperatorId, CategoryId) values (4, 5);
INSERT INTO OperatorCategory(OperatorId, CategoryId) values (4, 6);
INSERT INTO OperatorCategory(OperatorId, CategoryId) values (5, 5);
INSERT INTO OperatorCategory(OperatorId, CategoryId) values (5, 6);
INSERT INTO OperatorCategory(OperatorId, CategoryId) values (5, 7);
INSERT INTO OperatorCategory(OperatorId, CategoryId) values (6, 6);
INSERT INTO OperatorCategory(OperatorId, CategoryId) values (6, 7);
INSERT INTO OperatorCategory(OperatorId, CategoryId) values (6, 8);
INSERT INTO OperatorCategory(OperatorId, CategoryId) values (7, 7);
INSERT INTO OperatorCategory(OperatorId, CategoryId) values (7, 8);
INSERT INTO OperatorCategory(OperatorId, CategoryId) values (7, 9);

INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (1, 1);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (1, 2);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (1, 3);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (2, 2);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (2, 3);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (2, 4);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (3, 3);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (3, 4);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (3, 5);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (4, 4);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (4, 5);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (4, 6);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (5, 5);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (5, 6);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (5, 7);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (6, 6);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (6, 7);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (6, 8);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (7, 7);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (7, 8);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (7, 9);

INSERT INTO Project(ProjectId, Number, Name, Abstract, BoothId, CourseNetworkingId, CategoryId)
VALUES (1, 1, 'Volcanoes',
        'Aenean viverra rhoncus pede. Nullam dictum felis eu pede mollis pretium. Praesent nec nisl a purus blandit viverra.',
        4, 3523, 2);

INSERT INTO School(SchoolId, Name, CountyId) VALUES (1, 'Adams Central High School', 1);

# ----- Downs ----- #
SET FOREIGN_KEY_CHECKS = 0;
DELETE FROM User WHERE UserId BETWEEN 1 AND 15;
DELETE FROM AuthAccount WHERE AuthAccountId BETWEEN 1 AND 6;
DELETE FROM Operator WHERE OperatorId BETWEEN 1 AND 6;
DELETE FROM Entitlement WHERE EntitlementId BETWEEN 1 AND 5;
DELETE FROM OperatorEntitlement WHERE OperatorId BETWEEN 1 AND 6;
DELETE FROM Student WHERE UserId BETWEEN 1 AND 15;
DELETE FROM Booth WHERE BoothId BETWEEN 1 AND 6;
DELETE FROM County WHERE CountyId BETWEEN 1 AND 7;
DELETE FROM School WHERE SchoolId BETWEEN 1 AND 8;
SET FOREIGN_KEY_CHECKS = 1;