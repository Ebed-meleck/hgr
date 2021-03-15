<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../model/db.php";

$code_validat = random_int(100000, 999999);
$bdd = db_connect();
$db = $bdd->prepare("UPDATE users SET validat_code = $code_validat WHERE id = $user_id");
$db->execute([$code_validat]);


//send email
$user_id = $_GET['id'];
$bdd = db_connect();
$db = $bdd->prepare("SELECT * FROM users WHERE id = $user_id ");
$db->execute([$user_id]);
$user = $db->fetch();

require "../vendor/autoload.php";


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
  //Server settings
  //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = 'ebedmeleckmakoso@gmail.com';                 // SMTP username
  $mail->Password = '032rebecca';                           // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;                                    // TCP port to connect to

  //Recipients
  $mail->setFrom('hopital@hgr.com', 'Hgr');
  $mail->addAddress($user['email'], $user['nom']);     // Add a recipient
  //$mail->addAddress('ellen@example.com');               // Name is optional
  //$mail->addReplyTo($adress, '');
  //$mail->addCC('cc@example.com');
  //$mail->addBCC('bcc@example.com');

  //Attachments
  //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

  //Content
  $mail->isHTML(true);                                  // Set email format to HTML
  $mail->Subject = 'Confirmation du compte';
  $mail->Body    =  "Voici votre code de validation \n\n " . "<mark>$user[validate_code].</mark>" . " \n\n Veuillez le saisir pour valider votre compte";
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
} catch (Exception $e) {
  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
}
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$_SESSION['flash']['success'] = "Nous avons renvoyer le code à votre email inscrit.";
header('Location: ../view/validate.php');
die();
