<?php
//Refer to Youtube video by John Morris Aug 16,2016
//Displays just like google.com except the image.
//
//Getting 405 Error from Google.
//
//Sep 29, 18  OP,KS  

error_reporting(E_ALL);
ini_set('display_errors', 1);

//$URL =  'https://my-php-dguai.c9users.io/num_guess2.php';
$URL =  'https://www.google.com';
$post_data = array('source' => "What is AD");

$CurlHandle = curl_init();  //Gets contents of this website.

curl_setopt($CurlHandle, CURLOPT_URL, $URL);

curl_setopt($CurlHandle, CURLOPT_RETURNTRANSFER, 1);

//curl_setopt($CurlHandle, CURLOPT_POST, 1);
curl_setopt($CurlHandle, CURLOPT_GET, 1);

curl_setopt($CurlHandle, CURLOPT_POSTFIELDS, $post_data);

$output = curl_exec($CurlHandle);

if ($output === FALSE ){
    echo "cURL Error: " . curl_error($CurlHandle);
}

curl_close($CurlHandle);

print_r($output);

?>