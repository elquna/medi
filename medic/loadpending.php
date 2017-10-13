<?php
session_start();
if(!isset($_SESSION["subadmin"])){
	header("location:../index.php");
}
require_once("../pdo/database.php");
$db = new Database();
$staffData =  $db->getStaffDetails($_SESSION["subadmin"]);
$result = $db->fetchPendingCase($staffData["Level"]);

$multi = array();
foreach($result as $one){
	$oneRes = $db->fetchOnePending($one["caseid"]);
	array_push($multi, $oneRes);
}
//var_dump($multi);


?>
<br>
<div class="row" style="margin-left:20px">
            <!-- left column -->
            <div class="col-md-10">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Pending Treatments</h3><br>
									<strong> Note that  pending cases above your cadre level will not be visible to you </strong>
                </div><!-- /.box-header -->


<table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Treatment Id</th>
                        <th>Ailment</th>
												<th>Action</th>

                      </tr>

                     </thead>
          <?php foreach($multi as $free){ ?>
                     <tr>
										<td><?php echo $free["caseid"] ?>
										<td><?php echo $free["ailment"] ?>
										<td><button onclick="openPending(<?php echo $free['caseid'] ?>)">Open </button></td>
              		 </tr>
        <?php } ?>
</table>

</div>
</div>
</div>
