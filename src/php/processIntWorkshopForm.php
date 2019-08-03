<?php

// first of all, check honeypot for spam
if (!empty($_POST['website'])) {
  // it's SPAM
  die();
}


require('mail/mailer.php');

// where to send emails to, and where they appear to come from
$emailTo = 'angelo@fluxton.co.uk';
// $emailTo = 'saghar@ayurvedicyogamassage.org.uk';
$emailCC = 'mickey.megabyte@gmail.com';


// read and sanitise form questions
$form_name = safify($_POST['name']);
$form_gender = safify($_POST['gender']);
$form_age = safify($_POST['age']);
$form_tel = safify($_POST['tel']);
$form_email = safify($_POST['email']);
$form_health = safify($_POST['health']);
$form_meds = safify($_POST['medic']);
$form_workshops = safify($_POST['wksh']);
$form_quals = safify($_POST['quals']);
$form_subject = safify($_POST['subject']);
$form_date = safify($_POST['date']);
$form_place = safify($_POST['place']);
$form_address = safify($_POST['address']);
$form_mapRef = safify($_POST['iframeSrc']);


// prepare email body text
$body = '<h1>Intensive workshop application</h1>';
$body .= '<h2>Name: ' . $form_name . '</h2>';
$body .= '<h2>Gender: ' . $form_gender . '</h2>';
$body .= '<h2>Age: ' . $form_age . '</h2>';
$body .= '<h2>Phone: ' . $form_tel . '</h2>';
$body .= '<h2>Email: ' . $form_email . '</h2>';
$body .= '<h2>Health Conditions: ' . $form_health . '</h2>';
$body .= '<h2>Medications: ' . $form_meds . '</h2>';
$body .= '<h2>Workshop already done: ' . $form_workshops . '</h2>';
$body .= '<h2>Qualifications: ' . $form_quals . '</h2>';
$body .= "<h2>Workshop applied for: $form_place, $form_date </h2>";
$body .= '<br><br>';
$body .= "<h4>Hi Saghar, little message from angelo...</h4>";
$body .= "<h4>This email means that someone has applied for intensive workshop training.</h4>";
$body .= "<h4>You now have to approve or reject them.</h4>";


// now build up info to appear in link to approve
$this_serva = $_SERVER['SERVER_NAME'];
if ($this_serva == 'php-docker.local') {
  $request = 'http://localhost:3001';
} else {
  $request = 'http://www.ayurvedicyogamassage.org.uk';
}

$linka = $request . '/pages/vet.html';
$linka .= '?name=' . $form_name;
$linka .= '&gender=' . $form_gender;
$linka .= '&age=' . $form_age;
$linka .= '&tel=' . $form_tel;
$linka .= '&email=' . $form_email;
$linka .= '&health=' . $form_health;
$linka .= '&meds=' . $form_meds;
$linka .= '&workshops=' . $form_workshops;
$linka .= '&quals=' . $form_quals;
$linka .= '&subject=' . $form_subject;
$linka .= '&place=' . $form_place;
$linka .= '&date=' . $form_date;
$linka .= '&address=' . $form_address;
$linka .= '&mapRef=' . $form_mapRef;

$body .= '<h2><button><a href=\'' . $linka . '\'>here</a></button></h2>';


try {
  // Recipients
  $mail->addAddress($emailTo);     // Add a recipient
  $mail->setFrom($emailTo, 'from website');
  $mail->addReplyTo($form_email);
  $mail->addCC($emailCC);

  // Content
  $mail->isHTML(true);
  $mail->Subject = $form_subject;
  $mail->Body    = $body;
  $mail->AltBody = $body;

  $mail->send();
  print "<meta http-equiv='refresh' content='0;URL=../pages/contactThanks.html'>";

} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  /* print "<meta http-equiv='refresh' content='0;URL=../pages/formError.html'>"; */
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
