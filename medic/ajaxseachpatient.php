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
$result = $db->searchPatientByHMS($data->str);
?>
<br>
<table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Hospital Number</th>
                        <th>Phone</th>
                        <th></th>
                      </tr>

                     </thead>
          <?php foreach($result as $one){ ?>
                     <tr>
                  <td><?php echo $one["FirstName"] ?></td>
                  <td><?php echo $one["LastName"] ?></td>
                  <td><?php echo $one["HospitalNo"] ?></td>
                  <td><?php echo $one["Phone"] ?></td>
                  <td><button onclick="openVitalSignsForm('<?php echo $one["HospitalNo"]?>')"> Open </button></td>   

              		 </tr>
        <?php } ?>
</table>
