<?php

function createNewStudent($app) {
  return function() use ($app) {
    echo "Created new user and student";
  };
}