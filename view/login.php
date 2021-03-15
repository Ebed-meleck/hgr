<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
require "../controller/connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../public/vendors/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="../public/vendors/bootstrap.min.css">
  <link rel="stylesheet" href="../public/css/style.css">
  <title>Se connecter</title>
</head>

<body>
  <div id="cntnt">
    <div class="contnt">
      <div class="logo">
        <img src="../public/images/logo.png" alt="logo">
      </div>
      <div class="message">
        <p>Bienvenue dans l'interface de gestion de l'hôpital recervez aux personnels médicaux veuillez-vous connecter. Où <a href="../view/register.php">créer un compte ici</a></p>
      </div>
    </div>

    <?php if (isset($_SESSION['flash'])) : ?>
      <?php foreach ($_SESSION['flash'] as $key => $message) : ?>
        <div class="flash-<?= $key ?>">
          <?= $message; ?>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
    <?php unset($_SESSION['flash']) ?>
    <div class="admin">
      <form id="form" method="post">
        <label for="user"><i class="fas fa-portrait"></i></label><input type="text" name="username" size="25" id="user" placeholder="Username ou adress email" autofocus><br>
        <label for="pass"><i class="fas fa-lock"></i></label><input type="password" name="password" size="25" id="pass" placeholder="Password" autofocus><br>
        <div class="suppl">
          <input type="checkbox" name="connect" id="session"><label for="session" class="check">Gardez ma session active</label>
          <p><a href="../view/forgot.php">Mot de passe oublié</a></p>
        </div>
        <div class="btn">
          <button type="submit" id="login" name="submit" class="btn-primary">Se connecter</button>
        </div>
      </form>
    </div>
  </div>
  <script src=""></script>
</body>

</html>