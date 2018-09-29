<?php

/*
OUTPUT
http://www.google.com/search
h1=en
ie=UTF-8
q=php+development+books
btnG=Google+Search

Demonstration of strtok() function to separate string into sub strings by 
delimited values.

Sep 28, 2018  Wrote Comments OP,KS
*/

//Assignment of $test variable.
$test  = "http://www.google.com/search?";
$test .= "h1=en&ie=UTF-8&q=php+development+books&btnG=Google+Search";


//Defining the delimeter values
$delims = "?&";

$word =strtok($test, $delims);//The first delimited string is "http://www.google.com/search"

while( is_string($word) )
{
	if($word)
	{
		echo $word . "<br/>";
	}
	$word = strtok( $delims );  //<===What happened $test variable? strtok() function
	                            //keeps track of where it was left off.
	                            //It must be kept in a global variable.
}
?>