-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2020-09-15 23:25:54.015

-- tables
-- Table: AuthAccount
CREATE TABLE AuthAccount (
    AuthAccountId int unsigned NOT NULL AUTO_INCREMENT,
    PasswordHash varchar(255) NOT NULL,
    Username varchar(255) NOT NULL,
    Active bool NOT NULL DEFAULT true,
    UserId int unsigned NOT NULL,
    UNIQUE INDEX fak_AuthAccount_User_UserId (UserId),
    CONSTRAINT AuthAccount_pk PRIMARY KEY (AuthAccountId)
);

-- Table: AuthSession
CREATE TABLE AuthSession (
    AuthSessionId int unsigned NOT NULL AUTO_INCREMENT,
    SessionId varchar(255) NOT NULL,
    AuthAccountId int unsigned NOT NULL,
    StartTime timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT AuthSession_pk PRIMARY KEY (AuthSessionId)
);

-- Table: Booth
CREATE TABLE Booth (
    BoothId int unsigned NOT NULL AUTO_INCREMENT,
    Number smallint NOT NULL,
    Active bool NOT NULL DEFAULT true,
    UNIQUE INDEX ak_Booth_Number (Number),
    CONSTRAINT Booth_pk PRIMARY KEY (BoothId)
);

-- Table: Category
CREATE TABLE Category (
    CategoryId int unsigned NOT NULL AUTO_INCREMENT,
    Name char(64) NOT NULL,
    Active bool NOT NULL DEFAULT true,
    UNIQUE INDEX ak_Category_Name (Name),
    CONSTRAINT Category_pk PRIMARY KEY (CategoryId)
);

-- Table: County
CREATE TABLE County (
    CountyId int unsigned NOT NULL AUTO_INCREMENT,
    Name char(64) NOT NULL,
    UNIQUE INDEX ak_County_Name (Name),
    CONSTRAINT County_pk PRIMARY KEY (CountyId)
);

-- Table: Entitlement
CREATE TABLE Entitlement (
    EntitlementId int unsigned NOT NULL AUTO_INCREMENT,
    Name char(64) NOT NULL,
    UNIQUE INDEX ak_Entitlement_Name (Name),
    CONSTRAINT Entitlement_pk PRIMARY KEY (EntitlementId)
);

-- Table: GradeLevel
CREATE TABLE GradeLevel (
    GradeLevelId int unsigned NOT NULL AUTO_INCREMENT,
    Name char(64) NOT NULL,
    Active bool NOT NULL DEFAULT true,
    UNIQUE INDEX ak_GradeLevel_Name (Name),
    CONSTRAINT GradeLevel_pk PRIMARY KEY (GradeLevelId)
);

-- Table: JudgingSession
CREATE TABLE JudgingSession (
    JudgingSessionId int unsigned NOT NULL AUTO_INCREMENT,
    RawScore int NULL,
    TimeSlotId int unsigned NOT NULL,
    ProjectId int unsigned NOT NULL,
    OperatorId int unsigned NOT NULL,
    UNIQUE INDEX ak_JudgingSession_OperatorId_TimeSlotId (OperatorId,TimeSlotId),
    UNIQUE INDEX ak_JudgingSession_OperatorId_ProjectId (OperatorId,ProjectId),
    UNIQUE INDEX ak_JudgingSession_TimeSlotId_ProjectId (TimeSlotId,ProjectId),
    CONSTRAINT JudgingSession_pk PRIMARY KEY (JudgingSessionId)
);

-- Table: OneTimeToken
CREATE TABLE OneTimeToken (
    OneTimeTokenId int unsigned NOT NULL AUTO_INCREMENT,
    Token varchar(255) NOT NULL,
    AuthAccountId int unsigned NOT NULL,
    IsValid bool NOT NULL,
    CONSTRAINT OneTimeToken_pk PRIMARY KEY (OneTimeTokenId)
);

-- Table: Operator
CREATE TABLE Operator (
    OperatorId int unsigned NOT NULL AUTO_INCREMENT,
    UserId int unsigned NOT NULL,
    Title varchar(255) NULL,
    HighestDegree varchar(255) NULL,
    UNIQUE INDEX fak_Operator_User_UserId (UserId),
    CONSTRAINT Operator_pk PRIMARY KEY (OperatorId)
);

-- Table: OperatorCategory
CREATE TABLE OperatorCategory (
    OperatorCategoryId int unsigned NOT NULL AUTO_INCREMENT,
    OperatorId int unsigned NOT NULL,
    CategoryId int unsigned NOT NULL,
    UNIQUE INDEX fak_OperatorId_CategoryId (OperatorId,CategoryId),
    CONSTRAINT OperatorCategory_pk PRIMARY KEY (OperatorCategoryId)
);

-- Table: OperatorEntitlement
CREATE TABLE OperatorEntitlement (
    OperatorEntitlementId int unsigned NOT NULL AUTO_INCREMENT,
    OperatorId int unsigned NOT NULL,
    EntitlementId int unsigned NOT NULL,
    UNIQUE INDEX ak_OperatorId_EntitlementId (OperatorId,EntitlementId),
    CONSTRAINT OperatorEntitlement_pk PRIMARY KEY (OperatorEntitlementId)
);

-- Table: OperatorGradeLevel
CREATE TABLE OperatorGradeLevel (
    OperatorGradeLevelId int unsigned NOT NULL AUTO_INCREMENT,
    GradeLevelId int unsigned NOT NULL,
    OperatorId int unsigned NOT NULL,
    UNIQUE INDEX ak_GradeLevelId_OperatorId (GradeLevelId,OperatorId),
    CONSTRAINT OperatorGradeLevel_pk PRIMARY KEY (OperatorGradeLevelId)
);

-- Table: Project
CREATE TABLE Project (
    ProjectId int unsigned NOT NULL AUTO_INCREMENT,
    Number smallint unsigned NULL,
    Name char(128) NOT NULL,
    GradeLevelId int unsigned NULL,
    Abstract varchar(600) NULL,
    BoothId int unsigned NULL,
    CourseNetworkingId int unsigned NULL,
    CategoryId int unsigned NULL,
    CONSTRAINT Project_pk PRIMARY KEY (ProjectId)
);

-- Table: Ranking
CREATE TABLE Ranking (
    RankingId int unsigned NOT NULL AUTO_INCREMENT,
    ProjectId int unsigned NOT NULL,
    AverageRank decimal(5,2) NOT NULL,
    UNIQUE INDEX fak_Ranking_Project_ProjectId (ProjectId),
    CONSTRAINT Ranking_pk PRIMARY KEY (RankingId)
);

-- Table: School
CREATE TABLE School (
    SchoolId int unsigned NOT NULL AUTO_INCREMENT,
    Name char(128) NOT NULL,
    CountyId int unsigned NULL,
    UNIQUE INDEX ak_School_Name (Name),
    CONSTRAINT School_pk PRIMARY KEY (SchoolId)
);

-- Table: Student
CREATE TABLE Student (
    StudentId int unsigned NOT NULL AUTO_INCREMENT,
    SchoolId int unsigned NOT NULL,
    UserId int unsigned NOT NULL,
    ProjectId int unsigned NOT NULL,
    GradeLevelId int unsigned NOT NULL,
    UNIQUE INDEX fak_Student_UserId (UserId),
    CONSTRAINT Student_pk PRIMARY KEY (StudentId)
);

-- Table: TimeSlot
CREATE TABLE TimeSlot (
    TimeSlotId int unsigned NOT NULL AUTO_INCREMENT,
    StartTime time NOT NULL,
    EndTime time NOT NULL,
    CONSTRAINT TimeSlot_pk PRIMARY KEY (TimeSlotId)
);

-- Table: User
CREATE TABLE User (
    UserId int unsigned NOT NULL AUTO_INCREMENT,
    FirstName char(128) NOT NULL,
    MiddleName char(128) NULL,
    LastName char(128) NOT NULL,
    Suffix char(64) NULL,
    Gender enum('male', 'female', 'other') NULL,
    Status enum('active', 'registered', 'invited', 'archived') NOT NULL,
    CheckedIn bool NULL DEFAULT false,
    Email char(128) NULL,
    CONSTRAINT User_pk PRIMARY KEY (UserId)
) COMMENT 'Status:
    ''''active'''' users are the only ones who can authenticate.
    ''''registered'''' users are those who have signed up but have yet to be approved
     ''''invited'''' users are those that have been invited through the system, but have yet to accept
    ''''archived'''' are users that exist for historical display purposes.';

CREATE INDEX ix_User_Email ON User (Email);

CREATE INDEX ix_User_FirstName_LastName ON User (FirstName,LastName);

-- Table: UserYear
CREATE TABLE UserYear (
    UserYearId int unsigned NOT NULL AUTO_INCREMENT,
    Year year NOT NULL,
    UserId int unsigned NOT NULL,
    UNIQUE INDEX ak_User_UserId_Year (Year,UserId),
    CONSTRAINT UserYear_pk PRIMARY KEY (UserYearId)
);

-- foreign keys
-- Reference: JudgingSession_Operator (table: JudgingSession)
ALTER TABLE JudgingSession ADD CONSTRAINT JudgingSession_Operator FOREIGN KEY JudgingSession_Operator (OperatorId)
    REFERENCES Operator (OperatorId);

-- Reference: JudgingSession_Project (table: JudgingSession)
ALTER TABLE JudgingSession ADD CONSTRAINT JudgingSession_Project FOREIGN KEY JudgingSession_Project (ProjectId)
    REFERENCES Project (ProjectId);

-- Reference: JudgingSession_TimeSlot (table: JudgingSession)
ALTER TABLE JudgingSession ADD CONSTRAINT JudgingSession_TimeSlot FOREIGN KEY JudgingSession_TimeSlot (TimeSlotId)
    REFERENCES TimeSlot (TimeSlotId);

-- Reference: Ranking_Project (table: Ranking)
ALTER TABLE Ranking ADD CONSTRAINT Ranking_Project FOREIGN KEY Ranking_Project (ProjectId)
    REFERENCES Project (ProjectId);

-- Reference: UserYear_User (table: UserYear)
ALTER TABLE UserYear ADD CONSTRAINT UserYear_User FOREIGN KEY UserYear_User (UserId)
    REFERENCES User (UserId);

-- Reference: fk_AuthSession_AuthAccount_AuthAccountId (table: AuthSession)
ALTER TABLE AuthSession ADD CONSTRAINT fk_AuthSession_AuthAccount_AuthAccountId FOREIGN KEY fk_AuthSession_AuthAccount_AuthAccountId (AuthAccountId)
    REFERENCES AuthAccount (AuthAccountId);

-- Reference: fk_OneTimeToken_AuthAccount_AuthAccountId (table: OneTimeToken)
ALTER TABLE OneTimeToken ADD CONSTRAINT fk_OneTimeToken_AuthAccount_AuthAccountId FOREIGN KEY fk_OneTimeToken_AuthAccount_AuthAccountId (AuthAccountId)
    REFERENCES AuthAccount (AuthAccountId);

-- Reference: fk_OperatorCategory_Category_CategoryId (table: OperatorCategory)
ALTER TABLE OperatorCategory ADD CONSTRAINT fk_OperatorCategory_Category_CategoryId FOREIGN KEY fk_OperatorCategory_Category_CategoryId (CategoryId)
    REFERENCES Category (CategoryId);

-- Reference: fk_OperatorCategory_Operator_OperatorId (table: OperatorCategory)
ALTER TABLE OperatorCategory ADD CONSTRAINT fk_OperatorCategory_Operator_OperatorId FOREIGN KEY fk_OperatorCategory_Operator_OperatorId (OperatorId)
    REFERENCES Operator (OperatorId);

-- Reference: fk_OperatorEntitlement_Entitlement_EntitlementId (table: OperatorEntitlement)
ALTER TABLE OperatorEntitlement ADD CONSTRAINT fk_OperatorEntitlement_Entitlement_EntitlementId FOREIGN KEY fk_OperatorEntitlement_Entitlement_EntitlementId (EntitlementId)
    REFERENCES Entitlement (EntitlementId);

-- Reference: fk_OperatorEntitlement_Operator_OperatorId (table: OperatorEntitlement)
ALTER TABLE OperatorEntitlement ADD CONSTRAINT fk_OperatorEntitlement_Operator_OperatorId FOREIGN KEY fk_OperatorEntitlement_Operator_OperatorId (OperatorId)
    REFERENCES Operator (OperatorId);

-- Reference: fk_OperatorGradeLevel_GradeLevel_GradeLevelId (table: OperatorGradeLevel)
ALTER TABLE OperatorGradeLevel ADD CONSTRAINT fk_OperatorGradeLevel_GradeLevel_GradeLevelId FOREIGN KEY fk_OperatorGradeLevel_GradeLevel_GradeLevelId (GradeLevelId)
    REFERENCES GradeLevel (GradeLevelId);

-- Reference: fk_OperatorGradeLevel_Operator_OperatorId (table: OperatorGradeLevel)
ALTER TABLE OperatorGradeLevel ADD CONSTRAINT fk_OperatorGradeLevel_Operator_OperatorId FOREIGN KEY fk_OperatorGradeLevel_Operator_OperatorId (OperatorId)
    REFERENCES Operator (OperatorId);

-- Reference: fk_Operator_User_UserId (table: Operator)
ALTER TABLE Operator ADD CONSTRAINT fk_Operator_User_UserId FOREIGN KEY fk_Operator_User_UserId (UserId)
    REFERENCES User (UserId);

-- Reference: fk_Project_Booth_BoothId (table: Project)
ALTER TABLE Project ADD CONSTRAINT fk_Project_Booth_BoothId FOREIGN KEY fk_Project_Booth_BoothId (BoothId)
    REFERENCES Booth (BoothId);

-- Reference: fk_Project_Category_CategoryId (table: Project)
ALTER TABLE Project ADD CONSTRAINT fk_Project_Category_CategoryId FOREIGN KEY fk_Project_Category_CategoryId (CategoryId)
    REFERENCES Category (CategoryId);

-- Reference: fk_Project_GradeLevel_GradeLevelId (table: Project)
ALTER TABLE Project ADD CONSTRAINT fk_Project_GradeLevel_GradeLevelId FOREIGN KEY fk_Project_GradeLevel_GradeLevelId (GradeLevelId)
    REFERENCES GradeLevel (GradeLevelId);

-- Reference: fk_School_County_CountyId (table: School)
ALTER TABLE School ADD CONSTRAINT fk_School_County_CountyId FOREIGN KEY fk_School_County_CountyId (CountyId)
    REFERENCES County (CountyId);

-- Reference: fk_Student_GradeLevel_GradeLevelId (table: Student)
ALTER TABLE Student ADD CONSTRAINT fk_Student_GradeLevel_GradeLevelId FOREIGN KEY fk_Student_GradeLevel_GradeLevelId (GradeLevelId)
    REFERENCES GradeLevel (GradeLevelId);

-- Reference: fk_Student_Project_ProjectId (table: Student)
ALTER TABLE Student ADD CONSTRAINT fk_Student_Project_ProjectId FOREIGN KEY fk_Student_Project_ProjectId (ProjectId)
    REFERENCES Project (ProjectId);

-- Reference: fk_Student_School_SchoolId (table: Student)
ALTER TABLE Student ADD CONSTRAINT fk_Student_School_SchoolId FOREIGN KEY fk_Student_School_SchoolId (SchoolId)
    REFERENCES School (SchoolId);

-- Reference: fk_Student_User_UserId (table: Student)
ALTER TABLE Student ADD CONSTRAINT fk_Student_User_UserId FOREIGN KEY fk_Student_User_UserId (UserId)
    REFERENCES User (UserId);

-- Reference: fk_User_AuthAccount_UserId (table: AuthAccount)
ALTER TABLE AuthAccount ADD CONSTRAINT fk_User_AuthAccount_UserId FOREIGN KEY fk_User_AuthAccount_UserId (UserId)
    REFERENCES User (UserId);

-- End of file.

