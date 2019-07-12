<?php

// $EmailTo = 'saghar@ayurvedicyogamassage.org.uk';
$EmailTo = 'angelo@fluxton.co.uk';

$Name = safify($_POST['name']);
$Tel = safify($_POST['tel']);
$Email = safify($_POST['email']);
$Tickets = safify($_POST['tickets']);
$Subject = safify($_POST['subject']);


// prepare email body text
$Body = '';
$Body .= 'Name: ';
$Body .= $Name;
$Body .= "\n\n";
$Body .= 'Phone: ';
$Body .= $Tel;
$Body .= "\n\n";
$Body .= 'Email: ';
$Body .= $Email;
$Body .= "\n\n";
$Body .= 'Workshop: ';
$Body .= $Subject;
$Body .= "\n\n";
$Body .= 'Tickets: ';
$Body .= $Tickets;
$Body .= "\n\n\n\n";
$Body .= "Hi Saghar, little message from angelo...\n";
$Body .= "This email only means that someone has filled in the workshop form.\n";
$Body .= "It DOES NOT mean that they have paid.\n";
$Body .= "PayPal will send you another email when they have paid.\n";


// send email
$success = mail($EmailTo, $Subject, $Body, "From: <$Email>");


// transer to paypal payment page
$blah = "<meta http-equiv='refresh' content='0;url=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=";

if ($success) {
  switch ($Tickets) {
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
} else {
  print "<meta http-equiv='refresh' content='0;url=../pages/formError.html'>";
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
