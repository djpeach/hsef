<?php

// handlers take in the $app, which we need to denote as type Slim\Slim so the ide can provide code completion
function genericHandler(Slim\Slim $app) {
  // we return a function that will be used by Slim. It must take in any params in the url (/users/:urlParam1)
  return function($urlParam1, $urlParam3, $etc) use ($app) {
    // Initialize response and request parameters

    // Additional request parameter validation if needed

    // DB Logic (build response meanwhile if needed)

    // Finalize (build/transform/filter) response if needed

    // Send response
  };
}