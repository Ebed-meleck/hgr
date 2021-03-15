<?php if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>


<body>
  <header>
    <div class="head">
      <div class="img-img">
        <img src="../public/images/logo.png" alt="logo" id="flottant">
        <h2 class="title">Hgr-moanda</h2>
      </div>

      <div class="list_right">
        <?php if (isset($_SESSION['auth'])) : ?>
          <a href="../controller/logout.php"><button class="btn-primary"><i class="fas fa-sign-out-alt"></i></button></a>
        <?php endif; ?>
      </div>
    </div>
  </header>