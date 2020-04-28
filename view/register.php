<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../public/vendors/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="../public/vendors/bootstrap.min.css">
  <link rel="stylesheet" href="../public/css/style.css">
  <title>Enregistrement</title>
</head>

<body>
  <div id="cntnt">
    <?php require "../controller/frontend.php"; ?>
    <div class="to-up">
      <div class="contnt">
        <div class="logo">
          <img src="../public/images/logo.png" alt="">
        </div>
        <div class="message">
          <p>Bienvenue dans l'interface de gestion de l'hôpital recerver aux personnels médicaux veuillez-vous enregistrer. Où <a href="./login.php">se connecter</a></p>
        </div>
      </div>
    </div>
    <?php if (!empty($errors)) : ?>
      <div class="alert-alert-danger">
        <?php foreach ($errors as $cle => $error) : ?>
          <?= " <li> $error </li>" ?>
        <?php endforeach; ?>
      </div>
    <?php endif ?>
    <?php //debug($token);
    ?>

    <div class="register">
      <h2 class="li">Enregistrement</h2>
      <form action="" method="post" id="form">
        <input type="text" name="nom" placeholder="Nom" id="nom"> <input type="text" name="post_nom" placeholder="Post-nom" id=""><br>
        <input type="text" name="username" id="post_nom" size="35" placeholder="Nom d'utilisateur(robert25)">
        <input type="tel" name="tel" size="35" id="tel" placeholder="Téléphone">
        <input type="email" name="email" size="35" id="adress" placeholder="Adress électronique"><br>
        <select id="inputState" id="state" name="title">
          <option selected disabled>Quel est votre titre ?</option>
          <option>Médecin</option>
          <option>Infimièr(e)</option>
        </select><br>
        <input type="password" name="password" id="pass" placeholder="Mot de passe" size="17"><input type="password" name="pass_confirm" id="ps" placeholder="Confirmé votre mot de passe" size="27">
        <div class="btn"><button type="submit" name="soumettre" class="btn btn-primary">Soumettre</button></div>
      </form>
      <script type="text/javascript" src="../public/js/form.js"></script>
    </div>
</body>

</html>