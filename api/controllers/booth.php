<?php

function createNewBooth($app) {
  return function() use ($app) {
    echo "Created new booth";
  };
}