<?php
$Input='';
$key = rand(19499568,99109458767);
$Encrypted = Encrypt($Input,$key);
//$Decrypted = Decrypt($Encrypted);

foreach($Encrypted as $x){
echo $x;
echo "<br>";
//echo 'z6s8h9e6CWrMDMXUPKtRH1GASKIR+3BxInmGHsWLQak=';
}

function Encrypt($q,$key){
  $cryptKey= $key;
  $qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256,md5($cryptKey),$q,MCRYPT_MODE_CBC,md5(md5($cryptKey))));
  $result = array('key'=>$key,'encrypted'=>$qEncoded);
  return $result;
}


?>