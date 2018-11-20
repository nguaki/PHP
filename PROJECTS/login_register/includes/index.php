<?php
require_once '../core/init.php';

//First time call, it will display success message and then delete the message.
//When the browser refreshes, the message is no longer there.

//Note that ordering of jQuery link coming first is important.

	
$user = new User();

//If user is logged, display the temperature by default.

if($user->isLoggedIn()){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>City Temperature</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
  </head>
  
  <body>
  <nav class="navbar navbar-inverse">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="disp_stat.php" target="_blank">Visitor Stat</a>
          <a class="navbar-brand" href="logout.php">Logout</a>
        </div>
    </nav>
     
   <div class="container">
        <p><span style="font-size: 50px" id="temp_field"></span></p>
	</div>	
   <div class="container">
        <form action="weather_info.php" method="POST" id="weatherForm">
            <label for="city">City</label> 
            <input type="text" name="city" id="city">
            <label for="country">Country</label> 
            <input type="text" name="country" id="country">
            <input type="submit" value="Enter">
        </form>
   </div>     
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript">
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
        <script src="JS/bootstrap.min.js"></script>
</body>
</html>
<?php
    //Translate API call interval in millisec.
    $total_milli_sec =  APICallInterval::getInMillisec();  
    
	//Display temperature immediately.
	echo '<script>getTemperature();</script>';
	//Set repetition with AJAX.
	echo '<script>timerID = setInterval("getTemperature()",'. $total_milli_sec . ');</script>';
} 

//If no one is logged, display menu items.

else
{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Cheat Sheet</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
      .navbar{
        margin-bottom:0;
        border-radius:0;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="login_fe_ajax_boot.php">Login</a>
          <a class="navbar-brand" href="register_fe_ajax_boot.php">Register</a>
        </div>
    </nav>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

<?php
//Stop the AJAX scheduled call.
    	echo '<script>clearInterval(timerID);</script>';
}
?>