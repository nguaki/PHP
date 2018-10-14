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
        	
        	//Initial call uses default city and country form config file.
        	function getTemperature()
        	{
        	    //alert("someone call me");
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
		<a href="disp_stat.php" target="_blank">Display Most Freq Visitors</a> &nbsp &nbsp &nbsp
		<a href="logout.php">Log out</a>
		
        <p><span style="font-size: 50px" id="temp_field"></span></p>
        <form action="weather_info.php" method="POST" id="weatherForm">
            <label for="city">City</label> 
            <input type="text" name="city" id="city">
            <label for="country">Country</label> 
            <input type="text" name="country" id="country">
            <input type="submit" value="Enter">
        </form>
        
        <script type="text/javascript">
        $("#weatherForm").submit(function(event) 
        {
            /*global $*/
    	    clearInterval(timerID);

            /* stop form from submitting normally */
            event.preventDefault();

            /* get the action attribute from the <form action=""> element */
            var $form = $( this ),
            url = $form.attr( 'action' );
            
            /* Send the data using post with element id name and name2*/
            var posting = $.post( url, { city: $('#city').val(), country: $('#country').val() } );

            /* Alerts the results */
            posting.done(function( data ) {
                //alert(data); 
                $('#temp_field').html(data); 
                
            });
        });
    </script>
       
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
    	
		//echo '<p>You need to either <a href="login_fe_ajax.php">login</a> or <a href="register_fe_ajax_boot.php">register</a></p>';
		//echo '<ul class="list-inlining">';
		echo '<ul class="inline">';
	    echo '<li><a href="login_fe_ajax.php">Login</a></li>';
	    echo '<li><a href="register_fe_ajax_boot.php">Register</a></li>';
		echo '</ul>';
}
?>