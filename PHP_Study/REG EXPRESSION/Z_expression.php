<?php
// OUTPUT :
//Array ( [0] => Array ( [0] => 3 ) ) 
//Array ( [0] => Array ( [0] => 3 ) )
//Array ( [0] => Array ( [0] => 1 [1] => 2 ) )

$string = "abc1
def2
ghi3";

$pattern = "/\d\Z/";  

$return = preg_match_all( $pattern, $string, $results1);

print_r( $results1 );

$pattern = "/\d\Z/m";   //  m modifier didn't change the result.

$return = preg_match_all( $pattern, $string, $results1);

print_r( $results1 );

$pattern = "/\d.$/m";   

$return = preg_match_all( $pattern, $string, $results1);

print_r( $results1 );
?>
?>



