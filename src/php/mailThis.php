<?php
// required by scripts that want to send email
// assumes $emailSubject and $emailBody have been set

// where to send emails to, and where they appear to come from
$emailTo = 'saghar@ayurvedicyogamassage.org.uk';
$emailCC = 'angelo@fluxton.co.uk';
$emailFrom = 'saghar@ayurvedicyogamassage.org.uk';

// Create HTML email headers
$headers  = 'MIME-Version: 1.0' . "\r\n"
          . 'Content-type: text/html; charset=iso-8859-1' . "\r\n"
          . 'From: ' . $emailFrom . "\r\n"
          . 'Reply-To: '.$emailFrom."\r\n"
          . 'Cc: ' . $emailCC . "\r\n"
          . 'X-Mailer: PHP/' . phpversion();

$failPage = '../pages/formError.html';

// send the mail, or at least try to...
$success = mail($emailTo, $emailSubject, $emailBody, $headers);
/* echo "email's gonna be $emailBody"; */

// redirect to success page, hopefully
if ($success) {
  print "<meta http-equiv='refresh' content='0;URL=" . $successPage . "'>";
} else {
  print "<meta http-equiv='refresh' content='0;URL=" . $failPage . "'>";
}
