<?php

/**
 * @param string $str a string in PHP_VAR format
 * @return string a string in camelCaseFormat
 */
function strtocamel($str) {
  $res = strtolower($str);
  preg_match_all('/_[a-z]/', $res, $_UppercasePairs);
  foreach ($_UppercasePairs[0] as $_UppercasePair) {
    $res = str_replace($_UppercasePair, strtoupper($_UppercasePair[1]), $res);
  }
  return $res;
}

/**
 * @param string $camel a camelCase string to turn to legible string
 * @return string a string meant for display, all words capitalized
 */
function cameltostr($camel) {
  $res = $camel;
  preg_match_all('/[A-Z]/', $res, $UppercaseLetters);
  foreach ($UppercaseLetters[0] as $UppercaseLetter) {
    $res = str_replace($UppercaseLetter, ' '.$UppercaseLetter, $res);
  }
  return ucfirst($res);
}

/**
 * @param string $page name of the file in /pages to load
 * @param array $params eg [["uid", "12"], ["newUser", "false"]]
 */
function redirect($page, $params=array()) {
  $route = '?page='.$page;
  foreach ($params as $param) {
    $route .= "&$param[0]=$param[1]";
  }
  echo "<script> location.href = '/hsef/".$route."'; </script>";
}

/**
 * Pretty prints some data in php format
 * @param $data
 */
function prettyPrint($data) {
  echo json_encode($data).'<br>';
}