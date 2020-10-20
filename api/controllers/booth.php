<?php

// CREATE
function createNewBooth(Slim\Slim $app) {
  return function() use ($app) {
    echo "Created new booth";
  };
}

// READ
function getBoothById(Slim\Slim $app) {
  return function() use ($app) {
    echo "Got booth by id";
  };
}

// UPDATE
function updateBoothById(Slim\Slim $app) {
  return function() use ($app) {
    echo "updated booth";
  };
}

// DELETE
function deleteBoothById(Slim\Slim $app) {
  return function() use ($app) {
    echo "deleted booth";
  };
}

// LIST
function listBooths(Slim\Slim $app) {
  return function() use ($app) {
    echo "got booths";
  };
}