
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


function finish($row, $data)
{
  $db = new Database();
  $one = 0; $two = 0;
  if(($row["dbw"] == "yes" ))
  {
    $one = 1;
  }
    if( ($row["rdb"] == "yes") ||  ($row["rr"] == "yes")   ||  ($row["ca"] == "yes" )
   || ($row["brw"] == "yes")   ||  ($row["cu"] == "yes"))
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





$data = json_decode($_POST["data"]);

$row = $db->getCoughCaseDetails($data->caseId);
//var_dump($row);
if(($row["dbw"] == NULL ) || ($row["rdb"] == NULL) ||  ($row["rr"] == NULL)   ||  ($row["ca"] == NULL )  ||
($row["brw"] == NULL)   ||  ($row["ca"] == NULL)   )
{
  echo 111;
  die;
}
else{

            finish($row, $data);
}




 ?>
