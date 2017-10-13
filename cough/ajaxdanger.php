
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
    <div style=" margin-left:30px; border:10px solid red; width:97%;  padding-bottom:30px;  padding-left:20px">
      <h3 style="color:red">Emergency (Cough)</h3>
      <div id="infoo"></div>
      <h4>Management</h4>
      <ul>
        <li>Give face mask oxygen (if known COPD give 24-28% face mask oxygen).</li>
        <li>If Known sickle cell disease, give oral rehydration solution. If unable to drink <?php if($staffData["Level"] == 1){ ?>
        <button onclick="sendToPending('<?php echo $_SESSION["caseId"]?>', '2','Give soduim chloride 0.9% 500mL IV 6 hourly . Stop if breathing worsens' )">Transfer to higher cadre </button>
         <?php } else{ ?> Give soduim chloride 0.9% 500mL IV 6 hourly . Stop if breathing worsens <?php }
         ?></li>
       </ul>
       <br>

         <div style="padding:2%; width:94%; background-color:#fff; border:1px solid #ccc; margin-bottom:10px">
           <br>
           If Wheeze/tight chest, no leg swelling: <strong>asthma/COPD exacerbation</strong> likely
             <ul>
            <li>Give inhaled salbutamol via spacer 400-800mcg (4-8 puffs) or nebulise 1mL salbutamol 0.5% solution chloride every 20 minutes</li>
            <li>If no response or predinisolone, give   predinisolone 40mg orally or hydrocortisone 100mg IV </li>
            <li>If no better after 1 hour, add inhaled iprattorium bromide via spacer 40mcg(2 puffs) every 2 -4 hours. Continue salbutamol as above
              with oxygen in between</li>
              <li>If better, give routine care: asthma
         </div>

         <div style="padding:2%; width:94%; background-color:#fff; border:1px solid #ccc;">
           <br>
          Temperature >= 37.5 : <strong> Chest infection </strong> likely
          <ul>
          <li>Give ceftriaxone 1g IV/IM </li>
          <li><?php $bp = explode("/", $caseDetails["bp"]); $value =  $bp[0];?>
            <?php if($value > 90){
              if($staffData["Level"] == 1){ ?>
            <button onclick="sendToPending('<?php echo $_SESSION["caseId"]?>', '2','Give soduim chloride 0.9% 500mL IV 6 hourly . Stop if breathing worsens' )">Transfer to higher cadre </button>
             <?php } else{ ?> Give soduim chloride 0.9% 500mL IV 6 hourly . Stop if breathing worsens <?php }
            }?>
          </li>
          </ul>
        </div><br>

        <div style="padding:2%; width:94%; background-color:#fff; border:1px solid #ccc;">
          <br>
         Sudden onset diffuse rash or facial/tongue swelling,  <strong> anaphylaxis </strong> likely
         <ul>
         <li>Eleveate legs </li>
         <li> Give immediately adrenaline 0.5mL (1:1000 solution) IM into mid outer thigh and promethazine 25mg IV

           <?php if($staffData["Level"] == 1){ ?>
         <button onclick="sendToPending('<?php echo $_SESSION["caseId"]?>', '2',' and Give promothazine 25mg IV and hydrocortisone every 5-15 minutes if needed' )">Transfer to higher cadre </button>
          <?php } else{ ?> Give soduim chloride 0.9% 500mL IV 6 hourly . Stop if breathing worsens <?php }?>
        </li>


        <?php if($staffData["Level"] == 1){ ?>
          <li>
      <button onclick="sendToPending('<?php echo $_SESSION["caseId"]?>', '2','Give soduim chloride 0.9% 500mL IV 6 hourly . Stop if breathing worsens' )">Transfer to higher cadre </button>
       <?php } else{ ?> Give soduim chloride 0.9% 500mL IV 6 hourly . Stop if breathing worsens <?php }?>
     </li>




         <li><?php $bp = explode("/", $caseDetails["bp"]); $value =  $bp[0];?>
           <?php if($value > 90){
             if($staffData["Level"] == 1){ ?>
           <button onclick="sendToPending('<?php echo $_SESSION["caseId"]?>', '2','Give soduim chloride 0.9% 500mL IV 6 hourly . Stop if breathing worsens' )">Transfer to higher cadre </button>
            <?php } else{ ?> Give soduim chloride 0.9% 500mL IV 6 hourly . Stop if breathing worsens <?php }
           }?>
         </li>
         </ul>
       </div>

<br>

       <div style="padding:2%; width:94%; background-color:#fff; border:1px solid #ccc;">
         <br>
        Sudden breathlessness, more resonant/decreased breath sounds/ chest pain on one side, deviated trachea,  : <strong> tension pneumothorax  </strong> likely
        <ul>
        <li>Insert large bore cannula above 3rd rib in mid-clavicular line </li>
        <li>Refer for urgent chest tube </li>
        <li><?php $bp = explode("/", $caseDetails["bp"]); $value =  $bp[0];?>
          <?php if($value > 90){
            if($staffData["Level"] == 1){ ?>
          <button onclick="sendToPending('<?php echo $_SESSION["caseId"]?>', '2','Give soduim chloride 0.9% 500mL IV 6 hourly . Stop if breathing worsens' )">Transfer to higher cadre </button>
           <?php } else{ ?> Give soduim chloride 0.9% 500mL IV 6 hourly . Stop if breathing worsens <?php }
          }?>
        </li>
        </ul>
      </div>




    </div>
    <br><br>
