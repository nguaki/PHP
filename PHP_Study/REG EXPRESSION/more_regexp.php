<?php
/*FoundArray ( [0] => AGDSDFSB [1] => GDSDFS ) 
NOT Found */
$string1 = "AGDSDFSB";
$string2 = "AFDADFEG";


#Write an expression to capture a string that starts with 'A' and ends with 'B'.

if( preg_match( '/^A(.*)B$/', $string1, $match_string ) )
{
	echo "Found";
	print_r( $match_string );
}
else
{
	echo "NOT Found";
}
echo "<br>";

if( preg_match( '/^A(.*)B$/', $string2, $match_string ) )
{
	echo "Found";
	print_r( $match_string );
}
else
{
	echo "NOT Found";   
}



?>