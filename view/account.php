<?php
require "../model/db.php";
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/vendors/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="../public/vendors/bootstrap.min.css">
  <link rel="stylesheet" href="../public/css/style.css">
  <title>Compte</title>
</head>


<?php require "header.php" ?>

<div id="page">
  <div id="sidebar">
    <div class="info">
      <!--
      <div class="dashboard">
        <h5><a href="account.php"><i class="fas fa-tachometer-alt"></i>Tableau de bord</a></h5>
      </div>
--->
      <div class="title-info">
        <i class="fas fa-info-circle"></i>
        <h6>Information d'utlisateur</h6>
      </div>
      <div class="info-user">
        <i class="fas fa-user"></i>
        <?php if (isset($_SESSION['auth'])) : ?>
          <p><?= $_SESSION['auth']['title'] . ' ' . $_SESSION['auth']['nom'] . ' ' . $_SESSION['auth']['post_nom'] ?></p>
        <?php endif ?>
      </div>
    </div>
    <div class="space-content">
      <div class="title-info">
        <i class="fas fa-file-medical"></i>
        <h6>Créer un dossier</h6>
      </div>
      <div class="new-patient">
        <p>
          <i class="fas fa-file-medical-alt"></i>
          <a id="fiche" href="fiche.php">Fiche médical </a> </p>
      </div>
    </div>
    <div class="docteur">
      <div class="title-info">
        <i class="fas fa-user-md"></i>
        <h6>Médecin</h6>
      </div>
      <div class="link">
        <ul>
          <li><a id="consult" href="consult.php"><i class="fas fa-stethoscope"></i>Consultation</a></li>
          <li><a href=""></a></li>
        </ul>
      </div>
    </div>
    <div class="more">
      <div class="title-info">
        <h6>Autres</h6>
      </div>
      <div class="link">
        <ul>
          <li><a id="report" href="report.php"><i class="fas fa-notes-medical"></i>Rapports</a></li>
          <li><a id="bilan" href="bilan.php"><i class="far fa-clipboard"></i>Bilan</a></li>
          <li><a id="search" href="search.php"><i class="fas fa-search"></i>Recherche</a></li>
          <li><a id="setting" href="setting.php"><i class="fas fa-cog"></i>Paramètre</a></li>
        </ul>
      </div>
      <div class="version">
        <p>Version de l'application : 1.0.0.0</p>
        <p>&copyCopyright Mai 2020</p>
      </div>
    </div>
  </div>
  <div id="main-content">
    <div class="main-content">
      <?php if (isset($_SESSION['flash'])) : ?>
        <?php foreach ($_SESSION['flash'] as $key => $message) : ?>
          <div class="flash-<?= $key ?> ">
            <?= $message ?>
          </div>
        <?php endforeach ?>
      <?php endif ?>
      <?php unset($_SESSION['flash']) ?>
    </div>

  </div>
</div>
<footer>
  <p class="foot">Réaliser par Groupe Mak</p>
</footer>
<script src="../public/vendors/jquery-3.5.0.min.js"></script>
<script src="../public/js/account.js"></script>
<script src="../public/js/fiche.js"></script>
</body>

</html>