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
	


<?php

/* allt borde flyttas till functions.inc.php ... */

    $result = mysqli_query($con,"SELECT 
	landkod,COUNT(*) AS antallander
FROM KUND
WHERE landkod<>''
GROUP BY landkod;");

$row_cnt = $result->num_rows;
$counter = 0;


echo '  
	<section class="content-header">
	      <h1>
	        Kunder i olika länder
	        <small>'.$row_cnt.' länder</small>
	    </section>
	
	
	<div class="row">
<div class="col-md-10 col-md-offset-1">
        <div class="box box-solid bg-light-blue-gradient">
                   <div class="box-header">
                     <!-- tools box -->
                     <div class="pull-right box-tools">
                       <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range">
                         <i class="fa fa-calendar"></i></button>
                       <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                         <i class="fa fa-minus"></i></button>
                     </div>
	 <i class="fa fa-map-marker"></i>
	<h3 class="box-title">
                Kunder i dessa länder
              </h3>
            </div>
            <div class="box-body">
              <div id="world-map" style="height: 450px; width: 100%;"></div>
            </div>
            <!-- /.box-body-->
            
          </div>
          <!-- /.box --> </div> </div>	  ';



  echo ' <script> //jvectormap data
var visitorsData = { ';
while ($row = mysqli_fetch_array($result)) {
    if (++$counter == $row_cnt) {
	    echo "\n"; 
	 echo '"'. $row['landkod'] .'": '. $row['antallander'] .'';   
	  echo "\n";  
	     } else {	     
	echo '"'. $row['landkod'] .'": '. $row['antallander'] .',';	
	echo "\n";      
	     }
	 }
	 echo '  }; </script>';

?>		


<?php
echo '	<div class="row">
<div class="col-md-10 col-md-offset-1">
        <div class="box box-solid bg-light-blue-gradient">
                   <div class="box-header">
                     <!-- tools box -->
                     <div class="pull-right box-tools">
                       <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range">
                         <i class="fa fa-calendar"></i></button>
                       <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                         <i class="fa fa-minus"></i></button>
                     </div>
	 <i class="fa fa-map-marker"></i>
	<h3 class="box-title">
                Kunder i dessa län
              </h3>
            </div>
            <div class="box-body">
              <div id="map" style="height: 450px; width: 100%;"></div>
            </div>
            <!-- /.box-body-->
            
          </div>
          <!-- /.box --> </div> </div>	  ';

/* denna funktion använder tabellen SE för att matcha postnummer med länkod ... */
	  $result = mysqli_query($con,"SELECT lankod,COUNT(*) AS antal
	  FROM SE 
	  WHERE postnr= ANY (SELECT KUND.postnr FROM KUND)
	  GROUP BY lankod;");

         mysqli_close($con);

      $row_cnt = $result->num_rows;
      $counter = 0;

      
      echo ' <script> //jvectormap data
    var kundData = { ';
    while ($row = mysqli_fetch_array($result)) {
        if (++$counter == $row_cnt) {
    	    echo "\n"; 
    	 echo '"'. $row['lankod'] .'": '. $row['antal'] .'';   
    	  echo "\n";  
    	     } else {	     
    	echo '"'. $row['lankod'] .'": '. $row['antal'] .',';	
    	echo "\n";      
    	     }
    	 }
	 echo "\n"; 
	 echo "\n"; 
    	 echo '  }; </script>';


		 

?>


<?php include 'footer.php'; ?>
