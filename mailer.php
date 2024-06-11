<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$smtpUsername = ""; // adres e-mail adresata
$smtpPassword = ""; // hasło do maila adresata
$emailFrom = ""; // adres e-mail adresata
$emailFromName = ""; // nazwa adresata
$emailTo = ""; // adres e-mail odbiorcy
$emailToName = ""; // imię adresata

$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->CharSet = "UTF-8";
$mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "host smtp"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = port; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is depracated
$mail->SMTPAuth = true;
$mail->Username = $smtpUsername;
$mail->Password = $smtpPassword;
$mail->setFrom($emailFrom, $emailFromName);
$mail->addAddress($emailTo, $emailToName);
$mail->Subject = $_POST["topic"];
$mail->msgHTML("adres email: " . $_POST["email"] . " treść: " . $_POST["message"]); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail->AltBody = 'HTML messaging not supported';

if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    echo "Message sent!";
}

header("Location: index.html");
die();

?>