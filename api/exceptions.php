<?php

class ApiException extends ErrorException {
  public $data = [];

  public function __construct($message = "", $code = 0, $severity = 1, $filename = __FILE__, $lineno = __LINE__, $previous = null) {
    parent::__construct($message, $code, $severity, $filename, $lineno, $previous);
    $this->data = [
      "message" => $message,
      "code" => $code,
      "severity" => $severity,
      "filename" => $filename,
      "lineno" => $lineno,
      "stackTrace" => $this->getTraceAsString()
    ];
  }
}

class UserNotFound extends ApiException {
  public function __construct($message = "A user with that id could not be found", $code = 404, $severity = 1, $filename = __FILE__, $lineno = __LINE__, $previous = null) {
    parent::__construct($message, $code, $severity, $filename, $lineno, $previous);
  }
}