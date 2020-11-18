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
#
# INSERT INTO OperatorCategory(OperatorId, CategoryId) values (1, 1);
# INSERT INTO OperatorCategory(OperatorId, CategoryId) values (1, 2);
# INSERT INTO OperatorCategory(OperatorId, CategoryId) values (1, 3);
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
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (22,1,'Span','Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.

Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.',9,10,5);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (23,2,'Quo Lux','In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.

Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.',42,53,6);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (24,3,'Span','Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.',9,44,4);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (25,4,'Prodder','Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.',8,11,2);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (26,5,'Tampflex','Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.

Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.',7,87,10);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (27,6,'Bitwolf','Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.

In congue. Etiam justo. Etiam pretium iaculis justo.',49,100,4);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (28,7,'Treeflex','Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.

Sed ante. Vivamus tortor. Duis mattis egestas metus.',14,73,9);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (29,8,'Regrant','Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.

Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.',26,92,8);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (30,9,'Hatity','Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.

Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.',14,61,1);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (31,10,'Flexidy','Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',28,10,3);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (32,11,'Bytecard','In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.',22,82,7);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (33,12,'Alphazap','In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.',28,94,10);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (34,13,'Zoolab','Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.

Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.',4,96,7);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (35,14,'Bitchip','Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',10,8,3);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (36,15,'Gembucket','Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.

Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',22,78,3);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (37,16,'It','Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.

Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.',7,10,1);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (38,17,'Toughjoyfax','Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.',1,45,8);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (39,18,'Bigtax','Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.',15,58,4);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (40,19,'Viva','Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.

Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.',39,79,5);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (41,20,'Andalax','Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.',25,43,1);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (42,21,'Daltfresh','Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.

Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.',29,17,10);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (43,22,'Stim','Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.',8,8,9);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (44,23,'Biodex','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.

Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.',10,63,9);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (45,24,'It','In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.

Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.',42,16,2);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (46,25,'Hatity','Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.',6,8,10);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (47,26,'Lotstring','Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.',45,95,1);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (48,27,'Veribet','Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.

Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.',3,64,7);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (49,28,'Bitchip','Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.

Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.',33,66,3);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (50,29,'Voyatouch','Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.',48,58,10);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (51,30,'Flowdesk','Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.',36,11,5);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (52,31,'Trippledex','Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.',4,57,7);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (53,32,'Rank','Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.

Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.',9,62,9);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (54,33,'Namfix','In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.

Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.',49,31,6);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (55,34,'Flowdesk','Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.

Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.',45,25,7);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (56,35,'Subin','Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.',42,4,8);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (57,36,'Tempsoft','Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.',43,36,10);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (58,37,'Fixflex','Phasellus in felis. Donec semper sapien a libero. Nam dui.',31,34,8);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (59,38,'Cookley','Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.

Phasellus in felis. Donec semper sapien a libero. Nam dui.',45,71,6);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (60,39,'Gembucket','Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.',49,14,1);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (61,40,'Lotstring','Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.

In congue. Etiam justo. Etiam pretium iaculis justo.',45,84,5);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (62,41,'Latlux','Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.',5,6,1);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (63,42,'Toughjoyfax','Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.

Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.',37,77,6);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (64,43,'Subin','Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.',14,47,10);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (65,44,'Voltsillam','Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.',31,56,4);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (66,45,'Ronstring','Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.

In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.',6,31,3);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (67,46,'Ronstring','In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.

Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.',44,60,8);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (68,47,'Namfix','Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.

Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.',44,63,6);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (69,48,'Tin','Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.',11,71,2);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (70,49,'Opela','Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.

Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.',24,83,7);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (71,50,'Tresom','Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.

Phasellus in felis. Donec semper sapien a libero. Nam dui.',39,62,5);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (72,51,'Ventosanzap','Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.',45,85,4);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (73,52,'Holdlamis','Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.

Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.',30,68,7);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (74,53,'Cardguard','Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.

Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.',12,28,1);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (75,54,'Flowdesk',NULL,24,68,6);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (76,55,'Tin','Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.

Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.',47,62,5);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (77,56,'Toughjoyfax','Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.',41,64,2);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (78,57,'Mat Lam Tam','Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.

In congue. Etiam justo. Etiam pretium iaculis justo.',44,48,3);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (79,58,'Hatity','Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.',39,81,8);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (80,59,'Sonair','Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.

Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.',7,29,8);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (81,60,'Bamity','Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.',48,88,1);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (82,61,'Regrant','Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.

Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.',31,67,6);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (83,62,'Tresom','Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.',30,100,9);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (84,63,'Solarbreeze','Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.

Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.',43,90,8);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (85,64,'Ronstring','In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.',12,26,3);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (86,65,'Fintone','Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.',9,3,8);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (87,66,'Zaam-Dox','Phasellus in felis. Donec semper sapien a libero. Nam dui.

Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.',25,51,1);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (88,67,'Andalax','In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.',20,62,1);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (89,68,'Greenlam','Fusce consequat. Nulla nisl. Nunc nisl.

Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.',9,63,7);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (90,69,'Regrant','In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.',19,39,10);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (91,70,'Stringtough',NULL,44,62,1);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (92,71,'Keylex','Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.',20,74,10);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (93,72,'Flexidy','Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.

Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.',15,18,2);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (94,73,'Prodder','In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.

Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.',14,99,7);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (95,74,'Transcof','Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.

Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.',3,37,3);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (96,75,'Namfix','Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.

Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.',44,5,10);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (97,76,'Home Ing','Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.',14,75,1);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (98,77,'Stringtough','Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.',8,70,1);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (99,78,'Cookley','Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.',2,38,2);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (100,79,'Greenlam','Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.

Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.',2,9,7);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (101,80,'Daltfresh','Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.',30,77,3);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (102,81,'Treeflex','Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.',21,92,2);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (103,82,'Flexidy','Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.

In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.',23,14,5);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (104,83,'Quo Lux','Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.',25,99,1);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (105,84,'Toughjoyfax','Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.

Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.',36,83,5);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (106,85,'Span','In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.',4,27,1);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (107,86,'Bigtax','Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',7,16,9);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (108,87,'Alpha','Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.',14,95,5);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (109,88,'Bytecard','Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.',22,32,8);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (110,89,'Konklab','Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.

Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.',45,71,2);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (111,90,'Toughjoyfax','Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.',34,59,6);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (112,91,'Bytecard','Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.',31,97,7);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (113,92,'Gembucket','Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.',3,4,4);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (114,93,'Vagram','Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.',17,80,4);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (115,94,'Mat Lam Tam','Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.

Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.',8,23,7);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (116,95,'Daltfresh','Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.',28,94,2);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (117,96,'Tin','Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.

Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.',44,59,3);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (118,97,'Cardguard',NULL,29,92,9);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (119,98,'Quo Lux','Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.',41,53,3);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (120,99,'Quo Lux','Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.',21,13,3);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (121,100,'Matsoft','Sed ante. Vivamus tortor. Duis mattis egestas metus.

Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.',30,35,8);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (122,101,'Flexidy','Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.',15,14,9);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (123,102,'Flowdesk','Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.

Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.',20,38,5);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (124,103,'Sonair','Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.

Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.',18,50,4);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (125,104,'Konklux','Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.',8,39,7);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (126,105,'Tin','Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.',10,3,10);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (127,106,'Bytecard','Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.

Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.',35,22,8);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (128,107,'Namfix','Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.

In congue. Etiam justo. Etiam pretium iaculis justo.',33,1,3);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (129,108,'Tresom','Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.

Sed ante. Vivamus tortor. Duis mattis egestas metus.',3,91,3);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (130,109,'Vagram','Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.',28,58,10);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (131,110,'Voltsillam','Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.',30,4,5);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (132,111,'Kanlam','In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.

Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.',20,44,1);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (133,112,'Fintone','In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.',36,39,8);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (134,113,'Keylex','Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.',30,19,5);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (135,114,'Zathin','Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.

Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.',11,7,3);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (136,115,'Matsoft','Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.',25,21,3);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (137,116,'Greenlam','Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.',18,16,6);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (138,117,'Bamity','Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.',15,5,6);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (139,118,'Asoka','Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.',25,85,7);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (140,119,'Overhold','In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.

Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.',27,67,5);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (141,120,'Mat Lam Tam','Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.

Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.',26,36,5);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (142,121,'Bytecard','In congue. Etiam justo. Etiam pretium iaculis justo.',29,25,3);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (143,122,'Bigtax','Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.',41,63,9);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (144,123,'Bigtax','Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.',43,70,1);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (145,124,'Pannier','Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.',1,46,3);
INSERT INTO Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES (146,125,'Temp','Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.',50,34,8);


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
INSERT INTO UserYear(UserId,Year) VALUES (72,2020);
INSERT INTO UserYear(UserId,Year) VALUES (73,2020);
INSERT INTO UserYear(UserId,Year) VALUES (74,2020);
INSERT INTO UserYear(UserId,Year) VALUES (75,2020);
INSERT INTO UserYear(UserId,Year) VALUES (76,2020);
INSERT INTO UserYear(UserId,Year) VALUES (77,2020);
INSERT INTO UserYear(UserId,Year) VALUES (78,2020);
INSERT INTO UserYear(UserId,Year) VALUES (79,2020);
INSERT INTO UserYear(UserId,Year) VALUES (80,2020);
INSERT INTO UserYear(UserId,Year) VALUES (81,2020);
INSERT INTO UserYear(UserId,Year) VALUES (82,2020);
INSERT INTO UserYear(UserId,Year) VALUES (83,2020);
INSERT INTO UserYear(UserId,Year) VALUES (84,2020);
INSERT INTO UserYear(UserId,Year) VALUES (85,2020);
INSERT INTO UserYear(UserId,Year) VALUES (86,2020);
INSERT INTO UserYear(UserId,Year) VALUES (87,2020);
INSERT INTO UserYear(UserId,Year) VALUES (88,2020);
INSERT INTO UserYear(UserId,Year) VALUES (89,2020);
INSERT INTO UserYear(UserId,Year) VALUES (90,2020);
INSERT INTO UserYear(UserId,Year) VALUES (91,2020);
INSERT INTO UserYear(UserId,Year) VALUES (92,2020);
INSERT INTO UserYear(UserId,Year) VALUES (93,2020);
INSERT INTO UserYear(UserId,Year) VALUES (94,2020);
INSERT INTO UserYear(UserId,Year) VALUES (95,2020);
INSERT INTO UserYear(UserId,Year) VALUES (96,2020);
INSERT INTO UserYear(UserId,Year) VALUES (97,2020);
INSERT INTO UserYear(UserId,Year) VALUES (98,2020);
INSERT INTO UserYear(UserId,Year) VALUES (99,2020);
INSERT INTO UserYear(UserId,Year) VALUES (100,2020);
INSERT INTO UserYear(UserId,Year) VALUES (101,2020);
INSERT INTO UserYear(UserId,Year) VALUES (102,2020);
INSERT INTO UserYear(UserId,Year) VALUES (103,2020);
INSERT INTO UserYear(UserId,Year) VALUES (104,2020);
INSERT INTO UserYear(UserId,Year) VALUES (105,2020);
INSERT INTO UserYear(UserId,Year) VALUES (106,2020);
INSERT INTO UserYear(UserId,Year) VALUES (107,2020);
INSERT INTO UserYear(UserId,Year) VALUES (108,2020);
INSERT INTO UserYear(UserId,Year) VALUES (109,2020);
INSERT INTO UserYear(UserId,Year) VALUES (110,2020);
INSERT INTO UserYear(UserId,Year) VALUES (111,2020);
INSERT INTO UserYear(UserId,Year) VALUES (112,2020);
INSERT INTO UserYear(UserId,Year) VALUES (113,2020);
INSERT INTO UserYear(UserId,Year) VALUES (114,2020);
INSERT INTO UserYear(UserId,Year) VALUES (115,2020);
INSERT INTO UserYear(UserId,Year) VALUES (116,2020);
INSERT INTO UserYear(UserId,Year) VALUES (117,2020);
INSERT INTO UserYear(UserId,Year) VALUES (118,2020);
INSERT INTO UserYear(UserId,Year) VALUES (119,2020);
INSERT INTO UserYear(UserId,Year) VALUES (120,2020);
INSERT INTO UserYear(UserId,Year) VALUES (121,2020);
INSERT INTO UserYear(UserId,Year) VALUES (122,2020);
INSERT INTO UserYear(UserId,Year) VALUES (123,2020);
INSERT INTO UserYear(UserId,Year) VALUES (124,2020);
INSERT INTO UserYear(UserId,Year) VALUES (125,2020);
INSERT INTO UserYear(UserId,Year) VALUES (126,2020);
INSERT INTO UserYear(UserId,Year) VALUES (127,2020);
INSERT INTO UserYear(UserId,Year) VALUES (128,2020);
INSERT INTO UserYear(UserId,Year) VALUES (129,2020);
INSERT INTO UserYear(UserId,Year) VALUES (130,2020);
INSERT INTO UserYear(UserId,Year) VALUES (131,2020);
INSERT INTO UserYear(UserId,Year) VALUES (132,2020);
INSERT INTO UserYear(UserId,Year) VALUES (133,2020);
INSERT INTO UserYear(UserId,Year) VALUES (134,2020);
INSERT INTO UserYear(UserId,Year) VALUES (135,2020);
INSERT INTO UserYear(UserId,Year) VALUES (136,2020);
INSERT INTO UserYear(UserId,Year) VALUES (137,2020);
INSERT INTO UserYear(UserId,Year) VALUES (138,2020);
INSERT INTO UserYear(UserId,Year) VALUES (139,2020);
INSERT INTO UserYear(UserId,Year) VALUES (140,2020);
INSERT INTO UserYear(UserId,Year) VALUES (141,2020);
INSERT INTO UserYear(UserId,Year) VALUES (142,2020);
INSERT INTO UserYear(UserId,Year) VALUES (143,2020);
INSERT INTO UserYear(UserId,Year) VALUES (144,2020);
INSERT INTO UserYear(UserId,Year) VALUES (145,2020);
INSERT INTO UserYear(UserId,Year) VALUES (146,2020);
INSERT INTO UserYear(UserId,Year) VALUES (147,2020);
INSERT INTO UserYear(UserId,Year) VALUES (148,2020);
INSERT INTO UserYear(UserId,Year) VALUES (149,2020);
INSERT INTO UserYear(UserId,Year) VALUES (150,2020);
INSERT INTO UserYear(UserId,Year) VALUES (151,2020);
INSERT INTO UserYear(UserId,Year) VALUES (152,2020);
INSERT INTO UserYear(UserId,Year) VALUES (153,2020);
INSERT INTO UserYear(UserId,Year) VALUES (154,2020);
INSERT INTO UserYear(UserId,Year) VALUES (155,2020);
INSERT INTO UserYear(UserId,Year) VALUES (156,2020);
INSERT INTO UserYear(UserId,Year) VALUES (157,2020);
INSERT INTO UserYear(UserId,Year) VALUES (158,2020);
INSERT INTO UserYear(UserId,Year) VALUES (159,2020);
INSERT INTO UserYear(UserId,Year) VALUES (160,2020);
INSERT INTO UserYear(UserId,Year) VALUES (161,2020);
INSERT INTO UserYear(UserId,Year) VALUES (162,2020);
INSERT INTO UserYear(UserId,Year) VALUES (163,2020);
INSERT INTO UserYear(UserId,Year) VALUES (164,2020);
INSERT INTO UserYear(UserId,Year) VALUES (165,2020);
INSERT INTO UserYear(UserId,Year) VALUES (166,2020);
INSERT INTO UserYear(UserId,Year) VALUES (167,2020);
INSERT INTO UserYear(UserId,Year) VALUES (168,2020);
INSERT INTO UserYear(UserId,Year) VALUES (169,2020);
INSERT INTO UserYear(UserId,Year) VALUES (170,2020);
INSERT INTO UserYear(UserId,Year) VALUES (171,2020);
INSERT INTO UserYear(UserId,Year) VALUES (172,2020);
INSERT INTO UserYear(UserId,Year) VALUES (173,2020);
INSERT INTO UserYear(UserId,Year) VALUES (174,2020);
INSERT INTO UserYear(UserId,Year) VALUES (175,2020);
INSERT INTO UserYear(UserId,Year) VALUES (176,2020);
INSERT INTO UserYear(UserId,Year) VALUES (177,2020);
INSERT INTO UserYear(UserId,Year) VALUES (178,2020);
INSERT INTO UserYear(UserId,Year) VALUES (179,2020);
INSERT INTO UserYear(UserId,Year) VALUES (180,2020);
INSERT INTO UserYear(UserId,Year) VALUES (181,2020);
INSERT INTO UserYear(UserId,Year) VALUES (182,2020);
INSERT INTO UserYear(UserId,Year) VALUES (183,2020);
INSERT INTO UserYear(UserId,Year) VALUES (184,2020);
INSERT INTO UserYear(UserId,Year) VALUES (185,2020);
INSERT INTO UserYear(UserId,Year) VALUES (186,2020);
INSERT INTO UserYear(UserId,Year) VALUES (187,2020);
INSERT INTO UserYear(UserId,Year) VALUES (188,2020);
INSERT INTO UserYear(UserId,Year) VALUES (189,2020);
INSERT INTO UserYear(UserId,Year) VALUES (190,2020);
INSERT INTO UserYear(UserId,Year) VALUES (191,2020);
INSERT INTO UserYear(UserId,Year) VALUES (192,2020);
INSERT INTO UserYear(UserId,Year) VALUES (193,2020);
INSERT INTO UserYear(UserId,Year) VALUES (194,2020);
INSERT INTO UserYear(UserId,Year) VALUES (195,2020);
INSERT INTO UserYear(UserId,Year) VALUES (196,2020);

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

INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (9, 1, 1, 1);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (10, 1, 2, 2);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (11, 1, 3, 1);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (12, 1, 4, 5);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (13, 1, 5, 4);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (14, 1, 5, 3);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (15, 1, 6, 2);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (16, 1, 7, 6);
INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (17, 1, 8, 5);

INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (22,3,72,3);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (23,2,73,1);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (24,8,74,5);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (25,6,75,1);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (26,5,76,7);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (27,10,77,10);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (28,9,78,5);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (29,6,79,7);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (30,6,80,7);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (31,2,81,1);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (32,10,82,6);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (33,10,83,5);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (34,3,84,4);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (35,3,85,3);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (36,5,86,8);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (37,1,87,12);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (38,6,88,4);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (39,6,89,3);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (40,10,90,11);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (41,4,91,11);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (42,1,92,4);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (43,2,93,2);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (44,1,94,5);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (45,4,95,3);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (46,5,96,10);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (47,6,97,10);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (48,7,98,10);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (49,7,99,12);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (50,10,100,5);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (51,3,101,6);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (52,4,102,7);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (53,5,103,11);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (54,6,104,11);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (55,5,105,4);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (56,2,106,11);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (57,9,107,6);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (58,7,108,4);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (59,7,109,1);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (60,10,110,5);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (61,2,111,4);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (62,4,112,7);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (63,4,113,11);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (64,1,114,6);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (65,10,115,11);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (66,4,116,3);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (67,8,117,7);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (68,6,118,11);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (69,1,119,8);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (70,2,120,11);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (71,1,121,3);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (72,10,122,2);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (73,1,123,12);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (74,10,124,6);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (75,6,125,2);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (76,2,126,1);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (77,8,127,7);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (78,9,128,1);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (79,6,129,4);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (80,8,130,8);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (81,8,131,5);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (82,6,132,1);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (83,5,133,8);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (84,4,134,2);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (85,5,135,6);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (86,1,136,2);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (87,3,137,7);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (88,8,138,2);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (89,6,139,6);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (90,6,140,4);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (91,10,141,6);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (92,9,142,2);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (93,3,143,1);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (94,10,144,12);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (95,7,145,5);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (96,2,146,4);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (97,2,147,1);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (98,4,148,11);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (99,5,149,11);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (100,4,150,11);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (101,2,151,10);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (102,10,152,4);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (103,4,153,8);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (104,3,154,12);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (105,9,155,7);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (106,1,156,9);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (107,8,157,3);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (108,7,158,5);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (109,3,159,7);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (110,6,160,5);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (111,8,161,12);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (112,10,162,8);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (113,1,163,10);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (114,8,164,6);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (115,7,165,2);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (116,1,166,10);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (117,9,167,1);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (118,9,168,1);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (119,9,169,3);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (120,3,170,4);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (121,2,171,12);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (122,3,172,1);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (123,5,173,11);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (124,6,174,10);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (125,4,175,8);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (126,7,176,2);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (127,3,177,3);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (128,9,178,7);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (129,6,179,9);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (130,10,180,3);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (131,6,181,3);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (132,2,182,2);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (133,1,183,3);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (134,6,184,12);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (135,9,185,4);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (136,4,186,6);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (137,1,187,6);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (138,2,188,5);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (139,5,189,3);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (140,5,190,12);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (141,8,191,2);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (142,8,192,6);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (143,9,193,2);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (144,3,194,2);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (145,5,195,8);
INSERT INTO Student(ProjectId,SchoolId,UserId,GradeLevelId) VALUES (146,4,196,5);

