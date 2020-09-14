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
  $session->exceptionMessage = "Error #$errno in $errfile, on line $errline. </br> $errstr";
  echo "<script> location.href = '/hsef/'; </script>";
});