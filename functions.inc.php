<?php

function artiklar()
{
	
	include "data.php";

    $result = mysqli_query($con,"SELECT YEAR(dat) AS yeardat, artnr, 
   SUM(CASE WHEN konto!='3051' AND kredit_fl='T' THEN antal1 ELSE 0 END) -
   SUM(CASE WHEN konto!='3051' AND kredit_fl='F' THEN antal1 ELSE 0 END) +
   SUM(CASE WHEN konto='3051' AND kredit_fl='T' THEN antal1 ELSE 0 END) -
   SUM(CASE WHEN konto='3051' AND kredit_fl='F' THEN antal1 ELSE 0 END) as 'TOTALANT'
FROM `ARTRAD`
WHERE artnr='".$_POST['artikelnr']."' AND dat BETWEEN '2008-01-01' AND CURDATE( )
GROUP BY YEAR(dat)");

$data = array();

while ($row = mysqli_fetch_assoc($result))
{
    $data[] = $row;
}


echo '    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
		Försäljningstatistik för artikel '.$_POST["artikelnr"].'
        <small>Indelat per år</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
         
	          <div class="box">
	            <div class="box-body">
	              <table class="table table-bordered">  
                  <tr><th>År</th><th>Antal</th></tr>';  
	  			foreach ($data as $row)
	  			  {
	  			  echo "<tr>";
	  			  echo "<td>" . $row['yeardat'] . "</td>";
	  			  echo "<td>" . $row['TOTALANT'] . "</td>";
	  			  echo "</tr>";
	  			  }
	  			echo '</table></div></div>
	  

			                <!-- solid sales graph -->
			                <div class="box box-solid bg-teal-gradient">
			                  <div class="box-header">
			                    <i class="fa fa-th"></i>

			                    <h3 class="box-title">Försäljning per år av artikel '.$_POST["artikelnr"].'</h3>

			                    <div class="box-tools pull-right">
			                      <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
			                      </button>
			                      <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
			                      </button>
			                    </div>
			                  </div>
			                  <div class="box-body border-radius-none">
			                    <div class="chart" id="line-chart" style="height: 250px;"></div>
			                  </div>
			                  <!-- /.box-body -->

			                </div>
			                <!-- /.box -->
					</div> <!-- /col-md-6-->
					
<div class="col-md-6">

<!-- DONUT CHART -->
 <div class="box box-danger">
   <div class="box-header with-border">
     <h3 class="box-title">Försäljning per år av artikel '.$_POST["artikelnr"].'</h3>

     <div class="box-tools pull-right">
       <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
       </button>
       <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
     </div>
   </div>
   <div class="box-body chart-responsive">
     <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
   </div>
   <!-- /.box-body -->
 </div>
 <!-- /.box -->

</div> <!-- /col-md-6-->




</div></div>
    </section>
    <!-- /.content -->';

echo "\n";    
echo "    <script>
        // LINE CHART
    new Morris.Line({
          element: 'line-chart',
          resize: true,
    data: [";
    
foreach ($data as $row)
  {
  echo "{ year:";
  echo " '". $row['yeardat'] ."',";
  echo "value: ". $row['TOTALANT'] ."},";
  }
echo "
        { year: '2007', value: 1 }
      ],
            xkey: 'year',
            ykeys: ['value'],
          labels: ['".$_POST['artikelnr']."'],
          lineColors: ['#3c8dbc'],
          hideHover: 'auto'
        });
    </script>";
 echo "\n";      
    echo "<script>
    //DONUT CHART
    new Morris.Donut({
      element: 'sales-chart',";
    echo  'resize: true,
      colors: ["#3c8dbc", "#f56954", "#00a65a", "#FFFF00", "#FFBF00", "#8000FF", "#58FA58"],
      data: [';
      foreach ($data as $row)
        {
        echo '{ label: "';
        echo "". $row['yeardat'] ."";
	echo  '",';
        echo " value: ". $row['TOTALANT'] ."},";
        }
       echo '{label: "2007", value: 0}';

  echo '    ],';
echo "      hideHover: 'auto'
    });
</script>";

}

function display()
{
   
	include "data.php";
	
$result = mysqli_query($con,"SELECT artnr,
   SUM(CASE WHEN konto!='3051' AND kredit_fl='T' THEN antal1 ELSE 0 END) - 
   SUM(CASE WHEN konto!='3051' AND kredit_fl='F' THEN antal1 ELSE 0 END) as 'ANTALEXP',
   SUM(CASE WHEN konto='3051' AND kredit_fl='T' THEN antal1 ELSE 0 END) -
   SUM(CASE WHEN konto='3051' AND kredit_fl='F' THEN antal1 ELSE 0 END) as 'ANTALSV',
   SUM(CASE WHEN konto!='3051' AND kredit_fl='T' THEN antal1 ELSE 0 END) -
   SUM(CASE WHEN konto!='3051' AND kredit_fl='F' THEN antal1 ELSE 0 END) +
   SUM(CASE WHEN konto='3051' AND kredit_fl='T' THEN antal1 ELSE 0 END) -
   SUM(CASE WHEN konto='3051' AND kredit_fl='F' THEN antal1 ELSE 0 END) as 'TOTALANT',
   SUM(CASE WHEN konto!='3051' AND kredit_fl='T' THEN belopp_i ELSE 0 END) -
   SUM(CASE WHEN konto!='3051' AND kredit_fl='F' THEN belopp_i ELSE 0 END) as 'BELEXP', 
   SUM(CASE WHEN konto='3051' AND kredit_fl='T' THEN belopp_i ELSE 0 END) -
   SUM(CASE WHEN konto='3051' AND kredit_fl='F' THEN belopp_i ELSE 0 END) as 'BELSV', 
   SUM(CASE WHEN konto!='3051' AND kredit_fl='T' THEN belopp_i ELSE 0 END) -
   SUM(CASE WHEN konto!='3051' AND kredit_fl='F' THEN belopp_i ELSE 0 END) +
   SUM(CASE WHEN konto='3051' AND kredit_fl='T' THEN belopp_i ELSE 0 END) -
   SUM(CASE WHEN konto='3051' AND kredit_fl='F' THEN belopp_i ELSE 0 END) as 'TOTAL' 
FROM `ARTRAD`
WHERE dat between '".$_POST['fromdate']."' AND '".$_POST['todate']."' AND typ='F' AND artnr= ANY (SELECT ART.artnr FROM ART WHERE ART.artgrp='".$_POST['artgrp']."') 
GROUP BY artnr");

echo'    <section class="content-header">
      <h1>
       Royaltyrapport
        <small>'.$_POST['artgrp'].' '.$_POST['fromdate'].'  TILL  '.$_POST['todate'].'</small>
      </h1>
      
    </section>
    
    <section class="content">
      <div class="row">
        <div class="col-md-12">
	<div class="box box-primary">
    ';
 
echo "<table class='table'>
<tr>
<th>Artikelnummer</th>
<th>Exportantal</th>
<th>Antalsverige</th>
<th>Totaltantal</th>
<th>Beloppexport</th>
<th>Beloppsv</th>
<th>Totalbelopp</th>
</tr>";

// while ($row = mysql_fetch_array($result))
while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['artnr'] . "</td>";
  echo "<td>" . $row['ANTALEXP'] . "</td>";
  echo "<td>" . $row['ANTALSV'] . "</td>";
  echo "<td>" . $row['TOTALANT'] . "</td>";
  echo "<td>" . $row['BELEXP'] . "</td>";
  echo "<td>" . $row['BELSV'] . "</td>";
  echo "<td>" . $row['TOTAL'] . "</td>";
  echo "</tr>";
  }
echo "</table></div></div></div></section>";


}

?>
