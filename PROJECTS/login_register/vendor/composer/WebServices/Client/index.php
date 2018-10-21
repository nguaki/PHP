<html>

<body>
<form method="POST" action="" >
<input type="text" name="name" >
</br>
<input type="submit" name="submit">

</form>
</body>
</html>

<?php

if ( isset( $_POST['submit'] ) )
{
	//echo "I am inside <br>";
	
	$name = $_POST['name'];
	
	//$url  =  "http://localhost:8080/xampp/my_exercises/php/WebServices/Index.php?book=$name";  //  <==== WORKED
	$url  =  "http://localhost:8080/xampp/my_exercises/php/WebServices/?book=$name";  // <==== WORKED
	//$url  =  "http://localhost:8080/xampp/my_exercises/php/WebServices/$name";  // <==== Didn't WORK

	$client = curl_init( $url );
	curl_setopt( $client, CURLOPT_RETURNTRANSFER, 1 );  //This is the only way to receive the output and assign it to $response variable.
	$response = curl_exec( $client );
	
	//echo $response;
	$output =  json_decode( $response );
	echo "It is listed $" . $output->data;
}




?>