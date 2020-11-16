<?php

class ApiException extends ErrorException {
  public $data = [];

  public function __construct($message = "", $code = 500, $severity = 1, $filename = __FILE__, $lineno = __LINE__, $previous = null) {
    parent::__construct($message, $code, $severity, $filename, $lineno, $previous);
    $this->data = [
      "code" => $code,
      "error" => get_class($this),
      "message" => $message,
    ];
  }
}

class DatabaseError extends ApiException {
  public function __construct($message = "Database Failed to connect", $code = 502, $severity = 1, $filename = __FILE__, $lineno = __LINE__, $previous = null) {
    parent::__construct($message, $code, $severity, $filename, $lineno, $previous);
  }
}

class ResourceNotFound extends ApiException {
  public function __construct($message = "Could not find resource", $code = 404, $severity = 1, $filename = __FILE__, $lineno = __LINE__, $previous = null) {
    parent::__construct($message, $code, $severity, $filename, $lineno, $previous);
  }
}

class UserNotFound extends ApiException {
  public function __construct($message = "A user with that id could not be found", $code = 404, $severity = 1, $filename = __FILE__, $lineno = __LINE__, $previous = null) {
    parent::__construct($message, $code, $severity, $filename, $lineno, $previous);
  }
}

class BadRequest extends ApiException {
  public function __construct($message = "The request was poorly formed", $code = 400, $severity = 1, $filename = __FILE__, $lineno = __LINE__, $previous = null) {
    parent::__construct($message, $code, $severity, $filename, $lineno, $previous);
  }
}

class ResourceConflict extends ApiException {
  public function __construct($message = "That resource already exists", $code = 409, $severity = 1, $filename = __FILE__, $lineno = __LINE__, $previous = null) {
    parent::__construct($message, $code, $severity, $filename, $lineno, $previous);
  }
}

