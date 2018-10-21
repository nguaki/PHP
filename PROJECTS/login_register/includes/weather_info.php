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
//Use cached temperature info.
//Checks if timestamp is within 60 minutes.
$curtime = time();    
if( $_SESSION[$clean['city']] && (($_SESSION[$clean['city']]['temp'] -$currtime )/60 < 60) )
{
    echo $_SESSION['city']['temp'] . 'F' . '<br>';
    echo $clean['city'] . '   ' . $clean['country'];
    return;
}

// By City Name
$url= Config::get('weather/url') . $clean['city'] . ","  . $clean['country']  . "&appid="  . Config::get('weather/api_id');

//If there is an error, return with error message.
if(strstr($url,"404"))
{
    echo "Please enter valid city'] and country.";
    return;
}
$temperature =  new Weather($url);

//echo json_encode($data);
if( $data['city']['temp'] == -459.67 ){
    echo "Invalid City and  Country.";
    return;
}
else
{
    //Cache this data.
    $_SESSION['city'] = $clean['city'];
    $_SESSION['city']['temp'] = $temperature->getFahrenheit();
    $_SESSION['city']['unit'] = 'F';
    $_SESSION['city']['country'] = $clean['country'];
    $_SESSION['city']['time'] = time();
}

echo $temperature->getFahrenheit() . 'F' . '<br>';
echo $clean['city'] . '   ' . $clean['country'];
return;
?>