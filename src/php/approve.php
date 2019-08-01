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

function yep() {
  global $name;
  echo "$name is good";
}

?>

<h1>Intensive Training Application</h1>

<p>Name: <?php echo $name; ?></p>
<p>Gender: <?php echo $gender; ?></p>
<p>Age: <?php echo $age; ?></p>
<p>Tel: <?php echo $tel; ?></p>
<p>email: <?php echo $email; ?></p>
<p>health: <?php echo $health; ?></p>
<p>medications: <?php echo $meds; ?></p>
<p>workshops taken: <?php echo $workshops; ?></p>
<p>qualifications: <?php echo $qualifications; ?></p>
<p>subject: <?php echo $subject; ?></p>

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
