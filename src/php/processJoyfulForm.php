<?php
// javascript validation should have been done before reaching this file

// load php validation functions to double-check for hackery
require_once('validators.php');

// read and sanitise form questions
$formName = safify($_POST['name']);
$formTel = safify($_POST['tel']);
$formEmail = safify($_POST['email']);
$formSubject = safify($_POST['subject']);

// no fields can be empty, email address must be valid
// check that tickets are ok??
// honeypot?
// overkill?
// lazy man decision: what till it's spammed...


// prepare email body text
$emailBody = '<h1>Joyful Living course reply</h1>'
           . "<h2>Name: $formName </h2>"
           . "<h2>Phone: $formTel </h2>"
           . "<h2>Email: $formEmail </h2>"
           . '<br><br>'
           . '<p>Hi Saghar, little message from angelo...</p>'
           . '<p>This email only means that someone has filled in the Joyful form.</p>'
           . '<p>It DOES NOT mean that they have paid.</p>'
           . '<p>PayPal will send you another email when they have paid.<\p>';


$emailSubject = $formSubject;
$successPage = '../pages/contactThanks.html';

// now mail this!
require_once('mailThis.php');

if ($success) {
  // transer to paypal payment page
  $blah = "<meta http-equiv='refresh' content='0;url=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=";
  print $blah . "85J3RLFL4QFHY" . "'>";
  echo $blah . "85J3RLFL4QFHY" . "'>";
} else {
  print "<meta http-equiv='refresh' content='0;URL=../pages/formError.html'>";
}


?>
