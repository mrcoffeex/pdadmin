<?php

// Edit this path if PHPMailer is in a different location.
require '../../um_phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();

$mail->Host = 'smtp.gmail.com'; // Which SMTP server to use.
$mail->Port = 465; // Which port to use, 587 is the default port for TLS security.
$mail->SMTPSecure = 'ssl'; // Which security method to use. TLS is most secure.
$mail->SMTPAuth = true; // Whether you need to login. This is almost always required.
$mail->Username = "umdcsender@gmail.com"; // Your Gmail address.
$mail->Password = "semicircle123"; // Your Gmail login password or App Specific Password.
$mail->IsHTML(true); 

$mail->setFrom('umdcsender@gmail.com', 'UMDC OTP'); // Set the sender of the message.
$mail->addAddress($emailto, ''); // Set the recipient of the message.
$mail->Subject = $emailsubject; // The subject of the message.

$mail->Body = $emailmessage;

?>