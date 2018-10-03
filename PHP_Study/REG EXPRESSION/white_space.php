<?php
/*
OUTPUT
Array ( [0] => Array ( [0] => [1] => [2] => [3] => [4] => [5] => [6] => [7] => [8] => ) )

Array ( [0] => Array ( [0] => b [1] => c [2] => d [3] => e [4] => f [5] => g [6] => h [7] => i ) )
*/
$string = "a b c d e f g h
i".

$pattern = "/\s/";   // \s is a character class consists of space,tab, new line, carriage return, vertical tab, form feed

$return = preg_match_all( $pattern, $string, $results1);

print_r( $results1 );

$pattern = "/\s\S/";   // \S  is a character class consists of {^\s}

$return = preg_match_all( $pattern, $string, $results1);

print_r( $results1 );


?>