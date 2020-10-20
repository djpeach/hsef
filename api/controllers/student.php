<?php

// CREATE
function createNewStudent(Slim\Slim $app) {
  return function() use ($app) {
    echo "Created new student";
  };
}

// READ
function getStudentById(Slim\Slim $app) {
  return function() use ($app) {
    echo "Got student by id";
  };
}

// UPDATE
function updateStudentById(Slim\Slim $app) {
  return function() use ($app) {
    echo "updated student";
  };
}

// DELETE
function deleteStudentById(Slim\Slim $app) {
  return function() use ($app) {
    echo "deleted student";
  };
}

// LIST
function listStudents(Slim\Slim $app) {
  return function() use ($app) {
    echo "got students";
  };
}