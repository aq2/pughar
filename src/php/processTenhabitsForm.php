<?php
// this file uses old mailer format!  need to change


require_once('validators.php');


// where to send emails to, and where they appear to come from
$emailTo = 'angelo@fluxton.co.uk';
// $emailTo = 'saghar@ayurvedicyogamassage.org.uk';
$emailCC = 'mickey.megabyte@gmail.com';


// read and sanitise form questions
$form_name = safify($_POST['name']);
$form_email = safify($_POST['email']);
$form_date = safify($_POST['date']);
$form_message = safify($_POST['message']);
$form_subject = safify($_POST['subject']);


// build up email body
$body = '<h1>Free talk application</h1>';
$body .= "<h2>Name: $form_name </h2>";
$body .= "<h2>Email address: $form_email </h2>";
$body .= "<h2>Talk date: $form_date </h2>";
$body .= "<h2>Most important challenge: $form_message </h2>";


try {
  // Recipients
  $mail->addAddress($emailTo);     // Add a recipient
  $mail->setFrom($emailTo, 'from website');
  $mail->addReplyTo($form_email);
  $mail->addCC($emailCC);

  // Content
  $mail->isHTML(true);
  $mail->Subject = $form_subject;
  $mail->Body    = $body;
  $mail->AltBody = $body;

  $mail->send();
  print "<meta http-equiv='refresh' content='0;URL=../pages/contactThanks.html'>";

} catch (Exception $e) {
  /* echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; */
  print "<meta http-equiv='refresh' content='0;URL=../pages/formError.html'>";
}

// sanitise user input - don't trust them!
function safify($var) {
  $var = trim($var);
  $var = strip_tags($var);
  $var = stripslashes($var);
  $var = htmlentities($var);
  return $var;
}

