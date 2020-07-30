<?php

require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");
$mailsuccess = false;

   if (!isset($subject)){
      $subject = '';
      if (isset($emailFrom)) {
         $subject = "Question from " . $emailFrom;
      }
   }

   $emailFrom = "Thisdoesntshowanyway@gmail.com";

   // If no email specified send to admin email
   if (!isset($emailTo)){
      $emailTo = "hogwartspta@gmail.com";
   }

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
  $mail->SetFrom($emailFrom);
  $mail->Subject = "Hogwarts PTA " . $subject;
  $mail->Body = $message;
  $mail->AddAddress($emailTo);

   if(!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
   } else {
      $mailsuccess = true;
   }
?>
