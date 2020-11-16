<?php

foreach(glob(__DIR__."/../controllers/*.php") as $file) {
  require_once $file;
}

function authRouter($app) {
  return function() use ($app) {
    $app->post('/login', loginWithEmailPassword($app));

    $app->post('/logout', logout($app));
  };
}