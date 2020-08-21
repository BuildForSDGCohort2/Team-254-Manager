<?php
/*
include 'public/connect/connect.php';
include 'check/create/create_database.php';
include 'public/queries/queries.php';
include 'public/create_file/getFiles.php';
include 'public/create_file/createFile.php';
include 'public/create_file/RD.php';
include 'public/fileFunction/handleFiles.php';
*/
include 'public/connect/connect.php';
include 'check/create/create_database.php';
include 'public/queries/queries.php';
include 'public/create_file/getFiles.php';
include 'public/create_file/createFile.php';
include 'public/create_file/RD.php';
include 'public/fileFunction/handleFiles.php';
include 'public/fileFunction/zipeFile.php';
$control =  $_POST['control'];
switch ($Database_check) {
  case '':
 //echo 'No error found';
switch ($control) {
  case 'login':

  $QUERY = new Queries();
  $QUERY->Select('users',$_POST['email'],$_POST['password'],'login',$con,'');
  echo $QUERY->response();
  break;

  case 'LogedUser':
  $QUERY = new Queries();
  $QUERY->Select('users','','','LogedUser',$con,'');
  echo $QUERY->response();
  break;
  case 'Register':
    $QUERY = new Queries();
    $QUERY->Select('users',$_POST['email'],$_POST['password'],'checkUser',$con,$_POST['username']);
    $response = $QUERY->response();
    if($response === 'exist'){
    echo $response;
      }
    if($response === 'good'){
      $QUERY->insert('users',$_POST['email'],$_POST['password'],'register',$con,$_POST['username'],'','');
   //$QUERY->insert('users',$_POST['email'],$_POST['password'],'register',$con,$_POST['username']);
    echo $QUERY->response();
    }
  break;

  case 'main_diretories':
    // gets all the folders in the user main directory
    $QUERY = new Queries();
    $QUERY->Select('users',$_POST['user'],'','main_diretories',$con,'');
    //echo $QUERY->response();
    $Files = new getFiles();
    $Files->folders('directories/'.$QUERY->response(),$control);
    echo $Files->response();


  break;

  case 'sub_directories':
    //gets the folders in the users tree specific folders
    $QUERY = new Queries();
    $QUERY->Select('users',$_POST['user'],'','main_diretories',$con,'');
    $QUERY->Select('userfiles',$_POST['user'],'','sub_directories',$con,'directories/'.$QUERY->response().'/'.$_POST['path']);
    if($QUERY->response()==='nothing'){
      echo 'nothinng';
    }else{
     
     $Files = new getFiles();
     $RD= new RD();
    $Files->folders($QUERY->response(),'sub_directories',$RD);//working from main_directories
    //echo $Files->response();
      
    }
    

  break;

  case 'createFolder':
   if($_POST['type'] === 'private'){
    $QUERY = new Files();
    $QUERY->folder($_POST['folder'],$_POST['newPath'],$_POST['type'],$_POST['readme']);
    //$QUERY->Select('users',$_POST['user'],'','main_diretories',$con,'');
    //echo $QUERY->response();
    $QUERY->write($QUERY->response());
    //echo $QUERY->response();
    $QUER = new Queries();
    $QUER->insert('userfiles',$_POST['folder'],'directories/'.$_POST['newPath'],'insertFilePath',$con,$_POST['user'],'','');
     echo $QUER->response();
   } 
   if($_POST['type'] === 'public'){

    $QUERY = new Files();
    $QUERY->folder($_POST['folder'],$_POST['newPath'],$_POST['type'],$_POST['readme']);
    //$QUERY->Select('users',$_POST['user'],'','main_diretories',$con,'');
    //echo $QUERY->response();
    $QUERY->write($QUERY->response());
    //echo $QUERY->response();
    $QUER = new Queries();
    $QUER->insert('userfiles',$_POST['folder'],'project/'.$_POST['newPath'],'insertFilePath',$con,$_POST['user'],'','');
     //echo $QUER->response();
   //$QUER->insert('userfiles',$_POST['folder'],'directories/'.$_POST['newPath'],'insertFilePath',$con,$_POST['user'],'','');
    if($QUER->response()=== 'files path established'){
      $QUER->insert('forums',$_POST['folder'],'project/'.$_POST['newPath'],'insertFilePath2',$con,$_POST['user'],'','');
      echo $QUER->response();
    }
     //echo 'publicss';
   }
  

   break;

   case 'read':
     $QUERY = new FileActions();
    $QUERY ->readFile($_POST['path']);
     echo $QUERY->response();
     

   break;

   case 'createFile':
    $QUERY = new Files();
    $QUERY->file($_POST['file']);
    echo $QUERY->response();
   break;
   case 'create_Folder':
    $QUERY = new Files();
    $QUERY->createFolder($_POST['folder']);
    echo $QUERY->response();
   break;
 case 'upload':
  $process = new FileActions();
  $process->upload($_POST['path'],$_FILES['file']['name'][0]);
  echo $process->response();
  
 break;

 case 'zippe':
  $randName = rand(1223474,9876433);
  $dir = $_POST['dir'];
  $ZipName = 'downloads/'.$_POST['folder'].'_'.$randName.'.zip';
  $Zipped = $_POST['folder'].'_'.$randName.'.zip';
  $zipPath = ExtendedZip::zipTree($dir,$ZipName, ZipArchive::CREATE);
  $userid = $_POST['userid'];
  if($userid !==''){
  $QUERY = new Queries();
  $QUERY->insert('downloads',$userid,$dir,'zipped',$con,$Zipped,$ZipName,$_POST['folder'],'','');
    //echo $userid;
  echo $QUERY->response();
  }else{
  echo 'user not defined';
   }
   
 break;

 case 'downlodedFile':
  $randName = rand(1223474,9876433);
  $dir = $_POST['dir'];
  $ZipName = 'downloads/'.$randName.$_POST['folder'];
  $Zipped = $_POST['folder'].'_'.$randName.'.zip';
 if(copy("$dir","$ZipName")){
  $userid = $_POST['userid'];
  if($userid !==''){
  $QUERY = new Queries();
  $QUERY->insert('downloads',$userid,$dir,'dowloded',$con,$Zipped,$ZipName,$_POST['folder'],'','');
    //echo $userid;
  echo $QUERY->response();
  }else{
  echo 'user not defined';
   }
 }
  break;

  case 'commit':
  $randName = rand(1224567367474,98766789433);
  $mainPath =$_POST['mainPath'];
  $values = $_POST['values'];
  $userid = $_POST['userid'];
  $modified = $_POST['modified'];
  $newPath = 'OldFiles/'.$randName.$modified;
  if(copy($mainPath,$newPath)){
  $QUERY = new Queries();
  $QUERY->insert('filelogs',$userid,$modified,'commit',$con,$mainPath,$newPath,'','','');
  if($QUERY->response() === 'ok'){
    $QUERY = new Files();
    $QUERY->commit($mainPath,$values);
    echo $QUERY->response();
  };
  }else{
    echo 'failed';
  }
  break;

case 'readText':
$path = $_POST['path'];
      
$QUERY = new FileActions();
$QUERY ->readText($path);
echo $QUERY->response();
  
 break;

case 'project':
$ID = mysqli_real_escape_string($con,$_POST['ID']);
$QUERY = new Queries();
$QUERY->Select('forums',$ID,'','project',$con,'');
echo $QUERY->response();

 break;






  default:
          # code...
  break;





      }

    break;
case 'nodatabase':
  $create = new Create_database();
  $create->database_name($returned[3],$con);

  if($create->response() === 'created'){
  $create->create_tables($returned[3],$con);
  echo $create->response();
  }

      break;
    
    default:
        # code...
        break;
}


?>