<?php

session_start();

if(!isset($_SESSION["superadmin"])){ //$_SESSION["superadmin"]

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
                  <h3 class="box-title">Add New Patient</h3>
                </div><!-- /.box-header -->
                <!-- form start -->

                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputPassword1">First Name</label>
                      <input type="text" class="form-control" id="f"  maxlength="20">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Last Name</label>
                      <input type="text" class="form-control" id="l"  maxlength="20">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Phone Number</label>
                      <input type="text" class="form-control" id="phone"  maxlength="20">
                    </div>

                     <div class="form-group">
                      <label for="exampleInputPassword1">Address</label>
                      <input type="text" class="form-control" id="address"  maxlength="200">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Blood Group</label>
                      <input type="text" class="form-control" id="bloodg"  maxlength="20">
                    </div>

                     <div class="form-group">
                      <label for="exampleInputPassword1">Genotype</label>
                      <input type="text" class="form-control" id="genotype"  maxlength="10">
                    </div>

                     <div class="form-group">
                      <label for="exampleInputPassword1">Gender</label>
                      <input type="text" class="form-control" id="gender"  maxlength="10">
                    </div>

                    <div class="form-group">
                     <label for="exampleInputPassword1">Height</label>
                     <input type="text" class="form-control" id="height"  maxlength="10">
                   </div>



                     <div class="form-group">
                      <label for="exampleInputPassword1">Age</label>
                      <input type="text" class="form-control" id="birthday"  maxlength="20">
                    </div>

                     <div class="form-group">
                      <label for="exampleInputPassword1">State of Origin</label>
                      <input type="text" class="form-control" id="state"  maxlength="20">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">Local Government Area</label>
                      <input type="text" class="form-control" id="lga"  maxlength="20">
                    </div>

                     <div class="form-group">
                      <label for="exampleInputPassword1">Nationnality</label>
                      <input type="text" class="form-control" id="nation"  maxlength="20">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Choose Password</label>
                      <input type="password" class="form-control" id="password1" maxlength="20">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Confirm Password</label>
                      <input type="password" class="form-control" id="password2" maxlength="20">
                    </div>


                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" onClick="processaddpatient()">Submit</button>
                  </div>

                  <div id="errorspot"></div>

              </div><!-- /.box -->
              </div></div>
