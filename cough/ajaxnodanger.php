

<?php
session_start();

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
      <h3 style="color:blue">NONE- SERIOUS CASE (COUGH)</h3>
      <div id="infoo"></div>
      <h4>Management</h4>
      <div style="width:95%; ">


            <strong style="color:green">Approach to the patient with cough sysmtoms not needing urgent attention</strong><br>
            <br>
            <ul>
            <li>If status is unknown, test for HIV</li>
            <li>Ask about duration of cough/difficulty breathing :
            </ul>


<div class="row">

  <div class="col-md-6 col-sm-6 col-xs-12" id="first" style="background:#fff;  border:1px solid #ccc; padding:5px; min-height:100px;">
    <br>
    <strong>Cough/difficulty in breathing less than two weeks</strong><br><br>
    <button style="width:80%" onclick="lessthantwoweeks()">Manage</button>
  </div>



<div class="col-md-6 col-sm-6 col-xs-12" id="first" style="background:#fff;  border:1px solid #ccc; padding:5px; min-height:100px;">
  <br>
  <strong>Cough/difficulty in breathing equall to or more than two weeks</strong><br><br>
  <button style="width:80%" onclick="morethantwoweeks()">Manage</button>
</div>
</div>



      <div id="solutions" style="text-align:center"></div>

      </div>



    </div>
    <br><br>
