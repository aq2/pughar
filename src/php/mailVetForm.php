<?php

$emailBody = $_POST['punterMsg'];
$emailSubject = 'Intensive Training Course';
$successPage = '../pages/contactThanks.html';

// now mail this!
require_once('mailThis.php');

?>
