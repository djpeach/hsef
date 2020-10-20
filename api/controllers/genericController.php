<?php

// CREATE
function createNewXXX(Slim\Slim $app) {
  return function() use ($app) {
    echo "Created new xxx";
  };
}

// READ
function getXXXById(Slim\Slim $app) {
  return function() use ($app) {
    echo "Got xxx by id";
  };
}

// UPDATE
function updateXXXById(Slim\Slim $app) {
  return function() use ($app) {
    echo "updated xxx";
  };
}

// DELETE
function deleteXXXById(Slim\Slim $app) {
  return function() use ($app) {
    echo "deleted xxx";
  };
}

// LIST
function listXXXs(Slim\Slim $app) {
  return function() use ($app) {
    echo "got xxxs";
  };
}