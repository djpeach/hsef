<?php

function uploadCSV(Slim\Slim $app) {
  return function() use ($app) {
      $tmp_loc = $_FILES['csv']['tmp_name'];
        $file = fopen($tmp_loc, "r");
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
            // use $emapData[index] to insert data
        }
        fclose($file);
  };
}