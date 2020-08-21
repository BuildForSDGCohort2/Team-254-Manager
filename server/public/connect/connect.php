<?php
include 'check/db/db_set.php';
$returned = $DB->get_connection();
$con = mysqli_connect($returned[1],$returned[2],$returned[0])or die(mysqli_error());
$Database_check='';
mysqli_select_db($con,$returned[3])or($Database_check='nodatabase');

?>