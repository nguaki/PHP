<?php
/* OUTPUT
Array ( [0] => Array ( [0] => 77 [1] => d9 ) )
77 is an output since \w is consists of "a..zA..Z0..9_" characters.

Array ( [0] => Array ( [0] => 45@ ) )

Array ( [0] => Array ( [0] => i [1] => i ) [2] => .i  )  <== Note that there is a space in front of 'i'. A space is a character that belongs to \W.
*/
$string = "77   8  d9 dd ee ff";
$pattern = "/\w\d/";   

$return = preg_match_all( $pattern, $string, $results1);

print_r( $results1 );

$string = "my email id is abc745@yahoo.com";
$pattern = "/\w\d\W/";    //  "\W" means not "\w".  Characters that doesn't belong to "a..zA..Z0..9_".

$return = preg_match_all( $pattern, $string, $results1);

print_r( $results1 );

$string = "my email id is abc745@yahoo.com.in";
$pattern = "/[\d\W]i/";    //  "\W" means not "\w".  Characters that doesn't belong to "a..zA..Z0..9_".

$return = preg_match_all( $pattern, $string, $results1);

print_r( $results1 );
?>