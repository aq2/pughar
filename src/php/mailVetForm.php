<?php

// honeypot?

require('mail/mailer.php');

// where to send emails to, and where they come from
$emailTo = 'angelo@fluxton.co.uk';
// $emailTo = 'saghar@ayurvedicyogamassage.org.uk';
$emailCC = 'mickey.megabyte@gmail.com';

$msg = $_POST['punterMsg'];

echo $msg;

try {
  // Recipients
  $mail->addAddress($emailTo);     // Add a recipient
  $mail->setFrom($emailTo, 'from website');
  $mail->addReplyTo('angelo@fluxton.co.uk');
  $mail->addCC($emailCC);

  // Content
  $mail->isHTML(true);
  $mail->Subject = 'Intensive Training Course';
  $mail->Body    = $msg;
  $mail->AltBody = $msg;

  $mail->send();
  print "<meta http-equiv='refresh' content='0;URL=../pages/contactThanks.html'>";

} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  /* print "<meta http-equiv='refresh' content='0;URL=../pages/formError.html'>"; */
}

