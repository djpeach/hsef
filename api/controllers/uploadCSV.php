<?php

function uploadCSV(Slim\Slim $app) {
  return function() use ($app) {
      $tmp_loc = $_FILES['csv']['tmp_name'];
      $file = fopen($tmp_loc, "r");
      $students = [];
      $schools = [];
      $users = [];
      $students = [];
      $counties = [];
      $projects = [];
      $gradeLevels = [];
      $categories = [];
      $booths = [];
      $firstRow = true;
      while (($row = fgetcsv($file, 10000, ",")) !== FALSE) {
        if ($firstRow) {
          $firstRow = false;
          continue;
        }

        // student + school + user + project + gradeLevel

        // project + category + booth
        $projNum = $row[5];
        $projTitle = $row[6];
        $projAbstract = $row[7];
        $cnid = $row[10];

        // user
        $firstName = $row[0];
        $lastName = $row[1];
        $gender = $row[4];

        // school + county
        $schoolName = $row[2];

        // gradeLevel
        $gradeLvl = $row[8];

        // category
        $catName = $row[9];

        // booth
        $boothNum = $row[11];

        // county
        $county = $row[3];

        $sql = DB::get()->prepare("REPLACE INTO Booth(Number) VALUES (?)");
        $sql->execute([$boothNum]);
        $boothId = DB::get()->lastInsertId();

        $sql = DB::get()->prepare("REPLACE INTO Category(Name) VALUES (?)");
        $sql->execute([$catName]);
        $categoryId = DB::get()->lastInsertId();

        $sql = DB::get()->prepare("REPLACE INTO GradeLevel(Name) VALUES (?)");
        $sql->execute([$gradeLvl]);
        $gradeLevelId = DB::get()->lastInsertId();

        $sql = DB::get()->prepare("REPLACE INTO County(Name) VALUES (?)");
        $sql->execute([$county]);
        $countyId = DB::get()->lastInsertId();

        $sql = DB::get()->prepare("REPLACE INTO School(Name, CountyId) VALUES (?, ?)");
        $sql->execute([$schoolName, $countyId]);
        $schoolId = DB::get()->lastInsertId();

        $sql = DB::get()->prepare("SELECT * FROM User WHERE FirstName = ? AND LastName = ? AND Gender = ?");
        $sql->execute([$firstName, $lastName, $gender]);
        $user = $sql->fetch();
        $userId = null;

        if ($user) {
          $userId = $user["UserId"];
        } else {
          $sql = DB::get()->prepare("REPLACE INTO User(FirstName, LastName, Gender) VALUES (?, ?, ?)");
          $sql->execute([$firstName, $lastName, $gender]);
          $userId = DB::get()->lastInsertId();
        }

        $sql = DB::get()->prepare("REPLACE INTO UserYear(Year, UserId) VALUES (YEAR(CURRENT_TIMESTAMP), ?)");
        $sql->execute([$userId]);
        $userYearId = DB::get()->lastInsertId();

        $sql = DB::get()->prepare("REPLACE INTO Project(Number, Name, Abstract, BoothId, CourseNetworkingId, CategoryId) 
                                                VALUES (?, ?, ?, ?, ?, ?)");
        $sql->execute([$projNum, $projTitle, $projAbstract, $boothId, $cnid, $categoryId]);
        $projectId = DB::get()->lastInsertId();

        $sql = DB::get()->prepare("REPLACE INTO Student(SchoolId, UserId, ProjectId, GradeLevelId) VALUES (?, ?, ?, ?)");
        $sql->execute([$schoolId, $userId, $projectId, $gradeLevelId]);
        $projectId = DB::get()->lastInsertId();

      }

      fclose($file);

      $data = [
        "users" => $users,
        "students" => $students,
        "counties" => $counties,
        "projects" => $projects,
        "gradeLevels" => $gradeLevels,
        "categories" => $categories,
        "booths" => $booths,
      ];

      $app->res->json([]);
  };
}



