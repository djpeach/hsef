<?php

// CREATE
function createNewSchool(Slim\Slim $app) {
  return function() use ($app) {
    echo "Created new school";
  };
}

// READ
function getSchoolById(Slim\Slim $app) {
  return function() use ($app) {
    echo "Got school by id";
  };
}

// UPDATE
function updateSchoolById(Slim\Slim $app) {
  return function() use ($app) {
    echo "updated school";
  };
}

// DELETE
function deleteSchoolById(Slim\Slim $app) {
  return function() use ($app) {
    echo "deleted school";
  };
}

// LIST
function listSchools(Slim\Slim $app) {
  return function() use ($app) {
    echo "got schools";
  };
}