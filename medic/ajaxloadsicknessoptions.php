<?php
session_start();
require_once("../pdo/database.php");

if(!isset($_SESSION["subadmin"])){

echo 504;
exit;
}
$data = json_decode($_POST["data"]);

$db = new Database();
$one = $db->searchCaseByCaseId($data->caseId);
?>
<br>
<br>
<div class="row" style="margin-left:20px">
            <!-- left column -->
            <div class="col-md-10">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <!-- form start -->

<div class="box-body">
<table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Treatment Id</th>
                        <th>Blood Pressure</th>
                        <th>Temperature</th>
                        <th>Height</th>
                        <th>Age</th>
                        <th>HospitalNo</th>
                        <th>Date</th>

                      </tr>

                     </thead>

                     <tr>
                  <td><?php echo $one["caseId"] ?></td>
                  <td><?php echo $one["bp"] ?></td>
                  <td><?php echo $one["temperature"] ?></td>
                  <td><?php echo $one["height"] ?></td>
                  <td><?php echo $one["age"] ?></td>
                  <td><?php echo $one["HospitalNo"] ?></td>
                    <td><?php echo $one["Date"] ?></td>


              		 </tr>

</table>
<br><br>

<div class="form-group">
  <label for="exampleInputPassword1">Symtoms</label><br>
    <input type="text" id="symtoms" onkeyup="popupSymtoms('<?php echo  $data->caseId?>', '<?php echo $data->hospitalNo?>')">

</div>


<div id="rest"></div>

</div>
</div>
</div>
