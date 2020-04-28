<?php

/**
 * Cet exemple montre les paramètres à utiliser lors de l'envoi via les serveurs Gmail de Google.
 * Ceci utilise l'authentification traditionnelle par identifiant et mot de passe - regardez le gmail_xoauth.phps
 * exemple pour voir comment utiliser XOAUTH2.
 * La section IMAP montre comment enregistrer ce message dans le dossier «Courrier envoyé» à l'aide des commandes IMAP.
 */

//Importez des classes PHPMailer dans l'espace de noms global
use  PHPMailer\PHPMailer\PHPMailer;
use  PHPMailer\PHPMailer\SMTP;

require  '../vendor/autoload.php';

// Créer une nouvelle instance de PHPMailer
$mail = new  PHPMailer;

// Dites à PHPMailer d'utiliser SMTP
$mail->isSMTP();

// Activer le débogage SMTP
//SMTP::DEBUG_OFF =  off('pour une utilisation en production');
// SMTP::DEBUG_CLIENT 
// SMTP :: DEBUG_SERVER = messages client et serveur
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;

// Définit le nom d'hôte du serveur de messagerie
$mail->Host = 'smtp.gmail.com';
// utilisation
// $ mail-> Host = gethostbyname ('smtp.gmail.com');
// si votre réseau ne prend pas en charge SMTP sur IPv6

// Définir le numéro de port SMTP - 587 pour TLS authentifié, alias soumission SMC RFC4409
$mail->Port = 587;

// Définissez le mécanisme de cryptage à utiliser - STARTTLS ou SMTPS
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

// Utiliser ou non l'authentification SMTP
$mail->SMTPAuth = true;

// Nom d'utilisateur à utiliser pour l'authentification SMTP - utilisez l'adresse e-mail complète pour gmail
$mail->Username = 'ebedmeleckmakoso@gmail.com';

// Mot de passe à utiliser pour l'authentification SMTP
$mail->Password = '032rebecca';

// Définit de qui le message doit être envoyé
$mail->setFrom('ebedmeleckmakoso@gmail.com', 'jenny');

// Définir une autre adresse de réponse
//$mail->addRhnessTo('ebedmeleckmakoso@gmail.com', 'First Last');

// Définir à qui le message doit être envoyé
$mail->addAddress('emeleck@icloud.com', 'John Doe');

// Définissez la ligne d'objet
$mail->Subject = 'PHPMailer GMail SMTP test';

// Lire un corps de message HTML à partir d'un fichier externe, convertir des images référencées en images incorporées,
// convertit HTML en un corps alternatif de base en texte brut
$mail->msgHTML(file_get_contents('../view/text.html'), __DIR__);

// Remplace le corps de texte brut par un corps créé manuellement
$mail->AltBody = 'salut toi tu sais, je t\'aime';

// Joindre un fichier image
//$mail->addAttachment('images / phpmailer_mini.png');

// envoie le message, vérifie les erreurs
if (!$mail->send()) {
  echo  'Mailer Error:' . $mail->ErrorInfo;
} else {
  echo  'Message envoyé!';
  // Section 2: IMAP
  // Décommentez-les pour enregistrer votre message dans le dossier 'Mail envoyé'.
  if (save_mail($mail)) {
    echo "Message enregistré!";
  }
}

// Section 2: IMAP
// Les commandes IMAP nécessitent l'extension PHP IMAP, disponible sur: https://php.net/manual/en/imap.setup.php
// Fonction à appeler qui utilise les fonctions PHP imap _ * () pour enregistrer les messages: https://php.net/manual/en/book.imap.php
// Vous pouvez utiliser imap_getmailboxes ($ imapStream, '/ imap / ssl', '*') pour obtenir une liste des dossiers ou étiquettes disponibles, cela peut
// être utile si vous essayez de le faire fonctionner sur un serveur IMAP non Gmail.
function  save_mail($mail)
{
  // Vous pouvez remplacer "Courrier envoyé" par n'importe quel autre dossier ou tag
  $path = '{imap.gmail.com:993/imap/ssl}}Gmail[/Sent Mail';

  // Dites à votre serveur d'ouvrir une connexion IMAP en utilisant le même nom d'utilisateur et mot de passe que vous avez utilisé pour SMTP
  $imapStream = imap_open($path, $mail->Username, $mail->Password);

  $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
  imap_close($imapStream);

  return  $result;
}
