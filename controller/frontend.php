<?php

require "../model/db.php";

// verify data input a user
$errors = [];
if (isset($_POST['soumettre'])) {



  if (empty($_POST['nom'])) {
    $errors['nom'] = "veuillez saisir votre nom";
  }
  if (empty($_POST['post_nom'])) {
    $errors['post_nom'] = "veuillez saisir votre prénom";
  }
  if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9]+$/', $_POST['username'])) {
    $errors['username'] = "veuillez saisir un nom d'utlisateur(alphanumérique)";
  } else {
    $db = db_connect();
    $req = $db->prepare("SELECT id FROM users WHERE username = ? ");
    $req->execute(array($_POST['username']));
    $user = $req->fetch();
    if ($user) {
      $errors['username'] = "Ce nom d'utilisateur est déjà pris";
    }
  }
  if (empty($_POST['tel']) || !filter_var($_POST['tel'], FILTER_VALIDATE_INT)) {
    $errors['tel'] = "veuillez saisir un numéro de téléphone";
  }
  if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "veuillez saisir un email valide";
  } else {
    $db = db_connect();
    $req = $db->prepare("SELECT id FROM users WHERE email = ? ");
    $req->execute(array($_POST['email']));
    $email = $req->fetch();
    if ($email) {
      $errors['email'] = "Cet adress email est déjà utiliser pour un autre compte";
    }
  }
  if (empty($_POST['title'])) {
    $errors['title'] = "veuillez choisr votre titre";
  }
  if (empty($_POST['password'])) {
    $errors['passwod'] = "Veuillez entre un mot de passe";
  }
  if (empty($_POST['pass_confirm']) || $_POST['pass_confirm'] !== $_POST['password']) {
    $errors['pass_confirm'] = "le mot de passe saisi ne sont pas identique";
  }
  require "../model/data.php";
}
