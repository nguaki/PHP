<?php
require_once '../core/init.php';

$city    = Config::get('weather/city');
$country = Config::get('weather/country');

// By City Name
$url= Config::get('weather/url') . $city . ","  . $country  . "&appid="  . Config::get('weather/api_id');

$temperature =  new Weather($url);

echo $temperature->getFahrenheit() .  ' F' . '<br>';
echo  $city;
?>