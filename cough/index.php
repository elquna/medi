<?php
session_start();
if(!isset($_SESSION["subadmin"])){
	header("location:../index.php");
}
require_once("../pdo/database.php");
$db = new Database();
$staffData =  $db->getStaffDetails($_SESSION["subadmin"]);

if(!isset($_SESSION["hospitalNo"])){

header("location:../index.php");
exit;
}
$patient = $db->getPatientsByHMS($_SESSION["hospitalNo"]);
$caseDetails = $db->searchCaseByCaseId($_SESSION["caseId"]);


if(!$db->existCaseCough($_SESSION["caseId"])){
	//echo $_SESSION["caseId"];
	$db->InsertIntoCough($_SESSION["caseId"],  $caseDetails["bp"]);
}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Electronical Medical Diagnosis</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">E-Diagnosis</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          Cough
          </a>
          <div class="navbar-custom-menu">
            <!--up navigation space-->
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <P>Medic</P>

            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">



             <li>
              <a  href="../medic"><i class="fa fa-folder"></i> <span>Back</span></a>
            </li>







          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content goes here -->

            <div id="actionarea">

			<br /><br />


 <div class="row" style="width:95%; margin-left:2%">



            <div class="col-md-6 col-sm-6 col-xs-12" id="dbw">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Difficulty in breathing worse on lying flat <br> and leg swelling :heart failure ?</span>
               <button onclick="doss('dbw','yes')">Yes</button>    <button onclick="doss('dbw','no')" >No</button>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->


			<div class="col-md-6 col-sm-6 col-xs-12" id="2">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Blood Pressure : <?php echo $caseDetails["bp"] ?> </span><br>

                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

			 <div class="col-md-6 col-sm-6 col-xs-12" id="rdb">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Rapid deep breathing with <br> glucose > 11mmol/L ?</span>
               <button onclick="doss('rdb','yes')">Yes</button>    <button onclick="doss('rdb','no')" >No</button>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->


			<div class="col-md-6 col-sm-6 col-xs-12" id="rr">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Respiratory Rate  > 25 ?</span><br>
               <button onclick="doss('rr','yes')">Yes</button>    <button onclick="doss('rr','no')" >No</button>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

			<div class="col-md-6 col-sm-6 col-xs-12" id="ca">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Confused or agitated ?</span><br>
               <button onclick="doss('ca','yes')">Yes</button>    <button onclick="doss('ca','no')" >No</button>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->



						<div class="col-md-6 col-sm-6 col-xs-12" id="brw">
										<div class="info-box">
											<span class="info-box-icon bg-aqua"><i class="fa"></i></span>
											<div class="info-box-content">
												<span class="info-box-text">Breathless at rest or while talking ?</span><br>
										 <button onclick="doss('brw','yes')">Yes</button>    <button onclick="doss('brw','no')" >No</button>
											</div><!-- /.info-box-content -->
										</div><!-- /.info-box -->
									</div><!-- /.col -->




			<div class="col-md-6 col-sm-6 col-xs-12" id="cu">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Coughing up >= 1 tablespoon of fresh <br> blood ?</span>
               <button onclick="doss('cu','yes')">Yes</button>    <button onclick="doss('cu','no')" >No</button>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->




						<div class="col-md-6 col-sm-6 col-xs-12" id="diagnose">
										<div class="info-box">
											<span class="info-box-icon bg-aqua"><i class="fa"></i></span>
											<div class="info-box-content">
												<span class="info-box-text">Diagnose</span><br>
										 <button onclick="diagnoseC('<?php echo  $_SESSION["caseId"]; ?>')" style="width:100px; height:40px; background:grey; border:1px solid grey; color:#fff">Submit</button>
											</div><!-- /.info-box-content -->
										</div><!-- /.info-box -->
									</div><!-- /.col -->


									<div class="col-md-6 col-sm-6 col-xs-12">
													<div id="redd"></div>
												</div><!-- /.col -->


  </div>  <!--end row-->















			</div><!-- ends actionarea-->

      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b>1.0
        </div>
        <strong>  [<?php echo $staffData["StaffType"]?> ] ........<?php echo $staffData["FirstName"] . "  ". $staffData["LastName"] ?>&nbsp &nbsp
		[Patient]......<?php  echo $patient["FirstName"]. "  ".$patient["LastName"]?></strong>
      </footer>

      <!-- Control Sidebar -->

      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="../https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!--  <script src="../dist/js/pages/dashboard.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <script src="cough.js"></script>
  </body>
</html>
