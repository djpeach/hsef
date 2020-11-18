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
        $cnid = $row[10];

        // project + category + booth
        $projNum = $row[5];
        $projTitle = $row[6];
        $projAbstract = $row[7];

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

        $existingEntity = false;
        foreach ($booths as $booth) {
          if ($booth === $boothNum) {
            $existingEntity = true;
            break;
          }
        }
        if (!$existingEntity) {
          array_push($booths, $boothNum);
        }

        $existingEntity = false;
        foreach($categories as $cat) {
          if ($cat === $catName) {
            $existingEntity = true;
            break;
          }
        }
        if (!$existingEntity) {
          array_push($categories, $catName);
        }

        $existingEntity = false;
        foreach ($gradeLevels as $gl) {
          if ($gl === $gradeLvl) {
            $existingEntity = true;
            break;
          }
        }
        if (!$existingEntity) {
          array_push($gradeLevels, $gradeLvl);
        }

        $existingEntity = false;
        foreach ($counties as $c) {
          if ($c === $county) {
            $existingEntity = true;
            break;
          }
        }
        if (!$existingEntity) {
          array_push($counties, $county);
        }

        $existingEntity = false;
        foreach ($schools as $key => $value) {
          if ($key === $schoolName) {
            $existingEntity = true;
            break;
          }
        }
        if (!$existingEntity) {
          $schools["$schoolName"] = $county;
        }
      }

      $existingEntity = false;
      foreach ($users as $key => $value) {
        if ($key === $firstName." ".$lastName) {
          $existingEntity = true;
          break;
        }
      }
      if (!$existingEntity) {
        $users["$firstName $lastName"] = $gender;
      }

      $existingEntity = false;
      foreach ($projects as $key => $value) {
        if ($key === $projTitle) {
          $existingEntity = true;
          break;
        }
      }
      if (!$existingEntity) {
        $projects["$projTitle"] = [
          "number" => $projNum,
          "abstract" => $projAbstract,
          "category" => $catName,
          "booth" => $boothNum
        ];
      }

      $existingEntity = false;
      foreach ($students as $key => $value) {
        if ($key === $firstName." ".$lastName) {
          $existingEntity = true;
          break;
        }
      }
      if (!$existingEntity) {
        $students["$firstName $lastName"] = [
          "school" => $schoolName,
          "user" => "$firstName $lastName",
          "project" => $projTitle,
          "gradeLevel" => $gradeLvl,
          "cnid" => $cnid,
        ];
      }

      fclose($file);

      $app->res->json([
        "users" => $users,
        "students" => $students,
        "counties" => $counties,
        "projects" => $projects,
        "gradeLevels" => $gradeLevels,
        "categories" => $categories,
        "booths" => $booths,
      ]);
  };
}



