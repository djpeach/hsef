<?php

function updateRouter($app) {
  return function() use ($app) {
    $app->put('/admins', function() use ($app) {
      echo 'Update admin';
    });
    $app->put('/judges', function() use ($app) {
      echo 'Update judge';
    });
    $app->put('/students', function() use ($app) {
      echo 'Update student';
    });
    $app->put('/schools', function() use ($app) {
      echo 'Update school';
    });
    $app->put('/counties', function() use ($app) {
      echo 'Update county';
    });
    $app->put('/projects', function() use ($app) {
      echo 'Update project';
    });
    $app->put('/categories', function() use ($app) {
      echo 'Update category';
    });
    $app->put('/booths', function() use ($app) {
      echo 'Update booth';
    });
    $app->put('/gradeLevels', function() use ($app) {
      echo 'Update gradeLevel';
    });
  };
}