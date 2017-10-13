<?php
session_start();
require_once("../pdo/database.php");

if(!isset($_SESSION["subadmin"])){

echo 504;
exit;
}
$data = json_decode($_POST["data"]);
if(trim($data->str) == ""){ echo "<br>". "No result found"; die; }
$db = new Database();
$result = $db->fetchPendingCase();
?>
<br>
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
                        <th></th>
                      </tr>

                     </thead>
          <?php foreach($result as $one){ ?>
                     <tr>
                  <td><?php echo $one["caseId"] ?></td>
                  <td><?php echo $one["bp"] ?></td>
                  <td><?php echo $one["temperature"] ?></td>
                  <td><?php echo $one["height"] ?></td>
                  <td><?php echo $one["age"] ?></td>
                  <td><?php echo $one["HospitalNo"] ?></td>
                    <td><?php echo $one["Date"] ?></td>
                  <td><button onclick="selectCaseToTreat('<?php echo $one["caseId"]?>', '<?php echo $one["HospitalNo"] ?>')"> Open </button></td>

              		 </tr>
        <?php } ?>
</table>
