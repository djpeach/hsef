# ----- Ups ----- #
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email) VALUES (1, 'Daniel', 'Peach', 'male', 'active', 'djpeach@iu.edu');
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email) VALUES (2, 'Ashley', 'Harris', 'female', 'active', 'harris16@iu.edu');
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email) VALUES (3, 'Daniel', 'Northam', 'male', 'active', 'dnortham@iu.edu');
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email) VALUES (4, 'Kate', 'Davis', 'female', 'active', 'kadadavi@iu.edu');
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email) VALUES (5, 'Andy', 'Harris', 'male', 'active', 'ajharris@iupui.edu');
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email) VALUES (6, 'Lingma', 'Acheson', 'female', 'active', 'linglu@iupui.edu');
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email) VALUES (7, 'Ethan', 'Netsch', 'male', 'active', 'enetsch@iu.edu');
INSERT INTO User(UserId, FirstName, LastName, Gender, Status, Email) VALUES (8, 'Robert', 'Yost', 'male', 'active', 'ryost@iupui.edu');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Deanna', 'Maha', 'female', 'registered', 'dmaha0@illinois.edu');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Farlie', 'Linsey', 'female', 'active', 'flinsey1@t.co');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Lani', 'Dwyr', 'female', 'active', 'ldwyr2@cbsnews.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Merralee', 'Druhan', 'male', 'registered', 'mdruhan3@berkeley.edu');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Fons', 'Sawforde', 'other', 'invited', 'fsawforde4@woothemes.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Cherice', 'Butterick', 'female', 'active', 'cbutterick5@cargocollective.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Maybelle', 'Poutress', 'male', 'registered', 'mpoutress6@timesonline.co.uk');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Desmund', 'Pennock', 'male', 'invited', 'dpennock7@time.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Griselda', 'Edmand', 'other', 'active', 'gedmand8@patch.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Uta', 'Haddleton', 'other', 'active', 'uhaddleton9@homestead.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Wang', 'Benkhe', 'male', 'registered', 'wbenkhea@mozilla.org');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Yorke', 'Cramphorn', 'other', 'active', 'ycramphornb@sohu.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Flossi', 'Strover', 'other', 'registered', 'fstroverc@umn.edu');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Ida', 'Hedin', 'other', 'registered', 'ihedind@washingtonpost.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Hunfredo', 'Gooding', 'female', 'active', 'hgoodinge@arizona.edu');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Baily', 'Dorken', 'other', 'active', 'bdorkenf@over-blog.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Randene', 'MacArthur', 'female', 'invited', 'rmacarthurg@si.edu');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Mollee', 'Toler', 'female', 'archived', 'mtolerh@latimes.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Eal', 'Elnor', 'male', 'archived', 'eelnori@vinaora.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Pearce', 'Dmitrovic', 'male', 'active', 'pdmitrovicj@so-net.ne.jp');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Camila', 'Coultish', 'female', 'archived', 'ccoultishk@friendfeed.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Shirl', 'Hinckesman', 'female', 'invited', 'shinckesmanl@stumbleupon.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Marilee', 'Tellesson', 'female', 'active', 'mtellessonm@cnbc.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Pooh', 'D''Ambrosi', 'female', 'registered', 'pdambrosin@barnesandnoble.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Harmonie', 'Davidsson', 'female', 'registered', 'hdavidssono@printfriendly.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Andrea', 'Buddles', 'male', 'invited', 'abuddlesp@state.gov');

INSERT INTO AuthAccount(AuthAccountId, PasswordHash, UserId) VALUES (1, 'qwerty', 1);
INSERT INTO AuthAccount(AuthAccountId, PasswordHash, UserId) VALUES (2, 'qwerty', 2);
INSERT INTO AuthAccount(AuthAccountId, PasswordHash, UserId) VALUES (3, 'qwerty', 3);
INSERT INTO AuthAccount(AuthAccountId, PasswordHash, UserId) VALUES (4, 'qwerty', 4);
INSERT INTO AuthAccount(AuthAccountId, PasswordHash, UserId) VALUES (5, 'qwerty', 5);
INSERT INTO AuthAccount(AuthAccountId, PasswordHash, UserId) VALUES (6, 'qwerty', 6);
INSERT INTO AuthAccount(AuthAccountId, PasswordHash, UserId) VALUES (7, 'qwerty', 7);
INSERT INTO AuthAccount(AuthAccountId, PasswordHash, UserId) VALUES (8, 'qwerty', 8);

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
INSERT INTO UserYear(Year, UserId) VALUES(2020, 18);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 19);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 20);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 21);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 22);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 23);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 24);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 25);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 26);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 27);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 28);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 29);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 30);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 31);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 32);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 33);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 34);

INSERT INTO Operator(UserYearId) VALUES (1);
INSERT INTO Operator(UserYearId) VALUES (4);
INSERT INTO Operator(UserYearId) VALUES (7);
INSERT INTO Operator(UserYearId) VALUES (10);
INSERT INTO Operator(UserYearId) VALUES (13);
INSERT INTO Operator(UserYearId) VALUES (16);
INSERT INTO Operator(UserYearId) VALUES (19);
INSERT INTO Operator(UserYearId) VALUES (22);
INSERT INTO Operator(UserYearId) VALUES (23);
INSERT INTO Operator(UserYearId) VALUES (24);
INSERT INTO Operator(UserYearId) VALUES (25);
INSERT INTO Operator(UserYearId) VALUES (26);
INSERT INTO Operator(UserYearId) VALUES (27);
INSERT INTO Operator(UserYearId) VALUES (28);
INSERT INTO Operator(UserYearId) VALUES (29);
INSERT INTO Operator(UserYearId) VALUES (30);
INSERT INTO Operator(UserYearId) VALUES (31);
INSERT INTO Operator(UserYearId) VALUES (32);
INSERT INTO Operator(UserYearId) VALUES (33);
INSERT INTO Operator(UserYearId) VALUES (34);
INSERT INTO Operator(UserYearId) VALUES (35);
INSERT INTO Operator(UserYearId) VALUES (36);
INSERT INTO Operator(UserYearId) VALUES (37);
INSERT INTO Operator(UserYearId) VALUES (38);
INSERT INTO Operator(UserYearId) VALUES (39);
INSERT INTO Operator(UserYearId) VALUES (40);
INSERT INTO Operator(UserYearId) VALUES (41);
INSERT INTO Operator(UserYearId) VALUES (42);
INSERT INTO Operator(UserYearId) VALUES (43);
INSERT INTO Operator(UserYearId) VALUES (44);
INSERT INTO Operator(UserYearId) VALUES (45);
# INSERT INTO Operator(UserYearId) VALUES (45);
INSERT INTO Operator(UserYearId) VALUES (47);
INSERT INTO Operator(UserYearId) VALUES (48);
INSERT INTO Operator(UserYearId) VALUES (49);

INSERT INTO Entitlement(EntitlementId, Name) VALUES (1, 'owner');
INSERT INTO Entitlement(EntitlementId, Name) VALUES (2, 'admin');
INSERT INTO Entitlement(EntitlementId, Name) VALUES (3, 'judge');
INSERT INTO Entitlement(EntitlementId, Name) VALUES (4, 'viewer');

INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (1, 1);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (1, 2);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (1, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (1, 4);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (2, 1);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (2, 2);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (2, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (2, 4);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (3, 1);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (3, 2);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (3, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (3, 4);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (4, 1);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (4, 2);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (4, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (4, 4);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (5, 1);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (5, 2);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (5, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (5, 4);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (6, 1);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (6, 2);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (6, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (6, 4);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (7, 1);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (7, 2);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (7, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (7, 4);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (8, 1);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (8, 2);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (8, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (8, 4);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (9, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (10, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (11, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (12, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (13, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (14, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (15, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (16, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (17, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (18, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (19, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (20, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (21, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (22, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (23, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (24, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (25, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (26, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (27, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (28, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (29, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (30, 3);
INSERT INTO OperatorEntitlement(OperatorId, EntitlementId) VALUES (31, 3);

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
INSERT INTO Booth(Number) VALUES (116);
INSERT INTO Booth(Number) VALUES (117);
INSERT INTO Booth(Number) VALUES (118);
INSERT INTO Booth(Number) VALUES (119);
INSERT INTO Booth(Number) VALUES (120);
INSERT INTO Booth(Number) VALUES (121);
INSERT INTO Booth(Number) VALUES (122);
INSERT INTO Booth(Number) VALUES (123);
INSERT INTO Booth(Number) VALUES (124);
INSERT INTO Booth(Number) VALUES (125);
INSERT INTO Booth(Number) VALUES (126);
INSERT INTO Booth(Number) VALUES (127);
INSERT INTO Booth(Number) VALUES (128);
INSERT INTO Booth(Number) VALUES (129);
INSERT INTO Booth(Number) VALUES (130);
INSERT INTO Booth(Number) VALUES (131);
INSERT INTO Booth(Number) VALUES (132);
INSERT INTO Booth(Number) VALUES (133);
INSERT INTO Booth(Number) VALUES (134);
INSERT INTO Booth(Number) VALUES (135);
INSERT INTO Booth(Number) VALUES (136);
INSERT INTO Booth(Number) VALUES (137);
INSERT INTO Booth(Number) VALUES (138);
INSERT INTO Booth(Number) VALUES (139);
INSERT INTO Booth(Number) VALUES (140);
INSERT INTO Booth(Number) VALUES (141);
INSERT INTO Booth(Number) VALUES (142);
INSERT INTO Booth(Number) VALUES (143);
INSERT INTO Booth(Number) VALUES (144);
INSERT INTO Booth(Number) VALUES (145);
INSERT INTO Booth(Number) VALUES (146);
INSERT INTO Booth(Number) VALUES (147);
INSERT INTO Booth(Number) VALUES (148);
INSERT INTO Booth(Number) VALUES (149);
INSERT INTO Booth(Number) VALUES (150);

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
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (6, 6);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (6, 7);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (6, 8);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (7, 7);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (7, 8);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (7, 9);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (8, 5);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (8, 6);
INSERT INTO OperatorGradeLevel(OperatorId, GradeLevelId) values (8, 7);

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
INSERT INTO Project(ProjectId, Number, Name, Abstract, BoothId, CourseNetworkingId, CategoryId)
VALUES (11, 11, 'Experiements',
        'Sed dsajda aliquam ultrices mauris. Etiam sit amet orci eget eros faucibus tincidunt.',
        14, 8010, 1);
INSERT INTO Project(ProjectId, Number, Name, Abstract, BoothId, CourseNetworkingId, CategoryId)
VALUES (12, 12, 'Regeneration',
        'Sed dsajda aliquam ultrices mauris. Etiam sit amet orci eget eros faucibus tincidunt.',
        15, 8010, 2);
INSERT INTO Project(ProjectId, Number, Name, Abstract, BoothId, CourseNetworkingId, CategoryId)
VALUES (13, 13, 'Strong Molecular Bonds',
        'Sed dsajda aliquam ultrices mauris. Etiam sit amet orci eget eros faucibus tincidunt.',
        16, 8010, 3);
INSERT INTO Project(ProjectId, Number, Name, Abstract, BoothId, CourseNetworkingId, CategoryId)
VALUES (14, 14, 'Strong Molecular Bonds',
        'Sed dsajda aliquam ultrices mauris. Etiam sit amet orci eget eros faucibus tincidunt.',
        17, 8010, 3);
INSERT INTO Project(ProjectId, Number, Name, Abstract, BoothId, CourseNetworkingId, CategoryId)
VALUES (15, 15, 'Solar Winds',
        'Sed dsajda aliquam ultrices mauris. Etiam sit amet orci eget eros faucibus tincidunt.',
        18, 8010, 4);
INSERT INTO Project(ProjectId, Number, Name, Abstract, BoothId, CourseNetworkingId, CategoryId)
VALUES (16, 16, 'Quantum Bits',
        'Sed dsajda aliquam ultrices mauris. Etiam sit amet orci eget eros faucibus tincidunt.',
        1, 8010, 5);
INSERT INTO Project(ProjectId, Number, Name, Abstract, BoothId, CourseNetworkingId, CategoryId)
VALUES (17, 17, 'RFID',
        'Sed dsajda aliquam ultrices mauris. Etiam sit amet orci eget eros faucibus tincidunt.',
        2, 8010, 6);
INSERT INTO Project(ProjectId, Number, Name, Abstract, BoothId, CourseNetworkingId, CategoryId)
VALUES (18, 18, 'Rocks for Granite',
        'Sed dsajda aliquam ultrices mauris. Etiam sit amet orci eget eros faucibus tincidunt.',
        3, 8010, 7);
INSERT INTO Project(ProjectId, Number, Name, Abstract, BoothId, CourseNetworkingId, CategoryId)
VALUES (19, 19, 'Fluid Density',
        'Sed dsajda aliquam ultrices mauris. Etiam sit amet orci eget eros faucibus tincidunt.',
        19, 8010, 8);
INSERT INTO Project(ProjectId, Number, Name, Abstract, BoothId, CourseNetworkingId, CategoryId)
VALUES (20, 20, 'Linear Combos',
        'Sed dsajda aliquam ultrices mauris. Etiam sit amet orci eget eros faucibus tincidunt.',
        20, 8010, 9);
INSERT INTO Project(ProjectId, Number, Name, Abstract, BoothId, CourseNetworkingId, CategoryId)
VALUES (21, 21, 'Sunflowers',
        'Sed dsajda aliquam ultrices mauris. Etiam sit amet orci eget eros faucibus tincidunt.',
        21, 8010, 10);

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

# students
INSERT INTO User(FirstName, LastName, Status) VALUES ('Jazmin', 'Roberson', 'active'); #35
INSERT INTO User(FirstName, LastName, Status) VALUES ('Lindsey', 'Stone', 'active');
INSERT INTO User(FirstName, LastName, Status) VALUES ('Peggy', 'Finnegan', 'active');
INSERT INTO User(FirstName, LastName, Status) VALUES ('Sebastien', 'Glover', 'active');
INSERT INTO User(FirstName, LastName, Status) VALUES ('Darnell', 'Lennon', 'active');
INSERT INTO User(FirstName, LastName, Status) VALUES ('Aamir', 'Browning', 'active');
INSERT INTO User(FirstName, LastName, Status) VALUES ('Parker', 'Henderson', 'active');
INSERT INTO User(FirstName, LastName, Status) VALUES ('Beatrice', 'Ortega', 'active');
INSERT INTO User(FirstName, LastName, Status) VALUES ('Elysia', 'Driscoll', 'active');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Helenka', 'Follos', 'male', 'registered', 'hfollos0@ifeng.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Hildegaard', 'Shorey', 'other', 'active', 'hshorey1@usatoday.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Beck', 'Feasey', 'other', 'active', 'bfeasey2@squarespace.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Dorry', 'Vanichev', 'other', 'active', 'dvanichev3@unesco.org');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Avictor', 'Parry', 'other', 'invited', 'aparry4@google.com.br');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Angelica', 'Joselevitz', 'other', 'archived', 'ajoselevitz5@npr.org');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Ricky', 'Menlove', 'other', 'active', 'rmenlove6@senate.gov');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Thorsten', 'Comello', 'male', 'archived', 'tcomello7@biglobe.ne.jp');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Adriane', 'Thornton-Dewhirst', 'other', 'registered', 'athorntondewhirst8@hatena.ne.jp');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Tuckie', 'Belfit', 'male', 'invited', 'tbelfit9@technorati.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Clarie', 'Garrie', 'male', 'registered', 'cgarriea@about.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Meier', 'Hyndson', 'female', 'archived', 'mhyndsonb@zdnet.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Hilda', 'Shulem', 'female', 'active', 'hshulemc@behance.net');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Genevieve', 'Astlett', 'male', 'invited', 'gastlettd@addtoany.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Brook', 'Mangion', 'female', 'active', 'bmangione@gov.uk');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Laurie', 'Kerton', 'male', 'archived', 'lkertonf@alexa.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Donia', 'Sheen', 'other', 'active', 'dsheeng@dyndns.org');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Eugenie', 'Tildesley', 'other', 'active', 'etildesleyh@japanpost.jp');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Cathleen', 'McSporon', 'male', 'registered', 'cmcsporoni@4shared.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Gideon', 'Carek', 'other', 'registered', 'gcarekj@opensource.org');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Nicolle', 'Halkyard', 'other', 'registered', 'nhalkyardk@sciencedaily.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Muhammad', 'Spoor', 'female', 'active', 'mspoorl@upenn.edu');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Dallon', 'MacMenemy', 'other', 'invited', 'dmacmenemym@bloomberg.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Kinny', 'Josilevich', 'other', 'invited', 'kjosilevichn@naver.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Zachariah', 'Chellam', 'male', 'invited', 'zchellamo@cargocollective.com');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Sybilla', 'Dyshart', 'female', 'archived', 'sdyshartp@timesonline.co.uk');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Audra', 'Hutchin', 'male', 'invited', 'ahutchinq@tiny.cc');
insert into User (FirstName, LastName, Gender, Status, Email) values ('Rebekah', 'McCuaig', 'female', 'registered', 'rmccuaigr@howstuffworks.com'); #71

INSERT INTO UserYear(Year, UserId) VALUES(2020, 35);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 36);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 37);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 38);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 39);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 40);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 41);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 42);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 43);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 44);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 45);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 46);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 47);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 48);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 49);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 50);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 51);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 52);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 53);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 54);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 55);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 56);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 57);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 58);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 59);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 60);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 61);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 62);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 63);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 64);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 65);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 66);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 67);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 68);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 69);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 70);
INSERT INTO UserYear(Year, UserId) VALUES(2020, 71);

INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (35, 1, 1, 1);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (36, 1, 1, 2);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (37, 1, 2, 1);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (38, 1, 2, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (39, 1, 3, 4);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (40, 1, 3, 3);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (41, 1, 4, 2);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (42, 1, 4, 6);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (43, 1, 5, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (44, 1, 5, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (45, 1, 6, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (46, 1, 6, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (47, 1, 7, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (48, 1, 7, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (49, 1, 8, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (50, 1, 8, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (51, 1, 9, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (52, 1, 9, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (53, 1, 10, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (54, 1, 10, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (55, 1, 11, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (56, 1, 11, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (57, 1, 12, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (58, 1, 12, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (59, 1, 13, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (60, 1, 14, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (61, 1, 14, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (62, 1, 15, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (63, 1, 15, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (64, 1, 15, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (65, 1, 18, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (66, 1, 18, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (67, 1, 19, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (68, 1, 19, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (69, 1, 20, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (70, 1, 21, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (71, 1, 13, 5);
