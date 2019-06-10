<?php

$EmailFrom = Trim(stripslashes($_POST['email']));
$EmailTo = "saghar@ayurvedicyogamassage.org.uk";
//$EmailFrom = "saghar@ayurvedicyogamassage.org.uk";
// $EmailTo = "mickey.megabyte@gmail.com";
$Subject = Trim(stripslashes($_POST['subject'])); 
$Name = Trim(stripslashes($_POST['name'])); 
$Gender = Trim(stripslashes($_POST['gender'])); 
$Age = Trim(stripslashes($_POST['age'])); 
$Tel = Trim(stripslashes($_POST['tel'])); 
$Email = Trim(stripslashes($_POST['email'])); 
$Health = Trim(stripslashes($_POST['health'])); 
$Meds = Trim(stripslashes($_POST['medic'])); 
$Quals = Trim(stripslashes($_POST['quals'])); 
$Workshop = Trim(stripslashes($_POST['wksh'])); 

// validation
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=../error.html\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= $Subject;
$Body .= "\n";
$Body .= "\n";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "\n";
$Body .= "Gender: ";
$Body .= $Gender;
$Body .= "\n";
$Body .= "\n";
$Body .= "Age: ";
$Body .= $Age;
$Body .= "\n";
$Body .= "\n";
$Body .= "Tel: ";
$Body .= $Tel;
$Body .= "\n";
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "\n";
$Body .= "Health issues: ";
$Body .= $Health;
$Body .= "\n";
$Body .= "\n";
$Body .= "Medications: ";
$Body .= $Meds;
$Body .= "\n";
$Body .= "\n";
$Body .= "Qualifications: ";
$Body .= $Quals;
$Body .= "\n";
$Body .= "\n";
$Body .= "Previous Workshop: ";
$Body .= $Workshop;
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