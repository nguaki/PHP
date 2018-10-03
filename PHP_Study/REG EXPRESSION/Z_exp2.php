<?php
// OUTPUT :
//Array ( [0] => Array ( [0] => 3 ) )
$string = "abc1
def2
ghi3
";

$pattern = "/\d.\Z/";  

$return = preg_match_all( $pattern, $string, $results1);

print_r( $results1 );
?>