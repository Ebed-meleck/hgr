<?php
require "../model/db.php";
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/vendors/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="../public/vendors/bootstrap.min.css">
  <link rel="stylesheet" href="../public/css/style.css">
  <title>Compte</title>
</head>

<body>

  <?php require "header.php" ?>


  <div id="page">
    <div id="space">
      <div class="space_profile">
        <div class="icone-file">
          <p>Nom</p>
        </div>
        <div class="info-user">
          <p> </p>
        </div>
      </div>
      <div class="space_containt">
        <p><a href="">Fiche médical</a></p>
        spl_autoload_functionssu/*
      </div>
    </div>

  </div>
  <script src="../public/js/space.js"></script>
</body>

</html>