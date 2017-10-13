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

if($db->updateFeverTest($_SESSION["caseId"], $data->symtom, $data->answer)){ echo "donedeal";}else{ echo "failed";}
