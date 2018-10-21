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
	$RootPath = getenv('APP_ROOT_PATH');
	echo 'RootPath = ' . $RootPath . '<br>';
    //die();	
	$name = $_POST['name'];
	
	//$url = "https://my-php-dguai.c9users.io/PHP_Study/WebServices/?book=$name";
	//$url = "https://my-php-dguai.c9users.io/my_php/PHP_Study/WebServices/?book=$name";
	//$url = "https://my-php-dguai.c9users.io/WebServices/Server/?book=$name";
	//$url = "https://my-php-dguai.c9users.io/my_php/PHP_Study/WebServices/Server/Index.php?book=$name";
	//$url = "https://ide.c9.io/dguai/my_php/PHP_Study/WebServices/Server/Index.php?book=$name";
	//$url = "https://dguai-my-php-3600949:8080/ide.c9.io/dguai/my_php/PHP_Study/WebServices/Server/Index.php?book=$name";
	$url = "https://dguai-my-php-3600949:8080/WebServices/Server/Index.php?book=$name";
	//$url  =  "http://localhost:8080/xampp/my_exercises/php/WebServices/Index.php?book=$name";  //  <==== WORKED
	//$url  =  "http://localhost:8080/xampp/my_exercises/php/WebServices/?book=$name";  // <==== WORKED
	//$url  =  "http://localhost:8080/xampp/my_exercises/php/WebServices/$name";  // <==== Didn't WORK

	$client = curl_init( $url );
	curl_setopt( $client, CURLOPT_RETURNTRANSFER, 1 );  //This is the only way to receive the output and assign it to $response variable.
	$response = curl_exec( $client );
	var_dump($response);
	//echo $response;
	$output =  json_decode( $response );
	echo "It is listed $" . $output->data;
}




?>