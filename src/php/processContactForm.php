<?php

// where to send emails to
$emailTo = 'angelo@fluxton.co.uk';
// $emailTo = 'saghar@ayurvedicyogamassage.org.uk';

// read and sanitise form questions
$name = safify($_POST['name']);
$email = safify($_POST['email']);
$message = safify($_POST['message']);
$subject = safify($_POST['subject']);


// build up email body
$body = 'Name: ';
$body .= $name;
$body .= "\n\n";

$body .= 'Email address: ';
$body .= $email;
$body .= "\n\n";

$body .= 'Message: ';
$body .= $message;
$body .= "\n\n";


// send the email
$success = mail($emailTo, $subject, $body, "From: <$email>");

// redirect to success page
if ($success){
  print "<meta http-equiv='refresh' content='0;URL=../pages/formThanks.html'>";
}
else{
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

