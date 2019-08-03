<!doctype html>
<html>
<body>

<?php

/* function getDetails() { */
/*   $details = array( */
/*     'name' => $_GET['name'], */
/*     'gender' => $_GET['gender'], */
/*     'age' => $_GET['age'], */
/*     'tel' => $_GET['tel'], */
/*     'email' => $_GET['email'], */
/*     'health' => $_GET['health'], */
/*     'meds' => $_GET['meds'], */
/*     'workshops' => $_GET['workshops'], */
/*     'quals' => $_GET['quals'], */
/*     'subject' => $_GET['subject'] */
/*   ); */

/*   return $details; */
/* } */






?>



<script>

const urlParams = new URLSearchParams(window.location.search)
// const name = urlParams.get('name')
//console.log(name)

var details = []
for (var i of urlParams) {
  console.log(i[0], i[1])
  //details.push(i[0]: i[1])
  details[i[0]] = i[1]
}
console.log(details)



</script>
</body>
</html>
