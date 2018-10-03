<?php
/*Array ( [0] => Array ( [0] => abc ) ) 

Array ( [0] => Array ( [0] => abc [1] => def [2] => ghi [3] => jkl ) ) <== gets first 3 characters of each line.

Array ( [0] => Array ( [0] => g [1] => j ) )
*/
$string = "abc
def
ghi
jkl";

$pattern = "/^.../";   //  matches first 3 characters of a string .

$return = preg_match_all( $pattern, $string, $results1);

print_r( $results1 );

$pattern = "/^.../m";   //  m modifier - multiple lines

$return = preg_match_all( $pattern, $string, $results1);

print_r( $results1 );

$pattern = "/^[^ad]/m";   //  new lines that starts with not 'a' nor 'd'.

$return = preg_match_all( $pattern, $string, $results1);

print_r( $results1 );
?>