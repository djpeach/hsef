<?php

function uploadCSV(Slim\Slim $app) {
  return function() use ($app) {
      $tmp_loc = $_FILES['csv']['tmp_name'];
      $ext=substr($filename,strrpos($filename,"."),(strlen($filename)-strrpos($filename,".")));
      if($ext="csv"){
        $file = fopen($tmp_loc, "r");
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
  
          $reqBody = $app->req->jsonBody();

          $student = valueOrError($reqBody->student, new BadRequest("You must provide a project object on the request body"));
          $resBody = [];

          $project2= valueOrError($reqBody->project, new BadRequest("You must provide a project object on the request body"));
          $resBody2 = [];

            //Create Students          
            $sql = DB::get()->prepare("INSERT INTO Student(SchoolId, UserId, ProjectId, GradeLevelId) VALUES('$emapData[0]','$emapData[1]','$emapData[2],'$emapData[3],'$emapData[4]')");
            execOrError($sql->execute([
              valueOrNull($student->schoolId),
              valueOrError($userId, new ApiException("userId does not exist")),
              valueOrNull($student->projectId),
              valueOrNull($student->gradeLevelId)
            ]), new DatabaseError("Failed to create new student", 502));
        
            $studentId = DB::get()->lastInsertId();
            $resBody["studentId"] = $studentId;

            //Create Projects
            $sql = DB::get()->prepare("INSERT into Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) VALUES('$emapData[5]','$emapData[6]','$emapData[7],$emapData[8]','$emapData[9]','$emapData[10]','$emapData[11]')");
            execOrError($sql->execute([
              valueOrNull($project->number),
              valueOrError($project->name, new BadRequest("Project name cannot be missing or blank")),
              valueOrNull($project->abstract),
              valueOrNull($project->boothId),
              valueOrNull($project->courseNetworkingId),
              valueOrNull($project->categoryId),
            ]), new DatabaseError("Failed to create new project", 502));
        
            $projectId = DB::get()->lastInsertId();
            $resBody2["projectId"] = $projectId;

            $app->res->json([$emapData]);
            break;
        }
        
        fclose($file);
        echo "CSV File has been successfully Imported.";
      }
        else {
          echo "Error: Please Try Uploading Again";
      }
  };
}



