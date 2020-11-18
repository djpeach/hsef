<?php

function uploadCSV(Slim\Slim $app) {
  return function() use ($app) {
      $tmp_loc = $_FILES['csv']['tmp_name'];
      $file = fopen($tmp_loc, "r");
      $students = [];
      $schools = [
        "school1" => "county4",
        "school2" => "county7"
      ];
      $counties = [];
      $projects = [];
      $gradeLevels = [];
      $categories = [];
      $booths = [];
      while (($row = fgetcsv($file, 10000, ",")) !== FALSE) {

        //assign vars to rows
        $firstName = $row[0];
        $lastName = $row[1];
        $schoolName = $row[2];
        $county = $row[3];
        $gender = $row[4];
        $projectNum = $row[5];
        $title = $row[6];
        $abstract = $row[7];
        $gradeLevel = $row[8];
        $category = $row[9];
        $cnId = $row[10];
        $boothNumber = $row[11];

        $existingSchool = false;
        foreach ($schools as $key => $value) {
          if ($key === $schoolName) {
            $existingSchool = true;
            break;
          }
        }
        if (!$existingSchool) {
          $schools["$schoolName"] = $county;
        }
      }

      fclose($file);
      
      //not sure where to put these
      $booth = "INSERT INTO Booth(Number) VALUES(?)";
      $count = "INSERT INTO County(CountyId, Name) VALUES(?, ?)";
      $school= "INSERT INTO School(SchoolId, Name, CountyId) VALUES (?, ?, ?)";
      $category = "INSERT INTO Category(CategoryId, Name) VALUES (?, ?)";
      $gradeLevel = "INSERT INTO GradeLevel(GradeLevelId, Name) VALUES (?, ?)";
      $project = "INSERT INTO Project(ProjectId, Number, Name, Abstract, BoothId, CourseNetworkingId, CategoryId) VALUES (?, ?, ?, ?, ?, ?, ?)";
      $student = "INSERT INTO Student(UserId, SchoolId, ProjectId, GradeLevelId) VALUES (?, ?, ?, ?)";
      
      echo "CSV File has been successfully Imported.";
  };
}



