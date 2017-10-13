
<div style="background:#fff; width:95%; border:1px solid #ddd; min-height:200px; padding:1%; text-align:left; margin-left:2%; margin-top:20px;
margin-bottom:20px">
<h4 style="color:blue">Management for cough with difficulty breathing more than or equall to 2 weeks</h4>

<strong>Exclude TB while looking for TB, consider other cause of for cause for cough/difficulty breathing : </strong><br>
<br>

<div class="row">

<div class="col-md-4 col-sm-6 col-xs-12" style="border-right:1px solid #ddd">
  If HIV with CD4 < 200 cells/mm<superscript>3</superscript> and dry cough, worsening breathlessness on excretion <strong>Pneumotic
    jiroveci pneunomia  (PJP)</strong> likely</strong>
</div>

<div class="col-md-4 col-sm-6 col-xs-12" style="border-right:1px solid #ddd">
  If smoker :
  <li>Advice patient to stop smoking </li>
  <li>Has patient loss weight ? </li><button onclick="yesloss()">Yes </button>    &nbsp; &nbsp; &nbsp; &nbsp;  <button onclick="noloss()">NO </button>
</div>

<div class="col-md-4 col-sm-6 col-xs-12">
  If recent upper respiratory tract infection, no difficulty breathing, <strong> post-infection cough </strong> likely
  <li>Advice patient that the cough should resolve within 8 weeks </li>

</div>



</div><!--end row-->

<div id="mmm"></div>
</div>

<br>
<div class="row">
  <div class="col-md-1"></div>

<div class="col-md-10" style="border:5px solid pink; background:#fff; text-align:left">
  <strong>Relieve cough or difficulty breathing in the patient needing palliative care </strong>
  <li>If thick sputum, give steam inhalations. If more than 30mL/day, try deep fast breathing with postural drainage </li>
  <li>If excess thin sputum in patient who is terminally ill,  <?php if($staffData["Level"] == 1){ ?>
  <button onclick="sendToPending('<?php echo $_SESSION["caseId"]?>', '2','Give hyocosine 20mg 4 hourly subcutaneously 5mg 4 hourly.' )">Transfer to higher cadre </button>
   <?php } else{ ?> Give hyocosine 20mg 4 hourly subcutaneously 5mg 4 hourly. <?php }?> </li>

   <li>For annoying dry cough , <?php if($staffData["Level"] == 1){ ?>
   <button onclick="sendToPending('<?php echo $_SESSION["caseId"]?>', '2','Give Codeine 15mg orally 6 hourly. if no response, try oral morphine 5mg 4 hourly .' )">Transfer to higher cadre </button>
    <?php } else{ ?> Give Codeine 15mg orally 6 hourly. if no response, try oral morphine 5mg 4 hourly <?php }?> </li>

    <li>If breathless when terminally ill, <?php if($staffData["Level"] == 1){ ?>
    <button onclick="sendToPending('<?php echo $_SESSION["caseId"]?>', '2','Give oral morphine 5mg 4 hourly.' )">Transfer to higher cadre </button>
     <?php } else{ ?> Give oral morphine 5mg 4 hourly <?php }?> </li>
</div>
</div>
