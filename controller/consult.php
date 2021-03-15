<?php
require "../model/db.php";
// function is ajax

function isAjax()
{
  return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && (strtolower(getenv('HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest'));
}

//traitement du formulaire de recherche


if (isset($_POST['search'])) {
  $error = [];
  if (!empty($_POST['data'])) {
    $search = htmlspecialchars($_POST['data']);
    $db = db_connect();
    $bdd = $db->prepare("SELECT * FROM patient WHERE nom = ? ");
    $bdd->execute([$search]);
    $patient = $bdd->fetch();
    if ($patient === $search) {
      if (isAjax()) {
        echo json_encode($patient);
        header('Content-Type', 'application/json');
        die();
      }
      $_SESSION['flash']['success'] = $patient;
      header('Location: ../view/account.php');
      die();
    }
  } else {
    $error['data'] = 'Aucun dossier correspond à ce numéro';
    echo json_encode($error);
    header('Content-Type', 'application/json');
    http_response_code(400);
    die();
    $_SESSION['flash']['errors'] = $error;
    header('Location: ../view/account/php');
    die();
  }
}
