<?php

  
function hyper_decode($sk)
{
  $cipher = "AES-128-CTR";

  // Use OpenSSl Encryption method
  $iv_length = openssl_cipher_iv_length($cipher);
  $div = '0486299622685486';
  $options = 0;
  $d_key = "kingencrypt";
  $get_sk = end(file("skencrypted.txt"));
  $skk = trim($get_sk);

  $decryption = openssl_decrypt(
    $skk,
    $cipher,
    $d_key,
    $options,
    $div
  );

  return $decryption;
}
function GetStr($string, $start, $end)
{
  $string = ' ' . $string;
  $ini = strpos($string, $start);
  if ($ini == 0) return '';
  $ini += strlen($start);
  $len = strpos($string, $end, $ini) - $ini;
  return trim(strip_tags(substr($string, $ini, $len)));
}

function multiexplode($seperator, $string)
{
  $one = str_replace($seperator, $seperator[0], $string);
  $two = explode($seperator[0], $one);
  return $two;
};

function ccncharge($check3){
  if ($check3 == "pass"){
    return "pass";
  }else{
    return "fail";
  }
  }

function decline_reason($re1, $re2)
{
    $decline1 = trim(strip_tags(getStr($re1, '"decline_code": "', '"')));
    $decline2 = trim(strip_tags(getStr($re2, '"decline_code": "', '"')));
    if (!empty($decline1)) {
        return $decline1;
    } else if (!empty($decline2)) {
        return $decline2;
    } else {
        return "TX-CODE";
    }
}
function decline_msg($msg, $msg2, $re1, $re2){
  $msg =  trim(strip_tags(getStr($re1, '"message": "', '"')));
  $msg2 =  trim(strip_tags(getStr($re2, '"message": "', '"')));
  if (!empty($msg)) {
    return $msg;
} else if (!empty($msg2)) {
    return $msg2;
} else {
    return "TX-CODE";
}
}

?>