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


/*if(!$db->existCaseCough($_SESSION["caseId"])){
	//echo $_SESSION["caseId"];
	$db->InsertIntoCough($_SESSION["caseId"],  $caseDetails["bp"]);
}*/
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
          Runny or blocked Nose
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


 <div class="row" style="width:90%; margin-left:2%">


	 <div class="col-md-12" style="border:1px solid #ccc; background-color:#fff; margin-bottom:10px; padding-top:10px; padding-bottom:10px; text-align:center">
		 <strong>Runny or blocked nose <br>
			 Ask about duration and associated symptoms </strong>
	 </div>
	 <br><br>


	 <div class="col-md-3">
		 <div style="border:1px solid #ccc; background-color:#fff;  padding-top:10px; padding-bottom:10px; text-align:center; width:100%">
     <strong>Sore throat or fever </strong>
		 <br>
		 <p>Body aches/muscle pains or chills ?</p>
		 <button onclick="notopain()">No</button> &nbsp; &nbsp  <button onclick="yestopain()">Yes</button>

     <br><br>
		 <div id="read"></div>
     </div>
	</div>

	<div class="col-md-3" >
		<div style="border:1px solid #ccc;  background-color:#fff;  padding-top:10px; padding-bottom:10px; text-align:left; padding-left:5%">
		<strong>pain when pushing on fore head or cheek/s, headache, recent common cold: </strong><br>

		<strong>Sinusitis </strong> likely
 <div style="width:90%; margin-left:5%; text-align:left; border:1px solid #ccc; padding:2%">
		<li>Give paracetamol 1g orally 6 hourly as needed for up to 5 days. </li>
		<li> If neck stiffness/meningism, tooth infection, swelling over sinus or around eye, refer next higher cadre </li>

		<li>If patient has recurrent sinusitis, test for HIV </li>

	  <li>If discharge for > 10 days or symptoms worsen after initial improvement, give antibiotic:<br>
	    - Is there risk of severe infection (> 65 years, alcohol abuse or impaired immunity)?<br>
			<button onclick="yesrisk()">Yes</button> &nbsp; &nbsp  <button onclick="norisk()">No</button>
<br><br>
<div id="risk"></div>

</div>
 </div>
 </div>



 <div class="col-md-3">
	 <div style="border:1px solid #ccc;  background-color:#fff; padding-top:10px; padding-bottom:10px; text-align:center">
	 <strong>Recurrent episodes of sneezing and itchy nose on most days for more than 2 weeks. May have itchy eyes, ears or throat</strong>
	 <br>
	 <div style="width:90%; margin-left:5%; text-align:left; border:1px solid #ccc; padding:2%">
		<li>Advise patient to identify and avoid allergens that worsens / trigger symptoms </li>
		<li>Give loratadine 10mg orally daily for up to 5 days only when symptoms worsens </li>

	 <li> If symptoms occurs on >= 4 days per week, for > 1 month, give beclometasone nasal spray long term 100mcg (2 sprays) in each nostril
	   daily. Once symptoms controlled, use lowest effective dose to maintain control.</li>
	   <li>If no improvement and symptoms debilitatiting, refer medical officer </li>
	 </div>
 </div>
</div>



<div class="col-md-3">
<div style="border:1px solid #ccc;  background-color:#fff; padding-top:10px; padding-bottom:10px; text-align:center">
<strong>Running Nose </strong>
<div id="infoo"></div>
<br>
<div style="width:90%; margin-left:5%; text-align:left; border:1px solid #ccc; padding:2%">
<ul>
	<li>Firmly Pinch nostrils together for minutes </li>

	<li><?php $bp = explode("/", $caseDetails["bp"]); $value =  $bp[0];?>
		<?php if($value < 90){
			if($staffData["Level"] < 4 ){ ?>
		<button onclick="sendToPending('<?php echo $_SESSION["caseId"]?>', '4','give sodium chloride 0.9% 500mL IV rapidly repeat till systolic BP > 90 continue 1L 6 hourly. Stop if breathing worsens' )">Transfer to higher cadre  due to BP conditions</button>
		 <?php } else{ ?> give sodium chloride 0.9% 500mL IV rapidly, repeat till systolic BP > 90, continue 1L 6 hourly. Stop if breathing worsens <?php }
		}?>
	</li>
	<li>If still bleeding :<br>
		<?php if($staffData["Level"] < 4 ){ ?>
	<button onclick="sendToPending('<?php echo $_SESSION["caseId"]?>', '4','	Insert lubricated ribbon guaze or guaze soaked in 1mg of adrenaline diluted in 200ml saline into bleeding nostril(s)' )">Transfer to higher cadre  For More treatment</button>
	 <?php } else{ ?> Insert lubricated ribbon guaze or guaze soaked in 1mg of adrenaline diluted in 200ml saline into bleeding nostril(s) <?php }?>

</li>
<li>If patient has recurrent episodes :<br> advise patient to apply petroleum jelly or saline spray inside nostrils and avoid nose
	picking or rubbing contact sports and trauma to nose </li>
<li>Advise patient to avoid aspirin and NSAIDS (e.g Ibuprofen) as they may prolong bleeding</li>
<li>Educate patient to firmly pinch nostrils together if bleeding occurs </li>

</ul>
</div>
</div>
</div>



</div><!--end row-->










			</div><!-- ends actionarea-->

      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b>1.0
        </div>
        <strong>  [<?php echo $staffData["StaffType"]?> ] ........<?php echo $staffData["FirstName"] . "  ". $staffData["LastName"] ?>&nbsp &nbsp
		[Patient]......<?php  echo $patient["FirstName"]. "  ".$patient["LastName"]?></strong>
      </footer>
  <?php $db->offFromCases($_SESSION["caseId"]);?>
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
    <script src="nose.js"></script>
  </body>
</html>
