<?php

function createNewCounty($app) {
  return function() use ($app) {
    echo "Created new county";
  };
}