<?php

session_start();

if(!isset($_SESSION["superadmin"])){

echo 504;
exit;
}?>
<br>
<div class="row" style="margin-left:20px">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Staff</h3>
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
                      <input type="text" class="form-control" id="ph"  maxlength="20">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Address</label>
                      <input type="text" class="form-control" id="ad"  maxlength="200">
                    </div>


                    <div class="form-group" >
                      <label>Staff type</label>
                      <select class="form-control" id="stafftype">
                        <option value=""></option>
                        <option>DOCTOR</option>
                        <option>NURSE</option>
                        <option>MID-WIFE</option>
                        <option>CHO</option>
                        <option>CHEW</option>
                         <option>JCHEW</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Create Username</label>
                      <input type="text" class="form-control" id="username"  maxlength="20">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Create Password</label>
                      <input type="password" class="form-control" id="password" maxlength="20">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Confirm Password</label>
                      <input type="password" class="form-control" id="password2" maxlength="20">
                    </div>


                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" onClick="processaddstaff()">Submit</button>
                  </div>

                  <div id="errorspot"></div>

              </div><!-- /.box -->
              </div></div>
