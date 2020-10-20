<?php

// CREATE
function createNewProject(Slim\Slim $app) {
  return function() use ($app) {
    echo "Created new project";
  };
}

// READ
function getProjectById(Slim\Slim $app) {
  return function() use ($app) {
    echo "Got project by id";
  };
}

// UPDATE
function updateProjectById(Slim\Slim $app) {
  return function() use ($app) {
    echo "updated project";
  };
}

// DELETE
function deleteProjectById(Slim\Slim $app) {
  return function() use ($app) {
    echo "deleted project";
  };
}

// LIST
function listProjects(Slim\Slim $app) {
  return function() use ($app) {
    echo "got projects";
  };
}