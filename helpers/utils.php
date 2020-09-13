<?php require_once $_SERVER['DOCUMENT_ROOT'].'/hsef/helpers/fallback.php'; ?>
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
 */
function redirect($page) {
  global $session;
  $session->page = $page;
  echo "<script> location.href = '/hsef/'; </script>";
}