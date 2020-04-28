<?php
//require "../vendor/autoload.php";

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

function db_connect()
{
  try {
    $db = new PDO('mysql:host=localhost;dbname=hopital;charset=utf8;', 'root', '');
    return $db;
  } catch (Exception $e) {
    die('Error : ' . $e->getMessage());
  }
}
function debug($variable)
{
  echo '<pre>' . print_r($variable, true) . '</pre>';
}


function regenerate($length)
{
  $alphanum = "abcdefghijklmnopqrstuvwxyz123456789ABCDEFGHIJKL1255";
  return  substr(str_shuffle(str_repeat($alphanum, $length)), 0, $length);
}
