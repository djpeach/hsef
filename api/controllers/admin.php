<?php

function createNewAdmin($app) {
  return function() use ($app) {
    echo "Created new user and operator with admin entitlement";
  };
}

function createAdminFromExisting($app) {
  return function() use ($app) {
    echo "Added admin entitlement to existing user";
  };
}