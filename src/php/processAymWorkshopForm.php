<?php

require('mail/mailer.php');

// where to send emails to, and where they appear to come from
$emailTo = 'angelo@fluxton.co.uk';
// $emailTo = 'saghar@ayurvedicyogamassage.org.uk';
$emailCC = 'mickey.megabyte@gmail.com';

// read and sanitise form questions
$form_name = safify($_POST['name']);
$form_tel = safify($_POST['tel']);
$form_email = safify($_POST['email']);
$form_tickets = safify($_POST['tickets']);
$form_subject = safify($_POST['subject']);


// prepare email body text
$body = '<h1>Massage workshop reply</h1>';
$body .= '<h2>Name: ' . $form_name . '</h2>';
$body .= '<h2>Phone: ' . $form_tel . '</h2>';
$body .= '<h2>Email: ' . $form_email . '</h2>';
$body .= '<h2>Workshop: ' . $form_subject . '</h2>';
$body .= '<h2>Tickets: ' . $form_tickets . '</h2>';
$body .= "<br><br>";
$body .= "<p>Hi Saghar, little message from angelo...</p>";
$body .= "<p>This email only means that someone has filled in the workshop form.</p>";
$body .= "<p>It DOES NOT mean that they have paid.</p>";
$body .= "<p>PayPal will send you another email when they have paid.<\p>";


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

  // transer to paypal payment page
  $blah = "<meta http-equiv='refresh' content='0;url=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=";
  switch ($form_tickets) {
    case "single_full":
      print $blah . "3SF2SCKDLUR3A8" . "'>";
      break;
    case "single_remainder":
      print $blah . "Y6VZXBZ8XQAV8" . "'>";
      break;
    case "couple_full":
      print $blah . "BFGZFUY2M447Y" . "'>";
      break;
    case "couple_remainder":
      print $blah . "R9QL2XH4E5F5G" . "'>";
      break;
    case "deposit":
      print $blah . "QA9L8PWDRLWPW" . "'>";
      break;
    default:
      echo "something's gone awry!";
  }

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


?>
