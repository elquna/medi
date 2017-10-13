<?php
session_start();
require_once("../pdo/database.php");

if(!isset($_SESSION["subadmin"])){

echo 504;
exit;
}
$data = json_decode($_POST["data"]);
$_SESSION["hospitalno"] = $data->hospitalno;
?>
<br /><br />
<div class="row" style="width:95%; margin-left:2%">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Fever</span>
                 <a href="../fevercase/" ><span class="info-box-number">Open</span></a>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Cough</span>
                  <span class="info-box-number">Open</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            
  </div>      
   
   <div class="row" style="width:95%; margin-left:2%">      
            
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Blocked / Running Nose</span>
                  <span class="info-box-number">Open</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Lower Abdominal Pain</span>
                  <span class="info-box-number">Open</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->