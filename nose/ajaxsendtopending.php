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
$data->ailment = "Runny/blocked nose";

$db->sendToPending($data);

?>
