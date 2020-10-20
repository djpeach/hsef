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

INSERT INTO UserYear(Year, UserId) VALUES(2020, 1);
INSERT INTO UserYear(Year, UserId) VALUES(2019, 1);
INSERT INTO UserYear(Year, UserId) VALUES(2018, 1);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 2);
INSERT INTO UserYear(Year, UserId) VALUES(2019, 2);
INSERT INTO UserYear(Year, UserId) VALUES(2018, 2);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 3);
INSERT INTO UserYear(Year, UserId) VALUES(2019, 3);
INSERT INTO UserYear(Year, UserId) VALUES(2018, 3);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 4);
INSERT INTO UserYear(Year, UserId) VALUES(2019, 4);
INSERT INTO UserYear(Year, UserId) VALUES(2018, 4);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 5);
INSERT INTO UserYear(Year, UserId) VALUES(2019, 5);
INSERT INTO UserYear(Year, UserId) VALUES(2018, 5);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 6);
INSERT INTO UserYear(Year, UserId) VALUES(2019, 6);
INSERT INTO UserYear(Year, UserId) VALUES(2018, 6);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 7);
INSERT INTO UserYear(Year, UserId) VALUES(2019, 7);
INSERT INTO UserYear(Year, UserId) VALUES(2018, 7);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 8);
INSERT INTO UserYear(Year, UserId) VALUES(2019, 8);
INSERT INTO UserYear(Year, UserId) VALUES(2018, 8);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 9);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 10);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 11);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 12);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 13);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 14);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 15);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 16);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 17);

INSERT INTO Operator(UserYearId) VALUES (1);
INSERT INTO Operator(UserYearId) VALUES (2);
INSERT INTO Operator(UserYearId) VALUES (3);
INSERT INTO Operator(UserYearId) VALUES (4);
INSERT INTO Operator(UserYearId) VALUES (5);
INSERT INTO Operator(UserYearId) VALUES (6);
INSERT INTO Operator(UserYearId) VALUES (7);
INSERT INTO Operator(UserYearId) VALUES (8);
INSERT INTO Operator(UserYearId) VALUES (9);
INSERT INTO Operator(UserYearId) VALUES (10);
INSERT INTO Operator(UserYearId) VALUES (11);
INSERT INTO Operator(UserYearId) VALUES (12);
INSERT INTO Operator(UserYearId) VALUES (13);
INSERT INTO Operator(UserYearId) VALUES (14);
INSERT INTO Operator(UserYearId) VALUES (15);
INSERT INTO Operator(UserYearId) VALUES (16);
INSERT INTO Operator(UserYearId) VALUES (17);
INSERT INTO Operator(UserYearId) VALUES (18);
INSERT INTO Operator(UserYearId) VALUES (19);
INSERT INTO Operator(UserYearId) VALUES (20);
INSERT INTO Operator(UserYearId) VALUES (21);
INSERT INTO Operator(UserYearId) VALUES (22);
INSERT INTO Operator(UserYearId) VALUES (23);
INSERT INTO Operator(UserYearId) VALUES (24);

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
INSERT INTO County(CountyId, Name) VALUES (10, 'Clark');
INSERT INTO County(CountyId, Name) VALUES (11, 'Clay');
INSERT INTO County(CountyId, Name) VALUES (12, 'Clinton');
INSERT INTO County(CountyId, Name) VALUES (13, 'Crawford');
INSERT INTO County(CountyId, Name) VALUES (14, 'Daviess');
INSERT INTO County(CountyId, Name) VALUES (15, 'De Kalb');
INSERT INTO County(CountyId, Name) VALUES (16, 'Dearborn');
INSERT INTO County(CountyId, Name) VALUES (17, 'Decatur');
INSERT INTO County(CountyId, Name) VALUES (18, 'Delaware');
INSERT INTO County(CountyId, Name) VALUES (19, 'Dubois');
INSERT INTO County(CountyId, Name) VALUES (20, 'Elkhart');
INSERT INTO County(CountyId, Name) VALUES (21, 'Fayette');
INSERT INTO County(CountyId, Name) VALUES (22, 'Floyd');
INSERT INTO County(CountyId, Name) VALUES (23, 'Fountain');
INSERT INTO County(CountyId, Name) VALUES (24, 'Franklin');
INSERT INTO County(CountyId, Name) VALUES (25, 'Fulton');
INSERT INTO County(CountyId, Name) VALUES (26, 'Gibson');
INSERT INTO County(CountyId, Name) VALUES (27, 'Grant');
INSERT INTO County(CountyId, Name) VALUES (28, 'Greene');
INSERT INTO County(CountyId, Name) VALUES (29, 'Hamilton');
INSERT INTO County(CountyId, Name) VALUES (30, 'Hancock');
INSERT INTO County(CountyId, Name) VALUES (31, 'Harrison');
INSERT INTO County(CountyId, Name) VALUES (32, 'Hendricks');
INSERT INTO County(CountyId, Name) VALUES (33, 'Henry');
INSERT INTO County(CountyId, Name) VALUES (34, 'Howard');
INSERT INTO County(CountyId, Name) VALUES (35, 'Huntington');
INSERT INTO County(CountyId, Name) VALUES (36, 'Jackson');
INSERT INTO County(CountyId, Name) VALUES (37, 'Jasper');
INSERT INTO County(CountyId, Name) VALUES (38, 'Jay');
INSERT INTO County(CountyId, Name) VALUES (39, 'Jefferson');
INSERT INTO County(CountyId, Name) VALUES (40, 'Jennings');
INSERT INTO County(CountyId, Name) VALUES (41, 'Johnson');
INSERT INTO County(CountyId, Name) VALUES (42, 'Knox');
INSERT INTO County(CountyId, Name) VALUES (43, 'Kosciusko');
INSERT INTO County(CountyId, Name) VALUES (44, 'La Porte');
INSERT INTO County(CountyId, Name) VALUES (45, 'Lagrange');
INSERT INTO County(CountyId, Name) VALUES (46, 'Lake');
INSERT INTO County(CountyId, Name) VALUES (47, 'Lawrence');
INSERT INTO County(CountyId, Name) VALUES (48, 'Madison');
INSERT INTO County(CountyId, Name) VALUES (49, 'Marion');
INSERT INTO County(CountyId, Name) VALUES (50, 'Marshall');
INSERT INTO County(CountyId, Name) VALUES (51, 'Martin');
INSERT INTO County(CountyId, Name) VALUES (52, 'Miami');
INSERT INTO County(CountyId, Name) VALUES (53, 'Monroe');
INSERT INTO County(CountyId, Name) VALUES (54, 'Montgomery');
INSERT INTO County(CountyId, Name) VALUES (55, 'Morgan');
INSERT INTO County(CountyId, Name) VALUES (56, 'Newton');
INSERT INTO County(CountyId, Name) VALUES (57,'Noble');
INSERT INTO County(CountyId, Name) VALUES (58, 'Ohio');
INSERT INTO County(CountyId, Name) VALUES (59, 'Orange');
INSERT INTO County(CountyId, Name) VALUES (60, 'Owen');
INSERT INTO County(CountyId, Name) VALUES (61, 'Parke');
INSERT INTO County(CountyId, Name) VALUES (62, 'Perry');
INSERT INTO County(CountyId, Name) VALUES (63, 'Pike');
INSERT INTO County(CountyId, Name) VALUES (64, 'Porter');
INSERT INTO County(CountyId, Name) VALUES (65, 'Posey');
INSERT INTO County(CountyId, Name) VALUES (66, 'Pulaski');
INSERT INTO County(CountyId, Name) VALUES (67, 'Putnam');
INSERT INTO County(CountyId, Name) VALUES (68, 'Randolph');
INSERT INTO County(CountyId, Name) VALUES (69, 'Ripley');
INSERT INTO County(CountyId, Name) VALUES (70, 'Rush');
INSERT INTO County(CountyId, Name) VALUES (71, 'Scott');
INSERT INTO County(CountyId, Name) VALUES (72, 'Shelby');
INSERT INTO County(CountyId, Name) VALUES (73, 'Spencer');
INSERT INTO County(CountyId, Name) VALUES (74, 'St Joseph');
INSERT INTO County(CountyId, Name) VALUES (75, 'Starke');
INSERT INTO County(CountyId, Name) VALUES (76, 'Steuben');
INSERT INTO County(CountyId, Name) VALUES (77, 'Sullivan');
INSERT INTO County(CountyId, Name) VALUES (78, 'Switzerland');
INSERT INTO County(CountyId, Name) VALUES (79, 'Tippecanoe');
INSERT INTO County(CountyId, Name) VALUES (80, 'Tipton');
INSERT INTO County(CountyId, Name) VALUES (81, 'Union');
INSERT INTO County(CountyId, Name) VALUES (82, 'Vanderburgh');
INSERT INTO County(CountyId, Name) VALUES (83, 'Vermillion');
INSERT INTO County(CountyId, Name) VALUES (84, 'Vigo');
INSERT INTO County(CountyId, Name) VALUES (85, 'Wabash');
INSERT INTO County(CountyId, Name) VALUES (86, 'Warren');
INSERT INTO County(CountyId, Name) VALUES (87, 'Warrick');
INSERT INTO County(CountyId, Name) VALUES (88, 'Washington');
INSERT INTO County(CountyId, Name) VALUES (89, 'Wayne');
INSERT INTO County(CountyId, Name) VALUES (90, 'Wells');
INSERT INTO County(CountyId, Name) VALUES (91, 'White');
INSERT INTO County(CountyId, Name) VALUES (92, 'Whitley');

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
        4, 3523, 1);
INSERT INTO Project(ProjectId, Number, Name, Abstract, BoothId, CourseNetworkingId, CategoryId)
VALUES (2, 2, 'Solar System',
        'Sed aliquam ultrices mauris. Etiam sit amet orci eget eros faucibus tincidunt.',
        5, 5670, 4);
INSERT INTO Project(ProjectId, Number, Name, Abstract, BoothId, CourseNetworkingId, CategoryId)
VALUES (3, 3, 'Plants',
        'Sed aliquam ultrices dsajk mauris. Etiam sit amet orci eget eros faucibus tincidunt.',
        6, 2190, 10);
INSERT INTO Project(ProjectId, Number, Name, Abstract, BoothId, CourseNetworkingId, CategoryId)
VALUES (4, 4, 'Cells',
        'Sed dsajn aliquam ultrices mauris. Etiam sit amet orci eget eros faucibus tincidunt.',
        7, 2178, 2);
INSERT INTO Project(ProjectId, Number, Name, Abstract, BoothId, CourseNetworkingId, CategoryId)
VALUES (5, 5, 'Chemicals',
        'Sed aliquam ultrices mauris. Etiam sit amet orci eget eros faucibus tincidunt.',
        8, 3461, 3);
INSERT INTO Project(ProjectId, Number, Name, Abstract, BoothId, CourseNetworkingId, CategoryId)
VALUES (6, 6, 'Robots',
        'Sed beep boop aliquam ultrices mauris. Etiam sit amet orci eget eros faucibus tincidunt.',
        9, 4591, 6);
INSERT INTO Project(ProjectId, Number, Name, Abstract, BoothId, CourseNetworkingId, CategoryId)
VALUES (7, 7, 'Rocks are cool',
        'Sed Rock aliquam ultrices mauris. Etiam sit amet orci eget eros faucibus tincidunt.',
        10, 2156, 7);
INSERT INTO Project(ProjectId, Number, Name, Abstract, BoothId, CourseNetworkingId, CategoryId)
VALUES (8, 8, 'Vertical vs. Horizontal',
        'Sed fas aliquam ultrices mauris. Etiam sit amet orci eget eros faucibus tincidunt.',
        11, 4892, 8);
INSERT INTO Project(ProjectId, Number, Name, Abstract, BoothId, CourseNetworkingId, CategoryId)
VALUES (9, 9, '2+2=5',
        'Sed aliquam ultrices mauris. Etiam sit amet orci eget eros faucibus tincidunt.',
        12, 3154, 9);
INSERT INTO Project(ProjectId, Number, Name, Abstract, BoothId, CourseNetworkingId, CategoryId)
VALUES (10, 10, 'Binary',
        'Sed dsajda aliquam ultrices mauris. Etiam sit amet orci eget eros faucibus tincidunt.',
        13, 8010, 5);

INSERT INTO School(SchoolId, Name, CountyId) VALUES (1, 'Adams Central High School', 1);
INSERT INTO School(SchoolId, Name, CountyId) VALUES (2, 'Blackhawk Christian School', 2);
INSERT INTO School(SchoolId, Name, CountyId) VALUES (3, 'Columbus East High School', 3);
INSERT INTO School(SchoolId, Name, CountyId) VALUES (4, 'Benton Central Junior-Senior High School', 4);
INSERT INTO School(SchoolId, Name, CountyId) VALUES (5, 'Blackford High School', 5);
INSERT INTO School(SchoolId, Name, CountyId) VALUES (6, 'Lebanon Sneior High School', 6);
INSERT INTO School(SchoolId, Name, CountyId) VALUES (7, 'Brown County High School', 7);
INSERT INTO School(SchoolId, Name, CountyId) VALUES (8, 'Carroll High School', 8);
INSERT INTO School(SchoolId, Name, CountyId) VALUES (9, 'Logansport  Community High School', 9);
INSERT INTO School(SchoolId, Name, CountyId) VALUES (10, 'Northview High School', 10);
INSERT INTO School(SchoolId, Name, CountyId) VALUES (11, 'Clinton Central High School', 11);
INSERT INTO School(SchoolId, Name, CountyId) VALUES (12, 'Crawford County Junior- Senior High School', 12);
INSERT INTO School(SchoolId, Name, CountyId) VALUES (13, 'Washington High School', 13);
INSERT INTO School(SchoolId, Name, CountyId) VALUES (14, 'East Central High School', 14);
INSERT INTO School(SchoolId, Name, CountyId) VALUES (15, 'Greensburg Community High School', 15);
INSERT INTO School(SchoolId, Name, CountyId) VALUES (16, 'DeKalb High School', 16);
INSERT INTO School(SchoolId, Name, CountyId) VALUES (17, 'Delta High School', 17);
INSERT INTO School(SchoolId, Name, CountyId) VALUES (18, 'Jasper High School', 18);
INSERT INTO School(SchoolId, Name, CountyId) VALUES (19, 'Elkhart Central High School', 19);
INSERT INTO School(SchoolId, Name, CountyId) VALUES (20, 'Connersville High School', 20);

# ----- Downs ----- #
# SET FOREIGN_KEY_CHECKS = 0;
# DELETE FROM User WHERE UserId BETWEEN 1 AND 15;
# DELETE FROM AuthAccount WHERE AuthAccountId BETWEEN 1 AND 6;
# DELETE FROM Operator WHERE OperatorId BETWEEN 1 AND 6;
# DELETE FROM Entitlement WHERE EntitlementId BETWEEN 1 AND 5;
# DELETE FROM OperatorEntitlement WHERE OperatorId BETWEEN 1 AND 6;
# DELETE FROM Student WHERE UserId BETWEEN 1 AND 15;
# DELETE FROM Booth WHERE BoothId BETWEEN 1 AND 6;
# DELETE FROM County WHERE CountyId BETWEEN 1 AND 7;
# DELETE FROM School WHERE SchoolId BETWEEN 1 AND 8;
# SET FOREIGN_KEY_CHECKS = 1;