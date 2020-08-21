<?php
$Input='';
$Encrypted = Encrypt($input);
$Decrypted = Decrypt($Encrypted);

function Encrypt($q){
  $cryptKey= 'qjBOrGtIn5UB1xGO3efyCp';
  $qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256,md5($cryptKey),$q,MCRYPT_MODE_CBC,md5(md5($cryptKey))));
  return($qEncoded);
}
function Decrypt($q){
    $cryptKey= 'qjBOrGtIn5UB1xGO3efyCp';
    $qDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,md5($cryptKey),base64_decode($q),MCRYPT_MODE_CBC,md5(md5($cryptKey))),"\0");
    return($qDecoded);
}
?>