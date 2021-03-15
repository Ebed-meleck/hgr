<?php
require "../model/db.php";

use PHPMailer\PHPMailer\PHPMailer;



if (isset($_POST['submit'])) {
  $errors = [];
  if (empty($_POST['valid'])) {
    $errors['valid'] = "Veuillez inscrire le code";
  } else {
    $bdd = db_connect();
    $db = $bdd->prepare("SELECT * FROM users WHERE validat_code ");
    $db->execute([$_POST['valid']]);
    $user = $db->fetch();
    if ($user['validat_code'] === $_POST['valid']) {
      $dbb = db_connect();
      $pdo = $dbb->prepare("UPDATE FROM users SET validat_code = NULL, create_date = NOW() WHERE id = $user[id] ");

      require "../vendor/autoload.php";
      $mail = new PHPMailer(true);
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'ebedmeleckmakoso@gmail.com';                 // SMTP username
      $mail->Password = '032rebecca';                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;
      //Recipients
      $mail->setFrom('hopital@hgr.com', 'Hgr');
      $mail->addAddress($user['email'], $user['nom']);
      //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Confirmation du compte';
      $mail->Body    =  "Votre compte a été valider avec success";
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
      $_SESSION['flash']['success'] = "Votre compte a été valider .";
      $_SESSION['auth'] = $user;
      header('Location: ../view/account.php');
      die();
    } else {
      $_SESSION['flash']['errors'] = "ce code est incorrect ";
    }
  }
}
