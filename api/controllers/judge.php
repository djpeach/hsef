<?php

function createNewJudge($app) {
  return function() use ($app) {
    echo "Created new user and operator with judge entitlement";
  };
}

function createJudgeFromExisting($app) {
  return function() use ($app) {
    echo "Added judge entitlement to existing user";
  };
}