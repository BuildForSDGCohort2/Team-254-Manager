<?php

//$con = mysqli_connect('localhost','root','tony','filemanager');
//$query = mysqli_query($con,"SELECT * from users where email='airotony7@gmail.com'");
//while($row=mysqli_fetch_assoc($query)){
// $_password= $row['password'];
  
 //$_Key= $row['KEY_ID'];
//}


$input = 'wlgwWjULOArQJ4NTAux9N2TK7xYuKMmIbYvcSYGkEHM=';
////z6s8h9e6CWrMDMXUPKtRH1GASKIR+3BxInmGHsWLQak=
//317961883

$key = '62854085';



//74637334
//7pwdvQgpxP8V4GpL8ev/rMwpxZ/nFj4uxAaHylVuCi4=
$Decrypted = Decrypt($input,$key);

echo $Decrypted;
function Decrypt($q,$key){
    $cryptKey= $key;
    $qDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,md5($cryptKey),base64_decode($q),MCRYPT_MODE_CBC,md5(md5($cryptKey))),"\0");
    //$result = array('key'=>$key,'decrypted'=>$qDecoded);
  return ($qDecoded);
}
?>