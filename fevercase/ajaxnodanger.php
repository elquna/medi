
<?php
session_start();
require_once("../pdo/database.php");
$db = new Database();
if(!isset($_SESSION["subadmin"])){

echo 504;
exit;
}

if(!isset($_SESSION["hospitalNo"])){

echo 504;
exit;
}

$data = json_decode($_POST["data"]);

?>

<?php

require_once("../pdo/database.php");
$db = new Database();
if(!isset($_SESSION["subadmin"])){

echo 504;
exit;
}

if(!isset($_SESSION["hospitalNo"])){

echo 504;
exit;
}

$data = json_decode($_POST["data"]);

$caseDetails = $db->searchCaseByCaseId($_SESSION["caseId"]);

$staffData =  $db->getStaffDetails($_SESSION["subadmin"]);

?>

   <br><br>
    <div style=" margin-left:30px; border:10px solid blue; width:90%; min-height:300px; padding-left:20px">
      <h3 style="color:blue">NONE- SERIOUS CASE (FEVER)</h3>
      <div id="infoo"></div>
      <h4>Management</h4>
      <div style="width:90%; text-align:center">


            <strong style="color:green">Carry Out Malaria Rapid Diagnostic Test</strong><br>
            <br>

            <button id="positiveone" style="color:red" onclick="dopositive()">Malaria Test Positive</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    <button id="negativeone" onclick="donegative()">Malaria Test Negative</button>
            <br>
      <div id="negative" style="text-align:center"></div>

      </div>



    </div>
    <br>
    <div style=" margin-left:30px; border:10px solid blue; width:90%; min-height:50px; padding-left:20px">
    <br>
    <a href="../cough"  target="_blank"> Cough </a>  &nbsp; &nbsp; &nbsp; |
    &nbsp; &nbsp; &nbsp; <a href="../sorethroat"  target="_blank"> Sore Throat </a>  &nbsp; &nbsp; &nbsp; |
  &nbsp; &nbsp; &nbsp;   <a href="../nose"  target="_blank">Running or blocked nose </a>  &nbsp; &nbsp; &nbsp;
    <br>
  </div>
    <br>
