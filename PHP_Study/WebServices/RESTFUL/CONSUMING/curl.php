<?php
//Refer to Youtube video by John Morris Aug 16,2016
//Displays just like google.com except the image.
//
//Sep 29, 18  OP,KS  
error_reporting(E_ALL);
ini_set('display_errors', 1);

$CurlHandle = curl_init();  //Gets contents of this website.

curl_setopt($CurlHandle, CURLOPT_URL, 'http://www.google.com');
curl_setopt($CurlHandle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($CurlHandle, CURLOPT_HEADER,0);

$output = curl_exec($CurlHandle);

if ($output === FALSE ){
    echo "cURL Error: " . curl_error($CurlHandle);
}

curl_close($CurlHandle);

print_r($output);
?>
