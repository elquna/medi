<?php
session_start();
require_once("../pdo/database.php");

$data = json_decode($_POST["data"]);

$username = $data->username;
$password = $data->password;
$password = base64_encode($password);

$db = new Database();
$response = $db->loginAdmin($username, $password);
if($response == 1){
$_SESSION["superadmin"] = "superadmin";	
echo "true";
}
else{
	echo "wrong";
}

?>