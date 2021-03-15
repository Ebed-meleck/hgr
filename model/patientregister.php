<?php
require "../controller/fiche.php";
if (isset($patient_id)) {
  $dossier = "HGR-MOANDA-D-0$patient_id";
  $db = db_connect();
  $bdd = $db->prepare("UPDATE FROM patient SET numberdossier ='$dossier' WHERE id_patient = '$patient_id'");
  $bdd->execute($dossier);
  echo json_encode($patient_id);
  header('Content-type', 'application/json');
  die();
}
