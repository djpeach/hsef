<?php

// CREATE
function createNewGradeLevel(Slim\Slim $app) {
  return function() use ($app) {
    echo "Created new gradeLevel";
  };
}

// READ
function getGradeLevelById(Slim\Slim $app) {
  return function() use ($app) {
    echo "Got gradeLevel by id";
  };
}

// UPDATE
function updateGradeLevelById(Slim\Slim $app) {
  return function() use ($app) {
    echo "updated gradeLevel";
  };
}

// DELETE
function deleteGradeLevelById(Slim\Slim $app) {
  return function() use ($app) {
    echo "deleted gradeLevel";
  };
}

// LIST
function listGradeLevels(Slim\Slim $app) {
  return function() use ($app) {
    echo "got gradeLevels";
  };
}