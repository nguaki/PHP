<?php

require 'Helper.php';
require 'Validator.php';


$rules = array("email"=>"required|email", "password"=>"required|password:8" );
$data = array( 
				array( "email"=>"sahfkashf@gmail.com", "password"=>"1237897889"),
				array( "email"=>"qerqrgmail.com", "password"=>"1237897889"),
				array( "email"=>"bfdfgfg@gmail.com", "password"=>"12889666788"),
				array( "email"=>"qreeqwr@gmail.com", "password"=>"17889")
			  );
$error= array();
$users = array();
$index;
$errorindex = 0;

$index = 0;

foreach( $data as $APair )
{
	$email_status = false;
	$password_status = false;
	
	while( list( $k, $v ) = each($APair) )
	{
		if( $k === "email" )
		{
			$email_status = ValidateEmail( $v );
		}
		elseif( $k === "password" )
		{
			$password_status = ValidatePassword( $v );
		}
		if( $email_status && $password_status )
		{
			$users[$index]['email']= $APair['email'];
			$users[$index]['password']= getHash($APair['password']);
			
			$index ++;
		}
	}
}

foreach( $users as $user )
{
	while( list($k,$v) = each($user) )
	{
		echo "$k  ........   $v   <br\>";
	}
	echo "<hr/>";
}
var_dump( $users );
var_dump( $error );

?>

