<?php

function createNewCategory($app) {
  return function() use ($app) {
    echo "Created new category";
  };
}