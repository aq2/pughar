<?php

$EmailTo = 'me@angelo.xyz';
// $EmailTo = "mickey.megabyte@gmail.com";
// $EmailTo = "saghar@ayurvedicyogamassage.org.uk";

$Name = Trim(stripslashes($_POST['name']));
$Email = Trim(stripslashes($_POST['email']));
$Message = Trim(stripslashes($_POST['message']));
$Subject = Trim(stripslashes($_POST['subject']));


// prepare email body text
$Body = 'Name: ';
$Body .= $Name;
$Body .= "\n\n";
$Body .= 'email address: ';
$Body .= $Email;
$Body .= "\n\n";



if(isset($_POST['date'])) {
  $Date = $_POST['date'];
  $Body .= 'Talk date: ';
  $Body .= $Date;
  $Body .= "\n\n";
  $Body .= 'Challenge: ';
} else {
  $Body .= 'Message: ';
}

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
