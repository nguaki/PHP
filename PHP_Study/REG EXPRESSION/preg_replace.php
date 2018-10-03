<?php
header( 'Content-Type: text/plain' );
/*OUTPUT
I am 

 a test 
 string
 I am a test string*/
$String = "I am \n\r a test \r\n string";
echo $String;
$Result = preg_replace( "/[ \n\r]+/", " ", $String );  
//   /  - start of delimeter
//   []  - element set 
//   +   -  one or more  e.g.  \n\r\n  will be considered to be a string to be replaced with.
//   /  - end of delimeter
echo $Result;

?>