<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require "../model/db.php";

if (isset($_POST)) {

  if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $user_name = $_POST['username'];
    $bdd = db_connect();
    $db = $bdd->query("SELECT * FROM users  ");
    $user = $db->fetch();
    if ($user_name === $user['username'] or $user['email'] && password_verify($_POST['password'], $user['pass'])) {
      $_SESSION['auth'] = $user;
      $_SESSION['flash']['success'] = "Bienvenue dans l'interface";
      header('Location: ../view/account.php');
      die();
    } else {
      $_SESSION['flash']['errors'] = "L'identifiant ou le mot de passe est incorrect";
    }
  }
}
