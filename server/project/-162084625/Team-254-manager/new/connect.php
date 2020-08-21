<?php
include '../../assets/controll/connect.php';
$con = mysqli_connect($db->get_host(),$db->get_root(),$db->get_password());
mysqli_select_db($con,$db->get_database()) or die(mysqli_error());
?>