<?php

$string = "123dollars  abcpeople";

$pattern = "/(?(\d+)dollars|people)/";
//Warning: preg_match_all(): Compilation failed: assertion expected after (?( at offset 3 in C:\xampp\htdocs\xampp\my_exercises\regular //expressions\conditional_exp.php on line 7
$return = preg_match_all( $pattern, $string, $results1);

print_r( $results1 );

?>