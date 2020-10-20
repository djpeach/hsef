<?php

// CREATE
function createNewCategory(Slim\Slim $app) {
  return function() use ($app) {
    echo "Created new category";
  };
}

// READ
function getCategoryById(Slim\Slim $app) {
  return function() use ($app) {
    echo "Got category by id";
  };
}

// UPDATE
function updateCategoryById(Slim\Slim $app) {
  return function() use ($app) {
    echo "updated category";
  };
}

// DELETE
function deleteCategoryById(Slim\Slim $app) {
  return function() use ($app) {
    echo "deleted category";
  };
}

// LIST
function listCategorys(Slim\Slim $app) {
  return function() use ($app) {
    echo "got categorys";
  };
}