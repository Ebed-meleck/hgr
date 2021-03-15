<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require "../model/db.php";

if (isset($_POST['submit'])) {
  if (!empty($_POST['username'] && !empty($_POST['password']))) {
    $username =  htmlspecialchars($_POST['username']);
    $db = db_connect();
    $req = $db->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $req->execute([$username, $username]);
    $data = $req->fetch();
    if ($data && password_verify($_POST['password'], $data['pass'])) {
      $_SESSION['auth'] = $data;
      $_SESSION['flash']['success'] = "Vous Ãªtes maintenant connectÃ©";
      header('Location: ../view/account.php');
      die();
    } else {
      $_SESSION['flash']['errors'] = "L'identifiant ou le mot de passe est incorrect ";
    }
  }
}