<?php
session_start();
require_once("../pdo/database.php");

if(!isset($_SESSION["subadmin"])){

echo 504;
exit;
}
$data = json_decode($_POST["data"]);
$db = new Database();
$response = $db->addVitalSign($data);


if(ctype_digit($response)){?>

  <br>

  <div class="row" style="margin-left:20px">
              <!-- left column -->
              <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Treatment Id : <?php echo $response; ?></h3>
                  </div><!-- /.box-header -->
                  <!-- form start -->


  <div class="box-body">
    <strong>Vital signs successfully stored and Treatment case with Treatment Id <?php echo $response  ?> created </strong>
</div>
</div>

<?php }
?>
