<?php

// safify
// check4links
// include this file in process.php's

// first of all, check honeypot for spam
if (!empty($_POST['website'])) {
  // it's SPAM
  die();
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
