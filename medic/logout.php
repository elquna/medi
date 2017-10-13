<?php
session_start();
unset($_SESSION["subadmin"]);
header("location:../index.php");
?>
