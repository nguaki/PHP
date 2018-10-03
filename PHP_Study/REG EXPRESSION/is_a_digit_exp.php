<?php
/* OUTPUT
Array ( [0] => Array ( [0] => 22 [1] => 23 [2] => 25 ) ) 
Array ( [0] => Array ( [0] => 2A [1] => 2B ) )
*/

$string = "223  23AB  afd25   ere2A  werewr2B";

$pattern1 = "/2\d/";  # 2 and a digit.
$return = preg_match_all( $pattern1, $string, $results1, PREG_PATTERN_ORDER);

print_r( $results1 );
echo "<br>";

$pattern2 = "/2\D/";  # 2 and a non-digit
$return = preg_match_all( $pattern2, $string, $results2, PREG_PATTERN_ORDER);

print_r( $results2 );

?>