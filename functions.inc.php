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


echo '
      <script>var areaChartData = {
      labels: ["2008", "2009", "2010", "2011", "2012", "2013", "2014", "2015", "2016"],
      datasets: [
        {
          label: " '.$_POST["artikelnr"].' ",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: ['; foreach ($data as $row)
  {
  echo " ". $row['TOTALANT'] . ",";
  } echo ']
        },
        {
          label: " ",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [1, 1, 1, 1, 1, 1, 1, 1, 1]
        }
      ]
    };
	
	
    var PieData = [
      '; foreach ($data as $row)
	  {
	  echo "{"; 
	  echo "value:";
	  echo " ".$row['TOTALANT'] .",";
	  echo ' color: "#f56954", highlight: "#f56954", label:';
	  echo " ".$row['yeardat'] ."},";
	  } 
      echo '{
        value: 0,
        color: "#d2d6de",
        highlight: "#d2d6de",
        label: ""
      }
    ];	
		
	</script>';



echo '    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
		Försäljningstatistik för artikel '.$_POST["artikelnr"].'
        <small>Indelat per år</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Charts</a></li>
        <li class="active">ChartJS</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Area Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="areaChart" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Donut Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChart" style="height:250px"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
       

        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Line Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="lineChart" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Bar Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->
	  
	  
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
	  			echo '</table> </div></div></div></div>
	  

    </section>
    <!-- /.content -->';
    


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
