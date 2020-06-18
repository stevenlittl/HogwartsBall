<?php

require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");
$success = false;

  $mail = new PHPMailer\PHPMailer\PHPMailer();
  $mail->IsSMTP(); // enable SMTP

  $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
  $mail->SMTPAuth = true; // authentication enabled
  $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 465; 
  $mail->IsHTML(true);
  $mail->Username = "hogwartspta@gmail.com";
  $mail->Password = "beanyoda999";
  $mail->SetFrom("me@gmail.com");
  $mail->Subject = "Test";
  $mail->Body = "Thanks for signing up for the hogwarts ball";
  $mail->AddAddress("glueh18@gmail.com");

   if(!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
   } else {
      $success = true;
   }
?>
