<?php

// CREATE
function createNewCounty(Slim\Slim $app) {
  return function() use ($app) {
    echo "Created new county";
  };
}

// READ
function getCountyById(Slim\Slim $app) {
  return function() use ($app) {
    echo "Got county by id";
  };
}

// UPDATE
function updateCountyById(Slim\Slim $app) {
  return function() use ($app) {
    echo "updated county";
  };
}

// DELETE
function deleteCountyById(Slim\Slim $app) {
  return function() use ($app) {
    echo "deleted county";
  };
}

// LIST
function listCounties(Slim\Slim $app) {
  return function() use ($app) {
    echo "got counties";
  };
}