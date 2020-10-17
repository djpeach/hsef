<?php

function deleteRouter($app) {
  return function() use ($app) {
    $app->group('/individual', function() use ($app) {
      $app->delete('/admin', function() use ($app) {
        echo 'Delete admin';
      });
      $app->delete('/judge', function() use ($app) {
        echo 'Delete judge';
      });
      $app->delete('/student', function() use ($app) {
        echo 'Delete student';
      });
      $app->delete('/school', function() use ($app) {
        echo 'Delete school';
      });
      $app->delete('/county', function() use ($app) {
        echo 'Delete county';
      });
      $app->delete('/project', function() use ($app) {
        echo 'Delete project';
      });
      $app->delete('/category', function() use ($app) {
        echo 'Delete category';
      });
      $app->delete('/ranking', function() use ($app) {
        echo 'Delete ranking';
      });
      $app->delete('/booth', function() use ($app) {
        echo 'Delete booth';
      });
      $app->delete('/gradeLevel', function() use ($app) {
        echo 'Delete gradeLevel';
      });
    });
  };
}