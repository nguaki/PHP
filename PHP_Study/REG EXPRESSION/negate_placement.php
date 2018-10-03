<?php
/* OUTPUT
Array ( [0] => Array ( [0] => 1bond [1] => 2bond [2] => ^bond ) )
*/

$string1 = "1bond  2bond 9bond ^bond  6boxx";  //Since ^ is placed at the end, ^ has no meaning.  It is treated as another character.
$pattern = "/[1-5^]bond/";

$return = preg_match_all( $pattern, $string1, $results, PREG_PATTERN_ORDER);

print_r( $results );

?>