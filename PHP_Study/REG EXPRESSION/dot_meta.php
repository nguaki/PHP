<?php
// OUTPUT
// Array ( [0] => Array ( [0] => a-b-c [1] => a.b.c [2] => a&b&c [3] => a0b0c ) )
// Array ( [0] => Array ( [0] => a.b.c ) )
$string = "a-b-c  a.b.c  a&b&c  a0b0c";

$pattern = "/a.b.c/";   // . matches any character except newline.

$return = preg_match_all( $pattern, $string, $results1);

print_r( $results1 );

$pattern = "/a[.]b[.]c/";   // [.] dot inside a character class in no longer a metacharacter
$return = preg_match_all( $pattern, $string, $results1);

print_r( $results1 );

?>