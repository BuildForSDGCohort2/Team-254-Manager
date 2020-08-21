<?php
class Queries{
    var $db_tables;
    var $process;
function Select($db_tables,$email,$password,$process,$con,$username){
switch ($process) {
  case 'login': 
  $secure_password = mysqli_real_escape_string($con,$password);
  $secure_email = mysqli_real_escape_string($con,$email);
  $query = mysqli_query($con,"SELECT * from $db_tables where email='".$secure_email."'");
  $check = mysqli_num_rows($query);
  if($check !=0){
  while($row=mysqli_fetch_assoc($query)){
  $_password= $row['password'];
  $_Key= $row['KEY_ID'];
  $_id=$row['id'];
}
  $input = $_password;
  $key = $_Key;
  $cryptKey= $key;
  $qDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,md5($cryptKey),base64_decode($input),MCRYPT_MODE_CBC,md5(md5($cryptKey))),"\0");
if($password === $qDecoded){
  session_start();
  $_SESSION['logedUser']= $_id;
//$this->response=json_encode($_newPassword);
  $this->response=$key;
}
  else{
  $this->response='2';//wrong password
 }
 }else{
 $this->response='1';//email not found
 }
 break;
 case 'LogedUser':
 session_start();
 $ID =$_SESSION['logedUser'];
 $query = mysqli_query($con,"SELECT * from $db_tables where id='".$ID."'");
 while($row = mysqli_fetch_assoc($query)){
 $this->response=json_encode($row);
 }
break;

case 'project':
  session_start();
  $ID =$_SESSION['logedUser'];
  $query = mysqli_query($con,"SELECT * from $db_tables where forum_id='".$email."'");
  $check = mysqli_num_rows($query);
  if($check !==0){
    $data=array();
    $row = mysqli_fetch_assoc($query);
    $data['directory']=$row['directory'];
    $data['name']=$row['name'];
    $this->response=json_encode($data);
  }else{
    $this->response=json_encode('NO');
  }
 
break;
  case 'checkUser':
  include 'check/security/security.php';
  $secure_password = mysqli_real_escape_string($con,$password);
  $secure_email = mysqli_real_escape_string($con,$email);
  $secure_username = mysqli_real_escape_string($con,$username);
  $query = mysqli_query($con,"SELECT * from $db_tables where email='".$secure_email."'");
  $check = mysqli_num_rows($query);
  if($check !=0){
  $this->response='exist';
  }else{
$this->response='good'; 
  }
  break;
  case 'main_diretories':
  $query = mysqli_query($con,"SELECT directories from $db_tables where id='".$email."'");
  while($row = mysqli_fetch_assoc($query)){
  $directory = $row['directories'];
 }
  $this->response=$directory;
 break;
 case 'sub_directories':
 $query = mysqli_query($con,"SELECT * from $db_tables where userid='".$email."'");
 $check = mysqli_num_rows($query);
 if($check !=0){
 $row=mysqli_fetch_assoc($query);
 $_SESSION['path_id'] = $row['id'];
 $this->response=$username; 
 }else{
 $this->response='nothing';
 }
 break;
 case 'files':
            # code...
  break;

 default:
        # code...
 break;
        }
    }
function Insert($db_tables,$email,$password,$process,$con,$username,$ZipName,$folder){
switch ($process) {
  case 'register':
  $Input=$password;
  $key = rand(194995,99109457);
  $cryptKey= $key;
  $qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256,md5($cryptKey),$Input,MCRYPT_MODE_CBC,md5(md5($cryptKey))));
  $secure_email = mysqli_real_escape_string($con,$email);
  $secure_password = mysqli_real_escape_string($con,$qEncoded);
  $secure_username = mysqli_real_escape_string($con,$username);
  $directory = 'directories/';
  $InPut=$email;
    
  $regFolder =rand(1234567778,987654778321678912);//base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256,md5($cryptKey),$InPut,MCRYPT_MODE_CBC,md5(md5($cryptKey))));
  $path ="directories/".$regFolder;
  $path2 ="project/".$regFolder;
  if($regFolder !==''){
  $make = mkdir("$path");
  mkdir("$path2");
  if($make){
    
  $query="INSERT INTO $db_tables(`username`,`email`,`password`,`KEY_ID`,`directories`) VALUES ('$secure_username','$secure_email','$secure_password','$key','$regFolder')";
  if($con->query($query)){
  $this->response='registration successfull';
  }else{
  $this->response='server error';
}
  }else{
  $this->response='failed to make directory';
  }
}else{
  $this->response='folder empty';
  }
break;

 case 'insertFilePath':
 $query="INSERT INTO $db_tables(`userid`,`title`,`path`,`date`) VALUES ('$username','$email','$password',NOW())";
 if($con->query($query)){
 $this->response='files path established';
 }else{
 $this->response='server error';
 }
  break;
  case 'insertFilePath2':
    $rand = rand(123456778,56789893);
    $query="INSERT INTO $db_tables(`forum_id`,`userid`,`directory`,`admin`,`name`) VALUES ('$rand','$username','$password','$username','$email')";
    if($con->query($query)){
      $res['rand']=$rand;
      $res['ok']='ok';
      $res['path']=$password;
      $res['name']=$email;
    $this->response=json_encode($res);
    }else{
    $this->response='server error';
    }
     break;

case 'zipped':
 $result = array();
$query = "INSERT INTO $db_tables(`userid`,`main_path`,`downloaded`,`zipe_path`,`date`) VALUES ('$email','$password','$folder','$ZipName',NOW())";
if($con->query($query)){
 $result['zipe'] = $username;
 $result['path'] = 'server/'.$ZipName;
 $this->response=json_encode($result);
 }else{
 $this->response=json_encode('failed');
}
 break;
 
 case 'dowloded':
$query = "INSERT INTO $db_tables(`userid`,`main_path`,`downloaded`,`zipe_path`,`date`) VALUES ('$email','$password','$folder','$ZipName',NOW())";
if($con->query($query)){
 
 $this->response=json_encode('good');
 }else{
 $this->response=json_encode('failed');
}
 break;

 case 'commit':
  $stmt ="INSERT INTO $db_tables (`userid`,`Modified`,`date`,`mainPath`,`newParh`) VALUES ('$email','$password',NOW(),'$username','$ZipName')";
 // $stmt->bind_param("ss", $email,$password,NOW(),$username,$ZipName);
  if($con->query($stmt)){
  
    $this->response='ok';
  }else{
    $this->response='failed';
  }
   // $stmt->close();
  
  
 break;
 default:
                # code...
 break;
}

}
function Delete(){

}
function Update(){

}

function response(){
return $this->response;
}  
}
?>