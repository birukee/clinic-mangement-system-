<?php
//$key previously generated safely, ie: openssl_random_pseudo_bytes
$key=sha1(microtime(true).mt_rand(10000,90000));

$plaintext = "message to be encrypted+_(*7567880$#%%@!&^***(76)";
function encryption($plaintext,$key){
    
$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
$iv = openssl_random_pseudo_bytes($ivlen);
$ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
$hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
$ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );
return $ciphertext;    
    
}

//decrypt later....
function decreption($ciphertext,$key){
$c = base64_decode($ciphertext);
$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
$iv = substr($c, 0, $ivlen);
$hmac = substr($c, $ivlen, $sha2len=32);
$ciphertext_raw = substr($c, $ivlen+$sha2len);
$original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
$calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
if (hash_equals($hmac, $calcmac))//PHP 5.6+ timing attack safe comparison
{
    return $original_plaintext."\n";
}    
    
    
}
echo $ciphertext=encryption($plaintext,$key);
echo decreption($ciphertext,$key);
echo date("Y-m-d_h:i:s");

$file_path='http://localhost/mk_clinics/patient_file/1/lab/request/2020-11-30/06 02 56.pdf';
echo "<br>..".str_replace('http://localhost/mk_clinics', '', $file_path);
?>