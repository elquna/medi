<?php
require_once("../pdo/database.php");


session_start();


$data = json_decode($_POST["data"]);

$dbPatient = new Database();
$response = $dbPatient->addPatient($data->firstname, $data->lastname, $data->phone, $data->address,$data->bloodgroup, $data->genotype, $data->gender,
$data->birthday, $data->state, $data->lga, $data->nation, $data->password1, $data->height);

if(is_array($response)){
	$lastInsertId = $response[0];
	$hospitalNo = $dbPatient->generateHospitalNumber($lastInsertId);

	$secondResponse = $dbPatient->UpdateHospitalNo($lastInsertId, $hospitalNo);
	$_SESSION["hospitalno"] = $hospitalNo;
	?>
    <br />
    <h2>Patient successfully Added with Hospital No:   <?php echo $hospitalNo; ?>

<?php
}
else{
	echo 404;
}
