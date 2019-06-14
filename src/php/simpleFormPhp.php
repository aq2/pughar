<?php

$EmailTo = 'me@angelo.xyz';
// $EmailTo = "mickey.megabyte@gmail.com";
// $EmailTo = "saghar@ayurvedicyogamassage.org.uk";

$Name = Trim(stripslashes($_POST['name']));
$Email = Trim(stripslashes($_POST['email']));
$Message = Trim(stripslashes($_POST['message']));
$Subject = Trim(stripslashes($_POST['subject']));

$HabitsPage = False;
$Date = 'fish';
if (strpos($Subject, 'Ten' == 0)) {
  $HabitsPage = True;
  $Date = Trim(stripslashes($_POST['date']));
}


// prepare email body text
$Body = 'Name: ';
$Body .= $Name;
$Body .= "\n\n";
$Body .= 'email address: ';
$Body .= $Email;
$Body .= "\n\n";


$Body .= 'Subject: ';
$Body .= $Subject;
$Body .= "\n\n";

$Body .= 'strpos: ';
$Body .= strpos($Subject, 'Ten');
$Body .= "\n\n";

$Body .= "habits page: ";
$Body .= $HabitsPage;
$Body .= "\n\n";

if ($HabitsPage) {
  $Body .= 'Talk date: ';
  $Body .= $Date;
  $Body .= "\n\n";
  $Body .= 'Challenge: ';
} else {
  $Body .= 'Message: ';
}

  $Body .= 'Talk date: ';
  $Body .= $Date;
  $Body .= "\n\n";

$Body .= $Message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From: <$Email>");

// redirect to success page
if ($success){
  print "<meta http-equiv='refresh' content='0;URL=../pages/contactthanks.html'>";
}
else{
  print "<meta http-equiv='refresh' content='0;URL=../error.html'>";
}

?>
