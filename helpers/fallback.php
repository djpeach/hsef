<?php require_once $_SERVER['DOCUMENT_ROOT'].'/helpers/fallback.php'; ?>
<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/helpers/Session.php';

set_exception_handler(function ($e) {
  $session = new Session();
  $session->page = 'exception';
  $session->exceptionMessage = $e->getMessage();
  echo "<script> location.href = '/'; </script>";
});

if (!isset($directAccessAttack)) {
  throw new Exception('This page cannot be directly accessed. This attempt has been reported.');
}