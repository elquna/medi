
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

$caseDetails = $db->searchCaseByCaseId($_SESSION["caseId"]);

$staffData =  $db->getStaffDetails($_SESSION["subadmin"]);
    $db->offFromCases($_SESSION["caseId"]);
?>

   <br><br>
    <div style=" margin-left:30px; border:10px solid red; width:90%; min-height:100px; padding-left:20px">
      <h3 style="color:red">Emergency</h3>

      <h4>Management   (Sore Throat)</h4>
      <ul>
        <li>Refer hospital urgently and inform next higher cadre</li>
      </ul>


    </div>
