<?php
/* $server = 'localhost';
 $user = 'root';
 $password = '';
 $db = 'alumni_information_system'
 
 $conn = mysqli_connect($server, $user, $password, $db);*/
?>

<?php
$con = mysqli_connect("localhost","root","","alumni_info_system");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>