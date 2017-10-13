<?php

session_start();

if(!isset($_SESSION["subadmin"])){

echo 504;
exit;
}?>
<br>
<div class="row" style="margin-left:20px">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Vital signs collection</h3>
                </div><!-- /.box-header -->
                <!-- form start -->

                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Patient Number</label>
                      <input type="text" class="form-control" id="f"  maxlength="20" onKeyUp="searchPatient(this.value)">
                    </div>



                 	<div id="res"></div>

              </div><!-- /.box -->
              </div></div>
