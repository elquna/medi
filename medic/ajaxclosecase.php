<?php
session_start();
require_once("../pdo/database.php");

if(!isset($_SESSION["subadmin"])){

echo 504;
exit;
}
$data = json_decode($_POST["data"]);
$db = new Database();

$db->closeCase($data->caseid);





?>
<br>
<div class="row" style="margin-left:20px">
            <!-- left column -->
            <div class="col-md-10">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Treatment  closed</h3><br>
									<?php die; ?>
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
