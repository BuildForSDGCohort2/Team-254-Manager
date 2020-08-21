<?php
include 'connection/db.php';
include 'public/db_env.php';
$DB = new connect();
$DB->set_connection($password,$username,$server,$database);

?>