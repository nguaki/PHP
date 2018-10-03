<?php
$pattern = "/^[a-zA-Z0-9-_.]+@[a-zA-Z]+\.[a-zA-Z]{2,5}$/";
//  ^ - starts with
//  [ ] a set of allowed characters
//  a-zA-Z0-9  
//  notice that there is no quanitfier like (?, *)
//  +   concatenation
//  @   must have @ character
//  [ ] a set of allowed characters
//  a-zA-Z
//  +   concatenation
//  \.  must have a dot character
//  [ ] a set of allowed characters
//  {2,5} must have at least 2-5 characters
//  $   must end this way


$email = "jms_che@yahoo.com";  //ok
$email = "jms_che@yahoo.";      //nok
$email = "jms_che@yahoo.com1";  //nok  -  ends with a number

if( preg_match( $pattern, $email ) )
{
	echo "Matches";
}
else
{
	echo "Doesn't match";
}
?>