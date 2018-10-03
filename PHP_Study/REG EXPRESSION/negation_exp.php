<?php
/* OUTPUT

Notice that the match string is 4 characters long since the pattern looking for is 4 characters long.
Array ( [0] => Array ( [0] => php6 [1] => php9ABC ) )
*/
$string1 = "php4   php5  php6  php9";
$pattern = "/php[^1-5]/";  #Remember it is looking for a match of 4 characters.


$return = preg_match_all( $pattern, $string1, $results, PREG_PATTERN_ORDER);

print_r( $results );

?>