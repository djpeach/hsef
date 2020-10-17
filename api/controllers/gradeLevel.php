<?php

function createNewGradeLevel($app) {
  return function() use ($app) {
    echo "Created new grade level";
  };
}