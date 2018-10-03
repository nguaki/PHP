<?php
// Array ( [0] => Array ( [0] => abc [1] => def [2] => ghi [3] => jkl ) )
// Array ( [0] => rrrr ) )
$string = "adfdaf abc
adfafa def
dfgfdgads ghi
qewrqr jkl
rrrr";

$pattern = "/....$/m";   //  matches last 3 characters of a each line .

$return = preg_match_all( $pattern, $string, $results1);

print_r( $results1 );

$pattern = "/^rrrr$/m";   //  matches last 3 characters of a each line .

$return = preg_match_all( $pattern, $string, $results1);

print_r( $results1 );

?>