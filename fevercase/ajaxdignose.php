
<?php
session_start();
require_once("../pdo/database.php");
$db = new Database();



if(!isset($_SESSION["subadmin"])){

echo 504;
exit;
}



$data = json_decode($_POST["data"]);

function finish($row, $data)
{
  $db = new Database();
  $one = 0; $two = 0;
  if(($row["temperature"] > 37.5 ))
  {
    $one = 1;
  }
    if(($row["dca"] == "yes")  || ($row["rdu"] == "yes") ||  ($row["nsm"] == "yes")   ||  ($row["ebb"] == "yes" )
   || ($row["jaundice"] == "yes")   ||  ($row["sap"] == "yes")   || ($row["db"] == "yes")   ||   ($row["uts"] == "yes"))
  {
    $two = 1;
  }

  if(($one + $two) == 2){
    echo "220";

  }
  else{
    echo "120";
  }

  $db->offFromCases($data->caseId);

}







$row = $db->getFeverCaseDetails($data->caseId);
//var_dump($row);
if(($row["dca"] == NULL ) || ($row["rdu"] == NULL) ||  ($row["nsm"] == NULL)   ||  ($row["ebb"] == NULL )  ||
($row["jaundice"] == NULL)   ||  ($row["sap"] == NULL)   || ($row["db"] == NULL)   ||   ($row["uts"] == NULL) )
{
  echo 111;
  die;
}
else{

            finish($row, $data);
}




 ?>
