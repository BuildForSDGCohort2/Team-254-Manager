<?php
session_start();
unset($_SESSION['logedUser']);
session_unset();
echo 'ok';
?>