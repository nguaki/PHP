<?php
require_once '../core/init.php';

//First time call, it will display success message and then delete the message.
//When the browser refreshes, the message is no longer there.

if(Session::exists('success'))
	echo Session::flash('success');
	
if(Session::exists('home'))
	echo Session::flash('home');

	
$user = new User();
if($user->isLoggedIn()){
?>

<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
        <script>
        	/*global $;*/
        	
        	function getTemperature()
        	{
        	    $.ajax(	
        	            {
        	                url: 'weather_info.php',
        	                type: 'POST',
        	                dataType: 'text',
                  	        success: function (response)
                    	    {
                    	        //alert(response);
                    	        $('#temp_field').html(response);
                    	    }
                    	  }
                  	    );
             }
        </script>
</head>
<body>
		<li><a href="logout.php">Log out</a></li>
		<li><a href="disp_stat.php">Display Most Freq Visitors</a></li>
        <p><span style="font-size: 50px" id="temp_field"></span></p>
</body>
</html>
<?php
    //Translate API call interval in millisec.
    $total_milli_sec =  APICallInterval::getInMillisec();  
    
	echo '<script>getTemperature();</script>';
	echo '<script>timerID = setInterval("getTemperature()",'. $total_milli_sec . ');</script>';
} else{
    	echo '<script>clearInterval(timerID);</script>';
		echo '<p>You need to either <a href="login.php">login</a> or <a href="register.php">register</a></p>';
}
?>