<?php

$EmailFrom = Trim(stripslashes($_POST['email']));
// $EmailTo = "saghar@ayurvedicyogamassage.org.uk";
$EmailTo = "mickey.megabyte@gmail.com";
$Subject = "Reply from website - free ten habits talk";
$Name = Trim(stripslashes($_POST['name']));
$Email = Trim(stripslashes($_POST['email']));
$Date = Trim(stripslashes($_POST['date']));
$Message = Trim(stripslashes($_POST['message']));

// validation
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=../error.html\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "\n";
$Body .= "Talk date: ";
$Body .= $Date;
$Body .= "\n";
$Body .= "\n";
$Body .= "Challenge: ";
$Body .= $Message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=../contactthanks.html\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=../error.html\">";
}

?>
