<?php
$input_email='';
$input_password = 'z6s8h9e6CWrMDMXUPKtRH1GASKIR+3BxInmGHsWLQak=';
$encrypted_email = encrypt_email($input_email);
$decrypted_email = decrypt_email($encrypted_email);
$encrypted_password  =encrypt_password($input_password);
$decrypted_password = decrypt_password($input_password);
echo $decrypted_password;
function encrypt_email($q){
  $cryptKey= 'q';
  $qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256,md5($cryptKey),$q,MCRYPT_MODE_CBC,md5(md5($cryptKey))));
  return($qEncoded);
}
function decrypt_email($q){
    $cryptKey= 'q';
    $qDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,md5($cryptKey),base64_decode($q),MCRYPT_MODE_CBC,md5(md5($cryptKey))),"\0");
    return($qDecoded);
}
function encrypt_password($q){
  $cryptKey= 'qjBOrGtIn5UB1xGO3efyCp';
  $qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256,md5($cryptKey),$q,MCRYPT_MODE_CBC,md5(md5($cryptKey))));
  return($qEncoded);
}
function decrypt_password($q){
  $cryptKey= '317961883';
  $qDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,md5($cryptKey),base64_decode($q),MCRYPT_MODE_CBC,md5(md5($cryptKey))),"\0");
  return($qDecoded);
}
?>