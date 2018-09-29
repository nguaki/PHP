<?php
//Note that php code and html code co-exists in same file.
//In this case, which gets loaded the first?
//In this case from the top to bottom.
//Note that action="$_SERVER[PHP_SELF]". declaration with the form.
//Instead of specifying the specific php file name, it echoing the this file
//name.
//Sep 28, 18    Commented  OP,KS
//
	$num_to_guess = 42;
	
	// Previous statement doesn't work.
	//$num_tries = (isset($_POST['num_tries'])) ? ($num_tries + 1) : 1;
	
	//Very beginning, $num_tries is set to 0.
	if( !isset($_POST['num_tries']) ) $num_tries = 0;
	
	//It is very important that each session is stateless.
	//This means that PHP session is stupid and it does not remember
	//the previous session.
	//Must put on a different hat.  Cannot think like C programming.
	else $num_tries = $_POST['num_tries'] + 1;
	
	//Very beginning, this will be set.
	if( !isset( $_POST['guess']))
	{
		$message = "Welcome to the guessing machine!";
	}
	elseif( !is_numeric( $_POST['guess']))
	{
		$message = "Don't understand the response!";
	}
	elseif( ( $_POST['guess']) == $num_to_guess )
	{
		//When the number is guessed correctly, it redirects to Congratulations.html.
		header("Location: congratulations.html" );
	}
	elseif( ( $_POST['guess']) > $num_to_guess )
	{
		$message = "Lower please!";
	}
	elseif( ( $_POST['guess']) < $num_to_guess )
	{
		$message = "Higher please!";
	}
	else
	{
		$message = "Confused!";
	}
	//echo $message . "<br>";
?>

<!--Note the php tags everywhere.  echo is used to print statements which APACHE will -->
<!--interpret as HTML. -->
<!DOCTYPE html>
<html>
<head>
<title> Guessing game </title>
</head>
<body>
<h1> <?php echo $message; ?> </h1>

<p><strong>Guess number:</strong> <?php echo $num_tries; ?></p>

	<!--Q:Why echo statement is needed here?  -->
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="POST">
		
		<p><label for="guess">Type your Guess  here:</label><br/>
		<input type="text" id="guess" name="guess" /></p>
		
		<!--Note that when value is set, it uses echo $variable name. -->
		<!--Also, the following line is hidden and this is used to keep track of previous num_tries.-->
		<input type="hidden" id = "num_tries" name="num_tries" value="<?php echo $num_tries; ?>"/>
		
		<button type="submit" name="submit" value="submit">Submit</button>
	</form>
</body>
</html>


</html>
