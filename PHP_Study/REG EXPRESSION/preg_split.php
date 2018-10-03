<?php
header( 'Content-Type: text/plain' );
/* OUTPUT
I am 
 a test 
 stringArray
(
    [0] => I
    [1] => am
    [2] => a
    [3] => test
    [4] => string
)
Array
(
    [0] => I
    [1] => am
    [2] => 

    [3] => a
    [4] => test
    [5] => 
    [6] => string
)
*/
$String = "I am \n a test \r string";
echo $String;
$Result = preg_split( "/[ \n\r]+/", $String );  // + plays profound role.
                                                // if there isn't +, "/n  " will be replaced with "    ".
												// + says that "/n   " will be replace with " ".
print_r( $Result );

print_r( explode( " ", $String ) );

//Looking at print_r() results, preg_split() is a better choice.
?>