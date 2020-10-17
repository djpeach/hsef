<?php

function updateRouter($app) {
  return function() use ($app) {
    $app->put('/admin', function() use ($app) {
      echo 'Update admin';
    });
    $app->put('/judge', function() use ($app) {
      echo 'Update judge';
    });
    $app->put('/student', function() use ($app) {
      echo 'Update student';
    });
    $app->put('/school', function() use ($app) {
      echo 'Update school';
    });
    $app->put('/county', function() use ($app) {
      echo 'Update county';
    });
    $app->put('/project', function() use ($app) {
      echo 'Update project';
    });
    $app->put('/category', function() use ($app) {
      echo 'Update category';
    });
    $app->put('/booth', function() use ($app) {
      echo 'Update booth';
    });
    $app->put('/gradeLevel', function() use ($app) {
      echo 'Update gradeLevel';
    });
  };
}