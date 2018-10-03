<?php
//OUTPUT
// "ABCDEF"
// "ABCDEF"
$string1 = "ABCDEF";
$string2 = "ABCDEFG";

$pattern = "/[A-F]+/";

preg_match( $pattern, $string1, $match );

print_r ($match); 

preg_match( $pattern, $string2, $match1 );

print_r ($match1); 

?>