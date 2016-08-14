<html lang="sv-SE">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mycompany | Intranet</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="AdminLTE/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
   <link rel="stylesheet" href="AdminLTE/plugins/datatables/dataTables.bootstrap.css">
  <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="AdminLTE/plugins/datepicker/datepicker3.css">
<!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="AdminLTE/plugins/timepicker/bootstrap-timepicker.min.css">
<!-- Select2 -->
  <link rel="stylesheet" href="AdminLTE/plugins/select2/select2.min.css">
  <!-- Morris charts -->
  <link rel="stylesheet" href="AdminLTE/plugins/morris/morris.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="AdminLTE/dist/css/skins/skin-blue-light.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!-- jQuery 2.2.3 -->
<script src="AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="AdminLTE/plugins/morris/morris.min.js"></script>



<!-- bootstrap datepicker -->
<script src="AdminLTE/plugins/datepicker/bootstrap-datepicker.js"></script>

<!-- SlimScroll -->
<script src="AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="AdminLTE/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="AdminLTE/dist/js/app.min.js"></script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
<!-- DataTables -->
<script src="AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="AdminLTE/plugins/datatables/dataTables.bootstrap.min.js"></script>
<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">


  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Mycompanys</b> Intranet</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>

          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

<ul class="sidebar-menu">
<li class="header">Royaltyrapport</li>
</ul>




          <div class="box box-solid">
            <div class="box-body">
		    
		    <?php include 'data.php'; ?>	   
<form action="index.php" method="POST" > 
		    <div class="input-group">
		                      <label>Artikelgrupp:</label>
		                      <select class="form-control" name="artgrp">
		    <?php
		    $result = mysqli_query($con,"SELECT artgrp, benaemn FROM ARTGRP");

		    while($row = mysqli_fetch_array($result))
		      {
		      echo "<option value=". $row['artgrp'] .">". $row['benaemn'] . "</option>";
		      }
		    ?>
		                      </select>
		                    </div>
		

		
		   
		    
		    
              <!-- Date -->
              <div class="form-group">
                <label>Från datum:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="fromdate" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
	      
	      
              <div class="form-group">
                <label>Till datum:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="todate" class="form-control pull-right" id="datepicker1">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
	    <div class="form-group">
	            <span>
	              <button type="submit" name="royalty" class="btn btn-block btn-success"><i class="fa fa-search"></i> Submit
	              </button>
	            </span>
	    </div>
	   </form> 
            </div>
            </div>  
		


 <!-- /. search form article -->
 <ul class="sidebar-menu">
 <li class="header">Försäljningsstatistik</li>
 </ul>
           <div class="box box-solid">
             <div class="box-body">
		    
	   
 <form action="index.php" method="POST" > 
                    <div class="form-group">
                      <label>Artikelnummer:</label>

                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-question"></i>
                        </div>
                        <input type="text" name="artikelnr" class="form-control pull-right">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
		

 	    <div class="form-group">
 	            <span>
 	              <button type="submit" name="artiklar" class="btn btn-block btn-success"><i class="fa fa-search"></i> Submit
 	              </button>
 	            </span>
 	    </div>
 	   </form> 
             </div>
             </div>  
 		    <?php
 		    mysqli_close($con);
 		    ?>
 

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
