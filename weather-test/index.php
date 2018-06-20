<?php
$ch = curl_init("http://samples.openweathermap.org/data/2.5/weather?q=London,uk&appid=b6907d289e10d714a6e88b30761fae22");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
$response = curl_exec($ch);
print_r($response);
?>