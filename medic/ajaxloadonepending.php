<?php
session_start();
if(!isset($_SESSION["subadmin"])){
	header("location:../index.php");
}
require_once("../pdo/database.php");
$db = new Database();

$data = json_decode($_POST["data"]);

$getPendingDetails = $db->fetchTreatsmentsForPending($data->caseId);

$patientDetails = $db->loadPatientDetailsCaseId($data->caseId);
//print_r($patientDetails);



?>
<br>
<div class="row" style="margin-left:20px">
            <!-- left column -->
            <div class="col-md-10">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Pending Treatment for TreatmentId :<?php echo $data->caseId ?> </h3><br>
									<h4>Patient :  <?php echo $patientDetails["FirstName"]. " ".$patientDetails["LastName"] ?>

                </div><!-- /.box-header -->


<table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Treatment Id</th>
                        <th>Ailment</th>
											  <th>Treatment </th>

                      </tr>

                     </thead>
          <?php foreach($getPendingDetails as $free){ ?>
                     <tr>
										<td><?php echo $free["caseid"] ?></td>
										<td><?php echo $free["ailment"] ?></td>
                    <td><?php echo $free["treatment"] ?></td>

              		 </tr>
        <?php } ?>
				<tr><td></td>   <td></td>   <td><button onclick="closeTreatment('<?php echo $data->caseId ?>')">Close case </button></td> </tr>
</table>



</div>
</div>
</div>
