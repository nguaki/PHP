<?php
require_once '../core/init.php';
//Suppress warning messages
error_reporting(E_ERROR|E_PARSE);


if(isset($_POST['city']) && isset($_POST['country'])){
    if(!empty($_POST['city']) && !empty($_POST['country']))
    {
            if(ctype_alpha(str_replace(' ', '', $_POST['city'])))
               $clean['city'] = $_POST['city'];
            else{ 
                echo "Invalid City";
                return;
            }
            
            if(ctype_alpha(str_replace(' ', '', $_POST['country'])))
               $clean['country'] = $_POST['country'];
            else{ 
                echo "Invalid Country";
                return;
            }
    }else{
        echo "Please enter city and country.";
        return;
    }
} 
//If no city and country is provided, use default values.           
else {
    $clean['city']    = Config::get('weather/city');
    $clean['country'] = Config::get('weather/country');
    
}

    
// By City Name
$url= Config::get('weather/url') . $clean['city'] . ","  . $clean['country']  . "&appid="  . Config::get('weather/api_id');

if(strstr($url,"404"))
{
    echo "Please enter valid city and country.";
    return;
}
$temperature =  new Weather($url);

$data['temp'] = $temperature->getFahrenheit();
$data['unit'] = 'F';
$data['city'] = $clean['city'];
$data['country'] = $clean['country'];
//echo json_encode($data);
if( $data['temp'] == -459.67 ){
    echo "Invalid City and  Country.";
    return;
}
echo $temperature->getFahrenheit() . 'F' . '<br>';
echo $clean['city'] . '   ' . $clean['country'];
return;
?>