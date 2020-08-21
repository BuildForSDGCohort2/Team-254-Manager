<?php
session_start();
if(!isset($_SESSION['logedUser'])){
    //header('Location:../index.php');
    echo 'false';
}else{
    echo 'ok';
}

?>