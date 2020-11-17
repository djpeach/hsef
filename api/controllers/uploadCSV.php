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
        $firstName = $row[0];
        $lastName = $row[1];
        $schoolName = $row[2];
        $county = $row[3];

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

      echo "CSV File has been successfully Imported.";
  };
}



