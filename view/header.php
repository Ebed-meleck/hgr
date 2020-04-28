<?php if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
  <header>
    <div class="head">
      <div class="img-img">
        <img src="../public/images/logo.png" alt="logo" id="flottant">
        <h2>Hgr-moanda</h2>
      </div>

      <div class="list_right">
        <?php if (isset($_SESSION['auth'])) : ?>
          <li><a href="../controller/logout.php">Se déconnecter</a></li>
        <?php endif; ?>
      </div>
    </div>
  </header>