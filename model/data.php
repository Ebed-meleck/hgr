<?php
session_start();

if ($_POST) {
  $name = htmlspecialchars($_POST['nom']);
  $last_name = htmlspecialchars($_POST['post_nom']);
  $user_name =  htmlspecialchars($_POST['username']);
  $tel = htmlspecialchars($_POST['tel']);
  $adress = htmlspecialchars($_POST['email']);
  $title = htmlspecialchars($_POST['title']);
  if (empty($errors)) {
    $bdd = db_connect();
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $token = regenerate(60);
    $db = $bdd->prepare("INSERT INTO users(nom, post_nom, username, telephone, email, title, pass, confirm_token, create_date)
  VALUES('$name', '$last_name', '$user_name','$tel', '$adress', '$title', '$pass', '$token', NULL) ") or die(print_r($db->errorInfo()));
    $db->execute(array($name, $last_name, $user_name, $tel, $adress, $title, $pass, $token));
    $user_id = $bdd->lastInsertId();
    mail($adress, 'Confirmation du compte', "Afin de valider votre compte veuillez le confirme en cliquant sur ce lien\n\n\ http://localhost/hopital/view/confirm.php?id=$user_id&token=$token");
    $_SESSION['flash']['success'] = "Un email de confirmation vous a été envoyer par votre adress email";
    header("Location: ../view/login.php");
    die();
  }
}
