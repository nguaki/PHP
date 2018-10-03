<?php
/* OUTPUT
Array ( [0] => life )
*/
$string = "What a hard life.  But with God, I can stand up.";

$pattern = "/life|can/";

$found = preg_match( $pattern, $string, $result );  //Stops at first match.

print_r ($result); 

?>