<?php
//Array ( [0] => Array ( [0] => bc [1] => ef [2] => hi [3] => kl ) ) 
//Array ( [0] => Array ( [0] => def ) ) 
//Array ( [0] => Array ( [0] => jkl ) ) 
//Array ( [0] => Array ( [0] => line [1] => line ) )

$string = "abc
def
ghi
jkl
";

$pattern = "/...$/m";   //  matches last 3 characters of a each line .

$return = preg_match_all( $pattern, $string, $results1);

print_r( $results1 );
$pattern = "/^def.$/m";   //  matches last 3 characters of a each line. The dot is for a newline.

$return = preg_match_all( $pattern, $string, $results1);

print_r( $results1 );

$pattern = "/^j...$/m";   //  matches last 3 characters of a each line. The dot is for a newline.

$return = preg_match_all( $pattern, $string, $results1);

print_r( $results1 );

$string = "first line
second line
";
$pattern = "/l....$/m";   //  matches last 3 characters of a each line. The dot is for a newline.

$return = preg_match_all( $pattern, $string, $results1);

print_r( $results1 );

?>