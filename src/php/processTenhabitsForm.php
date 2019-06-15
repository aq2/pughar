<?php

// where to send emails to
$emailTo = 'me@angelo.xyz';


// read and sanitise form questions
$name = safify($_POST['name']);
$email = safify($_POST['email']);
$date = safify($_POST['date']);
$message = safify($_POST['message']);
$subject = safify($_POST['subject']);


// build up email body
$body = 'Name: ';
$body .= $name;
$body .= "\n\n";

$body .= 'Email address: ';
$body .= $email;
$body .= "\n\n";

$body .= 'Talk date: ';
$body .= $date;
$body .= "\n\n";

$body .= 'Most important challenge: ';
$body .= $message;
$body .= "\n\n";


// send the email
/* $success = mail($emailTo, $subject, $body, "From: <$email>"); */


// redirect to success page
if ($success){
  print "<meta http-equiv='refresh' content='0;URL=../pages/contactthanks.html'>";
}
else{
  print "😱";
  /* print "<meta http-equiv='refresh' content='0;URL=../error.html'>"; */
}


// sanitise user input - don't trust them!
function safify($var) {
  $var = trim($var);
  $var = strip_tags($var);
  $var = stripslashes($var);
  $var = htmlentities($var);
  return $var;
}

