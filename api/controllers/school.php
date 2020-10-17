<?php

function createNewSchool($app) {
  return function() use ($app) {
    echo "Created new school";
  };
}