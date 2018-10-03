<?php
//
//Array ( [0] => Array ( [0] => kl ) )  <==Why just "kl"?  That's because third character is a newline.

$string = "abc
def
ghi
jkl
";

$pattern = "/...$/";   //  matches last 3 characters of a string .

$return = preg_match_all( $pattern, $string, $results1);

print_r( $results1 );



?>