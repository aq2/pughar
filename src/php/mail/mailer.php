<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('PHPMailer.php');
require('SMTP.php');
require('Exception.php');

// read smtp server settings from file
$ini = parse_ini_file('smtp.ini');

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

// setup smtp server
$mail->SMTPDebug = 1;
$mail->isSMTP();
$mail->Host       = $ini['Host'];
$mail->SMTPAuth   = $ini['SMTPAuth'];
$mail->Username   = $ini['Username'];
$mail->Password   = $ini['Password'];
$mail->SMTPSecure = $ini['SMTPSecure'];
$mail->Port       = $ini['Port'];

?>
