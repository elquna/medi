<?php
session_start();
require_once("../pdo/database.php");

$data = json_decode($_POST["data"]);

$username = $data->username;
$password = $data->password;


$db = new Database();
$response = $db->authenticateStaff($username, $password);
if($response == 1){
$_SESSION["subadmin"] = $username;
echo 505;
}
else{
	echo 900;
}

?>
