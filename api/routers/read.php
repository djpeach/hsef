<?php

function readRouter($app) {
  return function() use ($app) {
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
    $app->get('/booth', function() use ($app) {
      echo 'Read booth';
    });
    $app->get('/gradeLevel', function() use ($app) {
      echo 'Read gradeLevel';
    });
  };
}