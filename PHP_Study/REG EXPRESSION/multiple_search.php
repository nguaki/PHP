<?php
/*OUTPUT
Array ( [0] => Array ( [0] => Matthew [1] => Matthew [2] => Matthew ) )*/

$string = "Hello Matthew.  Hi Matthew.  Welcome Matthew.";
//preg_match_all() will grep all Matthew.
//preg_match() grabs the first one only.
$return = preg_match_all( "/Matthew/", $string, $results, PREG_PATTERN_ORDER);

print_r( $results );
?>