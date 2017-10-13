<?php
session_start();
unset($_SESSION["superadmin"]);
header("location:../index.php");
?>