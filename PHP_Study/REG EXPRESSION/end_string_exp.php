<?php
// OUTPUT  
// Array ( [0] => Array ( [0] => jkl ) )
// Array ( [0] => Array ( [0] => *+ ) )
$string = "abc
def
ghi
jkl";

$pattern = "/...$/";   //  matches last 3 characters of a string .

$return = preg_match_all( $pattern, $string, $results1);

print_r( $results1 );

$string = "abc
def
ghi
*+";

$pattern = "/\*\+$/";   //  * and + are meta characters.

$return = preg_match_all( $pattern, $string, $results1);

print_r( $results1 );

?>