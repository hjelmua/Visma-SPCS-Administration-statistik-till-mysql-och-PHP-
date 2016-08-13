<?php
$con=mysqli_connect("localhost","myusername","mypassword","SPCS");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  
  global $self; 
  $self = "index.php";  
  
  $func = $HTTP_GET_VARS["func"];  
  $func = $_GET['func']; 
  
?>
