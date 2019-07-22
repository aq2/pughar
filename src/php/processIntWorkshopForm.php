<?php

// $EmailTo = 'saghar@ayurvedicyogamassage.org.uk';
$EmailTo = 'angelo@fluxton.co.uk';

$Name = safify($_POST['name']);
$Gender = safify($_POST['gender']);
$Age = safify($_POST['age']);
$Tel = safify($_POST['tel']);
$Email = safify($_POST['email']);
$Health = safify($_POST['health']);
$Meds = safify($_POST['medic']);
$Workshops = safify($_POST['wksh']);
$Quals = safify($_POST['quals']);
$Subject = safify($_POST['subject']);

$headers = "From: <$Email>" . "\r\n" . "CC: mickey.megabyte@gmail.com";

// prepare email body text
$Body = '';
$Body .= 'Name: ' . $Name . "\n\n";
$Body .= 'Gender: ' . $Gender . "\n\n";
$Body .= 'Age: ' . $Age . "\n\n";
$Body .= 'Phone: ' . $Tel . "\n\n";
$Body .= 'Email: ' . $Email . "\n\n";
$Body .= 'Health Conditions: ' . $Health . "\n\n";
$Body .= 'Medications: ' . $Meds . "\n\n";
$Body .= 'Workshop already done: ' . $Workshops . "\n\n";
$Body .= 'Qualifications: ' . $Quals . "\n\n";
$Body .= 'Workshop applied for: ' . $Subject . "\n\n\n\n";

$Body .= "Hi Saghar, little message from angelo...\n";
$Body .= "This email means that someone has applied for intensive workshop training.\n";
$Body .= "You have to approve them, and if they are OK, send them an email (";
$Body .= $Email;
$Body .= "), and tell them to visit www.ayurvedicyogamassage.org.uk/pay4training ";
$Body .= "OR, tell them they are not suitable.\n";
$Body .= "You will receive another email when they have filled in the new form, ";
$Body .= "and PayPal will send you an email when they have paid.\n";


// send email
$success = mail($EmailTo, $Subject, $Body, $headers);

// redirect to success page
if ($success) {
  print "<meta http-equiv='refresh' content='0;URL=../pages/intensiveThanks.html'>";
} else {
  print "<meta http-equiv='refresh' content='0;URL=../pages/formError.html'>";
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
