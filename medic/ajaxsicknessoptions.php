<?php
session_start();
require_once("../pdo/database.php");

if(!isset($_SESSION["subadmin"])){

echo 504;
exit;
}
$data = json_decode($_POST["data"]);

$_SESSION["caseId"] = $data->caseId;
$_SESSION["hospitalNo"] = $data->hospitalNo;

?>
<br>


<div class="box-body">
<table id="example2" class="table table-bordered table-hover">



<tr>  <td><a href="../fevercase/" ><span class="info-box-number">Fever</span></a></td></tr>

<tr>  <td><a href="../sorethroat/" ><span class="info-box-number">Sore Thraot</span></a></td> </tr>

<tr>  <td><a href="../nose/" ><span class="info-box-number">Block / Running Nose</span></a></td></tr>


<tr>  <td><a href="../cough/" ><span class="info-box-number">Cough</span></a></td></tr>

              		 </tr>

</table>
<br><br>







<div id="rest"></div>

</div>
