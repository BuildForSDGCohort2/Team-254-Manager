<?php
//include 'public/connect/connect.php';
class Create_database{
     var $db_name;
     

function database_name($db_name,$con){
  $db = "CREATE database $db_name";
  if($con->query($db)){
     $this->response='created';
  }
  else{
    $this->response='failed';
  //return 'proccess failed';
    }      
  }

  function create_tables($db_name,$con){
         $table_users= "CREATE TABLE `$db_name`.`users` (
          `id` int(50) NOT NULL AUTO_INCREMENT,
          `username` varchar(100) NOT NULL,
          `email` varchar(100) NOT NULL,
          `password` varchar(100) NOT NULL,
          `KEY_ID` varchar(100) NOT NULL,
          `directories` varchar(100) NOT NULL,
          PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=latin1;";//"CREATE TABLE `$db_name`.`users` ( `id` INT(50) NOT NULL AUTO_INCREMENT , `username` VARCHAR(100) NOT NULL , `email` VARCHAR(100) NOT NULL , `password` VARCHAR(100) NOT NULL ,`KEY_ID` VARCHAR(100) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB;";
         $table_userFiles = "CREATE TABLE `$db_name`.`userFiles` ( `userid` INT(50) NOT NULL , `title` VARCHAR(100) NOT NULL , `path` VARCHAR(100) NOT NULL , `date` DATETIME(6) NOT NULL, `KEY_ID` VARCHAR(100) NOT NULL ) ENGINE = InnoDB;";
         $downloads = "CREATE TABLE `$db_name`.`downloads` (
          `id` int(100) NOT NULL,
          `userid` int(100) NOT NULL,
          `main_path` varchar(100) NOT NULL,
          `downloaded` varchar(100) NOT NULL,
          `zipe_path` varchar(100) NOT NULL,
          `date` datetime(6) NOT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

        $fileLogs = "CREATE TABLE `$db_name`.`filelogs` (
          `id` int(100) NOT NULL,
          `userid` int(100) NOT NULL,
          `Modified` varchar(100) NOT NULL,
          `date` datetime(6) NOT NULL,
          `mainPath` varchar(100) NOT NULL,
          `newParh` varchar(100) NOT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

        $forums ="CREATE TABLE `$db_name`.`forums` (
          `id` int(100) NOT NULL,
          `forum_id` int(100) NOT NULL,
          `userid` int(100) NOT NULL,
          `directory` varchar(100) NOT NULL,
          `admin` varchar(100) NOT NULL,
          `name` varchar(100) NOT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

        $chatRoom = "CREATE TABLE `$db_name`.`chatroom` ( `id` INT(100) NOT NULL AUTO_INCREMENT , `forum_id` INT(100) NOT NULL , `message` VARCHAR(100) NOT NULL , `user` INT(100) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

         if($con->query($table_users)){
           if($con->query($table_userFiles)){
            if($con->query($downloads)){
              if($con->query($fileLogs)){
                if($con->query($forums)){
                  if($con->query($chatRoom)){
                  $this->response = 'tablesCreated';
                  }else{
                    $this->response = 'failed2';
                   }
                }else{
                  $this->response = 'failed2';
                 }
              }else{
                $this->response = 'failed2';
               }
            }else{
              $this->response = 'failed2';
             }
            // $this->response = 'tablesCreated';
           }else{
            $this->response = 'failed2';
           }
         }else{
          $this->response = 'failed1';
         }
  }


function response(){
  return $this->response;
}  
}
?>