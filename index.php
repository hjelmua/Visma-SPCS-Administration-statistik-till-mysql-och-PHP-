<?php include 'header.php'; ?>
<?php include 'data.php'; ?>



	
	
<?php

include 'functions.inc.php';

if(isset($_POST['royalty']))
{
   display();
   
   mysqli_close($con);
} 


if(isset($_POST['artiklar']))
{
   artiklar();
   
   mysqli_close($con);
} 

?>	
	
	
	

<?php include 'footer.php'; ?>
