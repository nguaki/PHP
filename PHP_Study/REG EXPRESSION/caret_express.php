<?php
//Array ( [0] => Array ( [0] => abc ) )

$string = "abcdef  cderfg";

$pattern = "/^.../";   //  matches first 3 characters of a string .

$return = preg_match_all( $pattern, $string, $results1);

print_r( $results1 );


?>