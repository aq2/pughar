<!doctype html>
<html>
<body>

<?php

function getDetails() {
  $details = array(
    'name' => $_GET['name'],
    'gender' => $_GET['gender'],
    'age' => $_GET['age'],
    'tel' => $_GET['tel'],
    'email' => $_GET['email'],
    'health' => $_GET['health'],
    'meds' => $_GET['meds'],
    'workshops' => $_GET['workshops'],
    'quals' => $_GET['quals'],
    'subject' => $_GET['subject']
  );

  return $details;
}


function showDetails() {
  $details = getDetails();

  echo "<h1>Intensive Training Application</h1>";
  echo '<p>Name: <span id="name">' . $details['name'] . '</span></p>';
  echo '<p>Gender: ' . $details['gender'] . '</p>';
  echo '<p>Age: ' . $details['age'] . '</p>';
  echo '<p>Tel: ' . $details['tel'] . '</p>';
  echo '<p>email: ' . $details['email'] . '</p>';
  echo '<p>health: ' . $details['health'] . '</p>';
  echo '<p>medications: ' . $details['meds'] . '</p>';
  echo '<p>workshops taken: ' . $details['workshops'] . '</p>';
  echo '<p>qualifications: ' . $details['qualifications'] . '</p>';
  echo '<p>subject: <span id="subject">' . $details['subject'] . '</span></p>';
}

function yep() {
  $details = getDetails();
  $name = $details['name'];
  showDetails();    // need to call again as screen gets cleared for some reason
  echo $name . " has been accepted for the intensive training.<br><br>";
  echo '<button id="yesEmail" onclick="yesEmail()">send ' . $name . ' a welcoming email to the course</button>';
}

function main() {
  $name = $_GET['name'];
  $gender = $_GET['gender'];
  $age = $_GET['age'];
  $tel = $_GET['tel'];
  $email = $_GET['email'];
  $health = $_GET['health'];
  $meds = $_GET['meds'];
  $workshops = $_GET['workshops'];
  $quals = $_GET['quals'];
  $subject = $_GET['subject'];
  showDetails();
  echo '<button id="accept" onclick="accept()">accept</button>';
  echo '<button id="reject" onclick="reject()">nope</button>';
}

main();
?>



<script>

  function accept() {
    console.log('yep')
    document.write(' <?php yep(); ?> ')
  }

  function reject() {
    console.log('nope')
  }

function yesEmail() {
  // build up body of email
  const name = document.getElementById('name').textContent
  const subject = document.getElementById('subject').textContent
  var body = 'Hi, ' + name + ', you have been accepted to attend the ' + subject
  document.write(body)
  
  // stick it in a form so can be edited
  // add a send button
}


</script>
</body>
</html>
