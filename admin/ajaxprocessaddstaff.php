<?php

session_start();
if(!isset($_SESSION["superadmin"])){ //$_SESSION["superadmin"]

echo 504;
exit;
}?>

<?php
require_once("../pdo/database.php");





$data = json_decode($_POST["data"]);



$database = new Database();
/*$checkusername = $database->checkUsername($data->username);
if($checkusername > 0){
	echo 350;
	exit;
}*/
if($data->stafftype == "MEDICAL-OFFICER"){ $level = 4;}
if($data->stafftype == "NURSE"){ $level = 3;}
if($data->stafftype == "CHO"){ $level = 3;}
if($data->stafftype == "MID-WIFE"){ $level = 3;}
if($data->stafftype == "CHEW"){ $level = 2;}
if($data->stafftype == "JCHEW"){ $level = 1;}

 if($database->addStaff($data->firstname, $data->lastname, $data->phone, $data->address, $data->stafftype, $data->username, $data->password, $level)){?>
	 <div class="row" style="margin-left:20px">
	             <div class="col-md-6">
								 <strong>New Staff Added </strong>
							 </div>
	</div>
 <?php }
 else{?>

	 <div class="row" style="margin-left:20px">
	             <div class="col-md-6">
								 <strong>Sorry something went wrong</strong>
							 </div>
	</div>

<?php }
?>
