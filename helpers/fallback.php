<?php require_once $_SERVER['DOCUMENT_ROOT'].'/hsef/helpers/fallback.php'; ?>
<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/hsef/helpers/Session.php';

set_exception_handler(function ($e) {
  $session = new Session();
  $session->page = 'exception';
  $session->exceptionMessage = $e->getMessage();
  echo "<script> location.href = '/hsef/'; </script>";
});

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
  $session = new Session();
  $session->page = 'exception';
  $session->exceptionMessage = $errstr;
  echo "<script> location.href = '/hsef/'; </script>";
});

if (!isset($directAccessAttack)) {
  throw new Exception('This page cannot be directly accessed. This attempt has been reported.');
}