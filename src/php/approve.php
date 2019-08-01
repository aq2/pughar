<html>
<body>

<?php

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


/* change all this to a php function to showDetails() */

function showDetails() {

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

  echo "<h1>Intensive Training Application</h1>";

  echo "<p>Name: $name </p>";
  echo "<p>Gender: $gender </p>";
  echo "<p>Age: $age </p>";
  echo "<p>Tel: $tel </p>";
  echo "<p>email: $email </p>";
  echo "<p>health: $health </p>";
  echo "<p>medications: $meds </p>";
  echo "<p>workshops taken: $workshops </p>";
  echo "<p>qualifications: $qualifications </p>";
  echo "<p>subject: $subject </p>";

}

showDetails();

function yep() {
  showDetails();
  echo "$name is good";
}

?>


<button id='accept' onclick='accept()'>accept</button>
<button id='reject' onclick='reject()'>nope</button>

<script>

  function accept() {
    console.log('yep')
    document.write(' <?php yep(); ?> ')
  }

  function reject() {
    console.log('nope')
  }

</script>


</body>
</html>
