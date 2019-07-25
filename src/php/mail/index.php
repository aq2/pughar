<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('mail/PHPMailer.php');
require('mail/SMTP.php');
require('mail/Exception.php');


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 1;                                       // set to 2 for verbose
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'mail.privateemail.com';                // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'angelo@fluxton.co.uk';                 // SMTP username
    $mail->Password   = 'bobthenob';                            // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('angelo@fluxton.co.uk', 'angeMailer');
    $mail->addAddress('mickey.megabyte@gmail.com', 'mickey');     // Add a recipient
    $mail->addReplyTo('angelo@fluxton.co.uk', 'Information');

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
