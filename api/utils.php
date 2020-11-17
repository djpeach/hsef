<?php

function valueOrDefault($el, $default = null) {
	if (isset($el)) {
		if (is_string($el) && $el === "") {
			return $default;
		}
		return $el;
	}
	return $default;
}

function funcOrDefault($el, $func, $default = null) {
  if (isset($param)) {
    if (is_string($param) && $param === "") {
      return $default;
    }
    return $func($el);
  }
  return $default;
}

function valueOrError($el, $err) {
  if (isset($el)) {
    if (is_string($el) && $el === "") {
      throw $err;
    }
    return $el;
  }
  throw $err;
}

function valueOrNull($el) {
  return valueOrDefault($el);
}

function funcOrNull($el, $func) {
  return funcOrDefault($el, $func);
}

function execOrError($exec, $err) {
  if (!$exec) {
    throw $err;
  }
}

function filterNullCamelCaseKeys($el) {
  if (!$el) {
    return null;
  }
  foreach ($el as $key => $value) {
    unset($el[$key]);
    if ($value !== null) {
      $el[lcfirst($key)] = $value;
    }
  }
  return $el;
}

function generateRandomString($length = 10) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}