<?php

function createNewProject($app) {
  return function() use ($app) {
    echo "Created new project";
  };
}