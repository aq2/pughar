<?php

require('mail/mailer.php');

// where to send emails to
$emailTo = 'angelo@fluxton.co.uk';
$emailFrom = 'angelo@fluxton.co.uk';
// $emailTo = 'saghar@ayurvedicyogamassage.org.uk';

// read and sanitise form questions
$name = safify($_POST['name']);
$email = safify($_POST['email']);
$message = safify($_POST['message']);
$subject = safify($_POST['subject']);


// build up email body
// TODO can add HTML!
$body = 'Name: ';
$body .= $name;
$body .= "\n\n";

$body .= 'Email address: ';
$body .= $email;
$body .= "\n\n";

$body .= 'Message: ';
$body .= $message;
$body .= "\n\n";


try {
  // Recipients
  $mail->addAddress($emailTo, 'website robot');     // Add a recipient
  $mail->setFrom($emailFrom, 'from website');
  $mail->addReplyTo($email);
  $mail->addCC('mickey.megabyte@gmail.com');

  // Content
  $mail->isHTML(true);             // Set email format to HTML
  $mail->Subject = $subject;
  $mail->Body    = $body;
  $mail->AltBody = $body;

  $mail->send();
  print "<meta http-equiv='refresh' content='0;URL=../pages/formThanks.html'>";

} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  /* print "<meta http-equiv='refresh' content='0;URL=../pages/formError.html'>"; */
}


// sanitise user input - don't trust them!
function safify($var) {
  $var = trim($var);
  $var = strip_tags($var);
  $var = stripslashes($var);
  $var = htmlentities($var);
  return $var;
}

?>
