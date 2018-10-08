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
        	    alert("someone call me");
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
        
            $('#city').on("keydown", function(e) {
                if(e.keyCode == 13 ){
                    alert("Enter pressed");
                    return false;
                }
            });
            function myFunction(e,textinput){
                var code = (e.keyCode ? e.keyCode : e.which );
                if(code == 13 ){
    	            //clearInterval(timerID);
                    //getTemperature();
                    <?php weather_info.php;?>
                }
            }
        </script> 
</head>
<body>
		<a href="disp_stat.php" target="_blank">Display Most Freq Visitors</a> &nbsp &nbsp &nbsp
		<a href="logout.php">Log out</a>
        <p><span style="font-size: 50px" id="temp_field"></span></p>
        <form action="weather_info.php" method="POST">
            <label for="city">City</label> 
            <input type="text" name="city" id="city" onkeypress="myFunction(event,this)">
            <label for="country">Country</label> 
            <input type="text" name="country" id="country" onkeypress="myFunction(event,this)">
            <input type="submit" value="Enter">
        </form>
        
</body>
</html>
<?php
    //Translate API call interval in millisec.
    $total_milli_sec =  APICallInterval::getInMillisec();  
    
	//Display temperature immediately.
	echo '<script>getTemperature();</script>';
	//Set repetition.
	echo '<script>timerID = setInterval("getTemperature()",'. $total_milli_sec . ');</script>';
} else{
        //Stop the AJAX scheduled call.
    	echo '<script>clearInterval(timerID);</script>';
    	
		echo '<p>You need to either <a href="login_fe_ajax.php">login</a> or <a href="register_fe_ajax.php">register</a></p>';
}
?>