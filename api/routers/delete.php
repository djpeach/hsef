<?php

function deleteRouter($app) {
  return function() use ($app) {
    $app->delete('/admins', function() use ($app) {
      echo 'Delete admin';
    });
    $app->delete('/judges', function() use ($app) {
      echo 'Delete judge';
    });
    $app->delete('/students', function() use ($app) {
      echo 'Delete student';
    });
    $app->delete('/schools', function() use ($app) {
      echo 'Delete school';
    });
    $app->delete('/counties', function() use ($app) {
      echo 'Delete county';
    });
    $app->delete('/projects', function() use ($app) {
      echo 'Delete project';
    });
    $app->delete('/categories', function() use ($app) {
      echo 'Delete category';
    });
    $app->delete('/booths', function() use ($app) {
      echo 'Delete booth';
    });
    $app->delete('/gradeLevels', function() use ($app) {
      echo 'Delete gradeLevel';
    });
  };
}