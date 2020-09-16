ALTER TABLE User ADD CONSTRAINT fk_User_AuthSession_UserId_CreateBy FOREIGN KEY fk_User_AuthSession_UserId_CreateBy (CreateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_AuthSession_UserId_UpdateBy FOREIGN KEY fk_User_AuthSession_UserId_UpdateBy (UpdateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_Booth_UserId_CreateBy FOREIGN KEY fk_User_Booth_UserId_CreateBy (CreateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_Booth_UserId_UpdateBy FOREIGN KEY fk_User_Booth_UserId_UpdateBy (UpdateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_Category_UserId_CreateBy FOREIGN KEY fk_User_Category_UserId_CreateBy (CreateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_Category_UserId_UpdateBy FOREIGN KEY fk_User_Category_UserId_UpdateBy (UpdateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_County_UserId_CreateBy FOREIGN KEY fk_User_County_UserId_CreateBy (CreateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_County_UserId_UpdateBy FOREIGN KEY fk_User_County_UserId_UpdateBy (UpdateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_Entitlement_UserId_CreateBy FOREIGN KEY fk_User_Entitlement_UserId_CreateBy (CreateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_Entitlement_UserId_UpdateBy FOREIGN KEY fk_User_Entitlement_UserId_UpdateBy (UpdateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_GradeLevel_UserId_CreateBy FOREIGN KEY fk_User_GradeLevel_UserId_CreateBy (CreateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_GradeLevel_UserId_UpdateBy FOREIGN KEY fk_User_GradeLevel_UserId_UpdateBy (UpdateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_JudgingSession_UserId_CreateBy FOREIGN KEY fk_User_JudgingSession_UserId_CreateBy (CreateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_JudgingSession_UserId_UpdateBy FOREIGN KEY fk_User_JudgingSession_UserId_UpdateBy (UpdateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_OneTimeToken_UserId_CreateBy FOREIGN KEY fk_User_OneTimeToken_UserId_CreateBy (CreateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_Operator_UserId_CreateBy FOREIGN KEY fk_User_Operator_UserId_CreateBy (CreateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_Operator_UserId_UpdateBy FOREIGN KEY fk_User_Operator_UserId_UpdateBy (UpdateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_OperatorCategory_UserId_CreateBy FOREIGN KEY fk_User_OperatorCategory_UserId_CreateBy (CreateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_OperatorCategory_UserId_UpdateBy FOREIGN KEY fk_User_OperatorCategory_UserId_UpdateBy (UpdateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_OperatorEntitlement_UserId_CreateBy FOREIGN KEY fk_User_OperatorEntitlement_UserId_CreateBy (CreateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_OperatorEntitlement_UserId_UpdateBy FOREIGN KEY fk_User_OperatorEntitlement_UserId_UpdateBy (UpdateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_OperatorGradeLevel_UserId_CreateBy FOREIGN KEY fk_User_OperatorGradeLevel_UserId_CreateBy (CreateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_OperatorGradeLevel_UserId_UpdateBy FOREIGN KEY fk_User_OperatorGradeLevel_UserId_UpdateBy (UpdateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_Project_UserId_CreateBy FOREIGN KEY fk_User_Project_UserId_CreateBy (CreateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_Project_UserId_UpdateBy FOREIGN KEY fk_User_Project_UserId_UpdateBy (UpdateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_Ranking_UserId_CreateBy FOREIGN KEY fk_User_Ranking_UserId_CreateBy (CreateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_Ranking_UserId_UpdateBy FOREIGN KEY fk_User_Ranking_UserId_UpdateBy (UpdateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_School_UserId_CreateBy FOREIGN KEY fk_User_School_UserId_CreateBy (CreateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_School_UserId_UpdateBy FOREIGN KEY fk_User_School_UserId_UpdateBy (UpdateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_Student_UserId_CreateBy FOREIGN KEY fk_User_Student_UserId_CreateBy (CreateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_Student_UserId_UpdateBy FOREIGN KEY fk_User_Student_UserId_UpdateBy (UpdateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_TimeSlot_UserId_CreateBy FOREIGN KEY fk_User_TimeSlot_UserId_CreateBy (CreateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_TimeSlot_UserId_UpdateBy FOREIGN KEY fk_User_TimeSlot_UserId_UpdateBy (UpdateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_User_UserId_CreateBy FOREIGN KEY fk_User_User_UserId_CreateBy (CreateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;
ALTER TABLE User ADD CONSTRAINT fk_User_User_UserId_UpdateBy FOREIGN KEY fk_User_User_UserId_UpdateBy (UpdateBy)
   REFERENCES User (UserId) ON DELETE SET NULL;