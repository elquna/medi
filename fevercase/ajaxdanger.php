
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

$caseDetails = $db->searchCaseByCaseId($_SESSION["caseId"]);

$staffData =  $db->getStaffDetails($_SESSION["subadmin"]);

?>

   <br><br>
    <div style=" margin-left:30px; border:10px solid red; width:90%; min-height:300px; padding-left:20px">
      <h3 style="color:red">Emergency</h3>
      <div id="infoo"></div>
      <h4>Management</h4>
      <ul>
        <li> if BP < 90/60  <?php if($staffData["Level"] == 1){ ?>
        <button onclick="sendToPending('<?php echo $_SESSION["caseId"]?>', '2','Give soduim chloride 0.9% 500mL IV 6 hourly . Stop if breathing worsens' )">Transfer to higher cadre </button>
         <?php } else{ ?> Give soduim chloride 0.9% 500mL IV 6 hourly . Stop if breathing worsens <?php }
         ?></li>

        <li>If Known sickle cell disease, give oral rehydration solution. If unable to drink, <?php if($staffData["Level"] == 1){ ?>
        <button  onclick="sendToPending('<?php echo $_SESSION["caseId"]?>', '2','Give soduim chloride 0.9% 500mL IV 6 hourly . Stop if breathing worsens' )">Transfer to higher cadre </button> <?php } else{ ?> Give soduim chloride 0.9% 500mL IV 6 hourly . Stop if breathing worsens <?php }
         ?></li><br>
         <li>Give cetriaxone 2g IV/IM. If meningitis suspected and >= 50 years or impaired immunity also
           <?php if($staffData["Level"] == 1){ ?>
           <button  onclick="sendToPending('<?php echo $_SESSION["caseId"]?>', '2','give ampicillin 2g IV' )">Transfer to higher cadre  </button> <?php } else{ ?> give ampicillin 2g IV <?php } ?></li>
          <li>If malaria test positive :<br>
               - Give artesunate 2.4mg/Kg and<br>
               -If glucose < 3mmol/L <?php if($staffData["Level"] == 1){ ?>
               <button onclick="sendToPending('<?php echo $_SESSION["caseId"]?>', '2','Give 250mL of Glucose 10% IV. Repeat if glucose still')" >Transfer to higher cadre  </button> <?php } else{ ?>    Give 250mL of Glucose 10% IV. Repeat if glucose still
                 < 3mL after 15 minutes, continue glucose 5 % 1L 6 hourly IV.<?php }?></li>
      <li>If pregnant with travel to Zika area and any of : rash , joint pain or red lips during/within 2 weeks of travel, refer for specilaist investigation </li>
    <li> Refer hospital urgently and inform next higher cadre</li>
      </ul>


    </div>
