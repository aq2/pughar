<!DOCTYPE html>
<html>
<head>
  <title>transferring...</title>
  <link rel='stylesheet' type='text/css' href='../css/main.css' />
  <meta name='viewport' content='width=device-width, user-scalable=no'>
</head>
<body>
  <div id='container'>        
    <header>
      <img src='../images/header.jpg'>
      <h1>Ayurvedic Yoga Massage</h1>
    </header>
    <div class="transfer">
      <h2>Please wait...</h2>
      <img src="../images/loading.gif" alt="loading animation">
      <h2>...transferring to secure PayPal server</h2>
    </div>
  </div>

<?php

$EmailFrom = Trim(stripslashes($_POST['email']));
$EmailTo = "saghar@ayurvedicyogamassage.org.uk";
// $EmailTo = "mickey.megabyte@gmail.com";
//$Subject = Trim(stripslashes($_POST['subject'])); 
$Name = Trim(stripslashes($_POST['name'])); 
$Tel = Trim(stripslashes($_POST['tel'])); 
$Email = Trim(stripslashes($_POST['email']));
$Session = Trim(stripslashes($_POST['session']));
$Tickets = Trim(stripslashes($_POST['tickets']));

// validation
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=../error.html\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= $Session;
$Body .= "\n";
$Body .= "\n";
$Body .= "Name: ";
$Body .= $Name;
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
$Body .= $Session;
$Body .= "\n";
$Body .= "\n";
$Body .= "Tickets: ";
$Body .= $Tickets;
$Body .= "\n";

// send email 
$success = mail($EmailTo, $Session, $Body, "From: <$EmailFrom>");

// redirect to success page 
if ($success) {
  switch ($Session) {
    case "february intensive training":
      switch ($Tickets) {
        case "single_full":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=UXZ5CHS89XGTE\">";
          break;
        case "single_remainder":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7JWPCMZLSSFFL\">";
          break;
        case "deposit":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=DJ9RVHUF2X8AS\">";
          break;
      }
      break;
    case "june intensive training":
      switch ($Tickets) {
        case "single_full":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=E2MF4KDYEA43E\">";
          break;
        case "single_remainder":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=LWUEDDZ5MMQKE\">";
          break;
        case "deposit":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=DCFKRY8558HBJ\">";
          break;
      }
      break;
    case "october intensive training":
      switch ($Tickets) {
        case "single_full":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ELZTCKYSTBTMG\">";
          break;
        case "single_remainder":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=3PR3EKM8URLCJ\">";
          break;
        case "deposit":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=2JZE397XZS6S2\">";
          break;
      }
      break;
    }  // end switch
} else {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=../error.html\">";
}
?>

</body>
</html>