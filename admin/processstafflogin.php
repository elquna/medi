<?php
session_start();
require_once("../includes.php");

$data = json_decode($_POST["data"]);

$username = $data->username;
$password = $data->password;
$password = base64_encode($password);

$db = new Database();
$response = $db->loginSubAdmin($username, $password);
if($response["count"] == 1){
$_SESSION["subadmin"] = json_encode($response["staffdata"]);	
echo 505;
}
else{
	echo 900;
}

?>