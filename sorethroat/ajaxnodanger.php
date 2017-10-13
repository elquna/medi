
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


?>

<?php


if(!isset($_SESSION["subadmin"])){

echo 504;
exit;
}

if(!isset($_SESSION["hospitalNo"])){

echo 504;
exit;
}

?>

   <br><br>
    <div style=" margin-left:30px; border:10px solid blue; width:90%; min-height:400px; padding-left:20px">
      <h3 style="color:blue">NONE- SERIOUS CASE (SORE THROAT)</h3>
      <div id="infoo"></div>
      <h4>Management</h4>
      <div style="width:95%; text-align:center">


            <strong style="color:green">Approach to the patient with mouth/thraot sysmtoms not needing urgent attention</strong><br>
            <br>

<div class="row">
<div class="col-md-4 col-sm-6 col-xs-12" id="first" style="background:#fff;  border:1px solid #ccc; padding:5px; min-height:100px;">
  <br>
  <strong>Red Throat</strong><br><br>
  <button style="width:80%" onclick="solutions('first')">Manage</button>
</div>


<div class="col-md-4 col-sm-6 col-xs-12" id="second" style="background:#fff;  border:1px solid #ccc; min-height:100px;">

  <strong>White patches on cheeks, gums, tongue, palate. May have cracks in corners of mouth</strong><br>
  <button style="width:80%"  onclick="second('second')">Manage</button>
</div>


<div class="col-md-4 col-sm-6 col-xs-12" id="third" style="background:#fff; min-height:100px; border:1px solid #ccc">
  <br>
  <strong>Painful blisters on lips/mouth </strong><br><br>
  <button style="width:80%" onclick="third('third')">Manage</button>
</div>


</div><!--ends row-->

<div class="row">
<div class="col-md-4 col-sm-6 col-xs-12" id="fourth" style="background:#fff; min-height:100px; border:1px solid #ccc">
  <br>
  <strong>Painful ulcer/s in mouth/throat </strong><br><br>
  <button style="width:80%" onclick="fourth('fourth')">Manage</button>

</div>

<div class="col-md-4 col-sm-6 col-xs-12" id="fifth" style="background:#fff; min-height:100px; border:1px solid #ccc">
  <br>
  <strong>Difficulty or pain on swallowing</strong><br><br>
  <button style="width:80%" onclick="fifth('fifth')">Manage</button>
</div>

<div class="col-md-4 col-sm-6 col-xs-12" id="sixth" style="background:#fff; min-height:100px; border:1px solid #ccc">

  <br>
  <strong>Dry mouth</strong><br><br>
  <button style="width:80%" onclick="sixth('sixth')">Manage</button>
</div>

</div><!--ends row-->

      <div id="solutions" style="text-align:center"></div>

      </div>



    </div>
    <br><br>
  <?php $db->offFromCases($_SESSION["caseId"]);?>
