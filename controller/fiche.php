<?php
require "../model/db.php";
function is_Ajax()
{
  return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && (strtolower(getenv('HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest'));
}

if (isset($_POST['send'])) {
  $errors = [];

  if (empty($_POST['patient_name'])) {
    $errors['patient_name'] = "Veuillez remplir le champ nom";
  }
  if (empty($_POST['post_nom'])) {
    $errors['post_nom'] = "Veuillez remplir le champ post-nom";
  }
  if (empty($_POST['date'])) {
    $errors['date'] = "Veuillez selectionner le champ";
  }
  if (empty($_POST['lieu'])) {
    $errors['lieu'] = "Veuillez remplir le champ lieu";
  }
  if (empty($_POST['sexe'])) {
    $errors['sexe'] = "Veuillez selectionner le sexe ";
  }
  if (empty($_post['tempete'])) {
    $errors['tempete'] = "Veuillez prelèver la température";
  }
  if (empty($_POST['tension'])) {
    $errors['tension'] =  "Veuillez prelèver la tension de la patient ";
  }
  if (empty($_POST['pulsation'])) {
    $errors['pulsation'] = "Veuillez prelèver la pulsation";
  }
}


if (!empty($errors)) {
  echo json_encode($errors);
  header('Content-Type', 'application/json');
  http_response_code(400);
  die();

  $_SESSION['flash']['errors'] = $errors;
  header('Location: ../view/account.php');
  die();
} else {
  //inserer mes données dans la bdd et regeneré un numéro de dossier

  $name = htmlspecialchars(ucfirst($_POST['patient_name']));
  $post_name = htmlspecialchars(ucfirst($_POST['post_nom']));
  $date = $_POST['date'];
  $lieu = htmlspecialchars($_POST['lieu']);
  $sexe = $_POST['sexe'];
  $temperature = htmlspecialchars($_POST['tempete']);
  $tension = htmlspecialchars($_POST['tension']);
  $pulsation = htmlspecialchars($_POST['pulsation']);
  $db = db_connect();
  $bdd = $db->prepare("INSERT INTO patient (nom, post_nom, date_ajout,lieu, sexe, temperature, Tension_artérielle, pulsation) VALUES 
  ('$name', '$post_name', '$date', '$lieu', '$sexe','$temperature', '$tension', '$pulsation')");
  $bdd->execute([$name, $post_name, $date, $lieu, $sexe, $temperature, $tension, $tension, $pulsation]);
  $patient_id = $db->lastInsertId();
}
