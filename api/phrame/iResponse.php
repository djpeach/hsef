<?php

namespace Phrame;

interface iResponse {
  public function json($body);
  public function send($body);
}