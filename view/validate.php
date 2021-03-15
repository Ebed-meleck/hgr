<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require "../controller/validate.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/css/style.css">
  <link rel="stylesheet" href="../public/vendors/bootstrap.min.css">
  <title>Validation du compte</title>
</head>

<body>
  <div id="cntnt-validate">
    <div class="contnt">
      <div class="logo">
        <img src="../public/images/logo.png" alt="logo">
      </div>
      <div class="message">
        <p>Veuillez saisir le code qui vous a été envoyer par email en fin de valider votre compte.</p>
      </div>
    </div>
    <?php if (isset($_SESSION['flash'])) : ?>
      <?php foreach ($_SESSION['flash'] as $key => $message) : ?>
        <div class="flash-<?= $key ?>">
          <?= $message; ?>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
    <?php unset($_SESSION['flash'])
    ?>
    <div class="admin">
      <form method="post">
        <div class="validate">
          <input type="text" name="valid" id="valid" maxlength="6">
        </div>
        <div class="btn">
          <button type="submit" id="validate" name="submit" class="btn-primary">Envoyer</button>
        </div>
      </form>
    </div>
    <script src="../public/vendors/jquery-3.5.0.min.js"></script>
    <script src="../public/js/valid.js"></script>

</body>

</html>