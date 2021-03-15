<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


//Load composer's autoloader
require '../vendor/autoload.php';


if ($_POST) {
  $name = htmlspecialchars($_POST['nom']);
  $last_name = htmlspecialchars($_POST['post_nom']);
  $user_name =  htmlspecialchars($_POST['username']);
  $tel = htmlspecialchars($_POST['tel']);
  $adress = htmlspecialchars($_POST['email']);
  $title = htmlspecialchars($_POST['title']);
  if (empty($errors)) {
    $bdd = db_connect();
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $code_validat = random_int(100000, 999999);
    $db = $bdd->prepare("INSERT INTO users(nom, post_nom, username, telephone, email, title, pass, validat_code, create_date)
  VALUES('$name', '$last_name', '$user_name','$tel', '$adress', '$title', '$pass', '$code_validat', NULL) ") or die(print_r($db->errorInfo()));
    $db->execute(array($name, $last_name, $user_name, $tel, $adress, $title, $pass, $code_validat));
    $user_id = $bdd->lastInsertId();
    $_SESSION['id'] = $user_id;
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
      $mail->Port = 587;
      //Recipients
      $mail->setFrom('hopital@hgr.com', 'Hgr');
      $mail->addAddress($adress, $name);     // Add a recipient
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
      $mail->Body    =  "Voici votre code de validation \n\n <mark>$code_validat</mark> \n\n Veuillez le saisir pour valider votre compte";
      //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      echo 'Message has been sent';
    } catch (Exception $e) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
    $_SESSION['flash']['success'] = "Un code de validation vous a été envoyer.";
    header("Location: ../view/validate.php");
    die();
  }
}
