<?php
session_start();
require_once("../pdo/database.php");

if(!isset($_SESSION["subadmin"])){

echo 504;
exit;
}
$data = json_decode($_POST["data"]);

$db = new Database();
$result = $db->getPatientByHospitalNo($data->hospitalno);
?>
<br>

<div class="row" style="margin-left:20px">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Vital Sign Form</h3>
                </div><!-- /.box-header -->
                <!-- form start -->


<div class="box-body">

<br>
<strong> Vital Signs for  <?php echo $result["FirstName"]. " ". $result["LastName"];?></strong><br><br>


  <div class="form-group">
    <label for="exampleInputPassword1">Height</label>
    <input type="text" class="form-control" id="height"  maxlength="20"  readonly="" value="<?php echo $result["height"] ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Age</label>
    <input type="text" class="form-control" id="age"  maxlength="200"  readonly="" value="<?php echo $result["BirthDate"] ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Blood Pressure</label><br>
    <select id="bbp">
      <?php for($i = 0; $i < 200; $i++){ ?>
      <option ><?php echo $i; ?></option>
      <?php } ?>
    </select> /
    <select id="lbp">
      <?php for($i = 0; $i < 200; $i++){ ?>
      <option ><?php echo $i; ?></option>
      <?php } ?>
    </select>
  </div>


  <div class="form-group">
    <label for="exampleInputPassword1">Temperature</label>
    <input type="text" class="form-control" id="temp"  maxlength="200">
  </div>







</div><!-- /.box-body -->

<div class="box-footer">
  <button type="submit" class="btn btn-primary"
  onClick="processVitalSign('<?php echo $data->hospitalno ?>', '<?php echo $result["BirthDate"] ?>','<?php echo $result["height"] ?>')">Submit</button>
</div>

<div id="errorspot"></div>

</div><!-- /.box -->
</div></div>
