<?php

function readRouter($app) {
  return function() use ($app) {
    $app->group('/individual', function() use ($app) {
      $app->get('/admin', function() use ($app) {
        echo 'Read admin';
      });
      $app->get('/judge', function() use ($app) {
        echo 'Read judge';
      });
      $app->get('/student', function() use ($app) {
        echo 'Read student';
      });
      $app->get('/school', function() use ($app) {
        echo 'Read school';
      });
      $app->get('/county', function() use ($app) {
        echo 'Read county';
      });
      $app->get('/project', function() use ($app) {
        echo 'Read project';
      });
      $app->get('/category', function() use ($app) {
        echo 'Read category';
      });
      $app->get('/ranking', function() use ($app) {
        echo 'Read ranking';
      });
      $app->get('/booth', function() use ($app) {
        echo 'Read booth';
      });
      $app->get('/gradeLevel', function() use ($app) {
        echo 'Read gradeLevel';
      });
    });
    $app->group('/bulk', function() use ($app) {
      $app->get('/admin', function() use ($app) {
        echo 'Read admins';
      });
      $app->get('/judge', function() use ($app) {
        echo 'Read judges';
      });
      $app->get('/student', function() use ($app) {
        echo 'Read students';
      });
      $app->get('/school', function() use ($app) {
        echo 'Read schools';
      });
      $app->get('/county', function() use ($app) {
        echo 'Read countys';
      });
      $app->get('/project', function() use ($app) {
        echo 'Read projects';
      });
      $app->get('/category', function() use ($app) {
        echo 'Read categorys';
      });
      $app->get('/ranking', function() use ($app) {
        echo 'Read rankings';
      });
      $app->get('/booth', function() use ($app) {
        echo 'Read booths';
      });
      $app->get('/gradeLevel', function() use ($app) {
        echo 'Read gradeLevels';
      });
    });
  };
}