<?php

namespace Phrame;

require 'iResponse.php';

class Response implements iResponse {

  public function send($body) {
    echo $body;
  }

  public function json($body) {
    header('Content-Type: application/json');
    echo json_encode($body, JSON_PRETTY_PRINT);
  }
}