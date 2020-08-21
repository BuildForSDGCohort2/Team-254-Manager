<?php
class connect {
    var $password;
    var $username;
    var $server;
    var $database;

function set_connection($password,$username,$server,$database){
        $this->password=$password;
        $this->username=$username;
        $this->server=$server;
        $this->database=$database;
    }
    function get_connection(){
    $values = array($this->password,$this->username,$this->server,$this->database);
            
    return $values;
       
    }
}

//include '../check/db/db_set.php';
//echo 'ok';
//echo $DB->get_connection();
?>