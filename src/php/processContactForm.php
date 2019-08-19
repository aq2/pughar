<?php
// javascript validation should have been done before reaching this file

// load php validation functions to double-check for hackery
require_once('validators.php');

// read and sanitise form questions
$formName = safify($_POST['name']);
$formEmail = safify($_POST['email']);
$formMessage = safify($_POST['message']);
$formSubject = safify($_POST['subject']);

// no fields can be empty, and email address must be valid
if (empty($formName)
    || empty($formEmail)
    || empty($formSubject)
    || (!validEmail($formEmail))
) {
  // don't bother sending a message, fuck 'em
  die();
}

// build up email body to send to saghar
$emailBody = '<h1>Response from website contact form</h1>'
           . "<h2>Name: $formName </h2>"
           . "<h2>Email address: $formEmail </h2>"
           . "<h2>Message: $formMessage </h2>";

$emailSubject = 'message received';
$successPage = '../pages/contactThanks.html';

// now mail this!
require_once('mailThis.php');

?>
