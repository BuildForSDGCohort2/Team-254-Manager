<?php 
$con = mysqli_connect("localhost","root","tony")or die(mysqli_error());
mysqli_select_db($con,"chat-system")or die(mysqli_error());
?>