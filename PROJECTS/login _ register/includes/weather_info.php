<?php
require_once '../core/init.php';

$clean['city']    = Config::get('weather/city');
$clean['country'] = Config::get('weather/country');

echo "processing city temp <br>";

if(isset($_POST['city']) && isset($_POST['country'])){
    if(!empty($_POST['city']) && !empty($_POST['country']))
    {
            $clean['city'] = $_POST['city'];
        
            $clean['country'] = $_POST['country'];
    }
}
    
// By City Name
//$url= Config::get('weather/url') . $city . ","  . $country  . "&appid="  . Config::get('weather/api_id');
$url= Config::get('weather/url') . $clean['city'] . ","  . $clean['country']  . "&appid="  . Config::get('weather/api_id');

if(strstr($url,"404"))
{
    echo "Please enter valid city and country.";
    return;
}
$temperature =  new Weather($url);

echo $temperature->getFahrenheit() .  ' F' . '<br>';
echo  $clean['city'];
?>