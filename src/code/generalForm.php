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

  <!-- new -->

<?php
$EmailTo = "saghar@ayurvedicyogamassage.org.uk";
//$EmailTo = "mickey.megabyte@gmail.com";
$EmailFrom = Trim(stripslashes($_POST['email']));
$Name = Trim(stripslashes($_POST['name'])); 
$Tel = Trim(stripslashes($_POST['tel'])); 
$Email = Trim(stripslashes($_POST['email']));
$Tickets = Trim(stripslashes($_POST['tickets']));
$Subject = Trim(stripslashes($_POST['subject']));

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
$Body .= "Phone: ";
$Body .= $Tel;
$Body .= "\n";
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "\n";
$Body .= "Workshop: ";
$Body .= $Subject;
$Body .= "\n";
$Body .= "\n";
$Body .= "Tickets: ";
$Body .= $Tickets;
$Body .= "\n";

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// angelo's bit
if ($success) {
  switch ($Subject) {    
    case "Ashtanga workshop 22 September":
      switch ($Tickets) {
        case "single_full":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MSWQ5YZVJKHH8\">";
          break;
        case "single_remainder":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MBC3T3KWWNQ62\">";
          break;
        case "deposit":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=FHTXBLTJJDA6G\">";
          break;
        case "couple_remainder":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=URQPA36MJDC4J\">";
          break;
        case "couple_full":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=84MPJ28NR94MQ\">";
          break;
      }
      break;
      case "Lotus Loft workshop 8 December":
	      switch ($Tickets) {
	        case "single_full":
	          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=3SF2SCKDLUR3A\">";
	          break;
	        case "single_remainder":
	          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=Y6VZXBZ8XQAV8\">";
	          break;
	        case "deposit":
	          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=QA9L8PWDRLWPW\">";
	          break;
	        case "couple_remainder":
	          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=R9QL2XH4E5F5G\">";
	          break;
	        case "couple_full":
	          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=BFGZFUY2M447Y\">";
	          break;
      }
      break;
      case "Forge workshop 12 March":
	      switch ($Tickets) {
	        case "single_full":
	          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=3LV262BG5TG5L\">";
	          break;
	        case "single_remainder":
	          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=39MTJ9ECCTZLQ\">";
	          break;
	        case "deposit":
	          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ACCE6K37DYUPJ\">";
	          break;
	        case "couple_remainder":
	          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=2LTY5J63AHTVC\">";
	          break;
	        case "couple_full":
	          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=2E8EWF9S66HXL\">";
	          break;
      }
      break;
      case "Forge workshop 7 May":
	      switch ($Tickets) {
	        case "single_full":
	          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=B94FYKKBKT3QN\">";
	          break;
	        case "single_remainder":
	          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=GPQRLM9V2S3RS\">";
	          break;
	        case "deposit":
	          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=NFXUNXZVLC3QQ\">";
	          break;
	        case "couple_remainder":
	          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7WG3PA3ES4UN6\">";
	          break;
	        case "couple_full":
	          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=FTDNACR9A4FNQ\">";
	          break;
      }
      break;
    case "Lotus Loft workshop 28 May":
      switch ($Tickets) {
        case "single_full":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=Z8SY8X87U3FM4\">";
          break;
        case "single_remainder":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=GUF2QNN643XUC\">";
          break;
        case "couple_full":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=UPWS7G7G469K6\">";
          break;
        case "couple_remainder":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=J7BJ3BQKJNGFC\">";
          break;
        case "deposit":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=UPKCC56Z5RLTQ\">";
          break;
      }
      break;
    case "Lotus Loft workshop 23 July":
      switch ($Tickets) {
        case "single_full":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6XAJZPSMXYAWQ\">";
          break;
        case "single_remainder":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZTMK8C2F6466L\">";
          break;
        case "couple_full":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9DK8KA3X93BYE\">";
          break;
        case "couple_remainder":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=T54PS3VV7XVHG\">";
          break;
        case "deposit":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7JLU7TUB94WFS\">";
          break;
      }
      break;
    case "Neal's Yard workshop 4 June":
      switch ($Tickets) {
        case "single_full":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=B79HZGGW4KGZ6\">";
          break;
        case "single_remainder":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=NABF66THMJH5Q\">";
          break;
        case "couple_full":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=WLRNFL7F85QSY\">";
          break;
        case "couple_remainder":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=M5J3VDD7UQUNE\">";
          break;
        case "deposit":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=X6UCNB5DYVLDJ\">";
          break;
      }
      break;
    case "Intensive training - Natural Health Centre 23-26 June":
      switch ($Tickets) {
        case "deposit":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=W4CAJ3UG4HMQ4\">";
          break;
        case "single":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=B2JF5URJQTFRJ\">";
          break;
        case "single_remainder":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=PTJ58KCWFALEU\">";
          break;
      }
      break;
    case "Exeter Natural Health Centre workshop 8 August":
      switch ($Tickets) {
        case "single":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6LM3QTQNU4AEN\">";
          break;
        case "single_remainder":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=62QSHJS6NJ9QS\">";
          break;
        case "couple":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7NZHDXK4J2X2C\">";
          break;
        case "couple_remainder":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XZKJ4PQJGGJVA\">";
          break;
        case "deposit":
          print "<meta http-equiv=\"refresh\" content=\"0;URL=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=3CXYZ6L9B5XTE\">";
          break;
      }
      break;
  }
} else {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=../error.html\">";
}

?>

</body>
</html>