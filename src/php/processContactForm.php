<?php

require_once('validators.php');

// read and sanitise form questions
$formName = safify($_POST['name']);
$formEmail = safify($_POST['email']);
$formMessage = safify($_POST['message']);
$formSubject = safify($_POST['subject']);


// build up email body
$emailBody = '<h1>Response from website contact form</h1>'
           . "<h2>Name: $formName </h2>"
           . "<h2>Email address: $formEmail </h2>"
           . "<h2>Message: $formMessage </h2>";

$emailSubject = 'message received';
$successPage = '../pages/contactThanks.html';


// now mail this!
require_once('mailThis.php');

?>
