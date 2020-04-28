<?php
require "../model/db.php";
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$user_id = $_GET['id'];
$token = $_GET['token'];

$db = db_connect();
$req = $db->prepare('SELECT confirm_token FROM  users WHERE id = ?');
$req->execute(array($user_id));
$user = $req->fetch();

if ($user && $user_id->confirm_token == $token) {
  $db = db_connect();
  $requte = $db->prepare("UPDATE users SET confirm_token =  NULL, create_date = NOW() WHERE id = ? ");
  $requete->execute(array($user));
  $_SESSION['flash']['success'] = "Votre compte est validé";
  $_SESSION['auth'] = $user;
  header('Location: ../view/account.php ');
} else {
  $_SESSION['flash']['danger'] = "Ce token n'est pas valide";
  header('Locatio: ./view/register.php');
}
