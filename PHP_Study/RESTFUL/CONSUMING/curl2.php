<?php
//Sep 29, 2018
//Gets the exact replica of this URL.

$URL = 'http://www.example.com/robots.txt';

$CurlHandle = curl_init();

curl_setopt($CurlHandle, CURLOPT_URL, $URL);

curl_setopt($CurlHandle, CURLOPT_RETURNTRANSFER, 1);

$page = curl_exec($CurlHandle);

print_r($page);

curl_close($CurlHandle);

?>