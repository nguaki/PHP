<?php
/*OUTPUT
Array ( [0] => 2012-10-20 [1] => 2012 [2] => 10 [3] => 20 ) Year: 2012
Month: 10
Month: 20
Array ( [0] => 2012-10-20 )*/

preg_match("/(\d{4})-(\d{2})-(\d{2})/", "2012-10-20", $results);
// () inserts the value into an array.  $results[0] will capture the entire thing.
// The first () is captured in $results[1].

print_r( $results );
echo("Year: $results[1]<br>");
echo("Month: $results[2]<br>");
echo("Month: $results[3]<br>");

preg_match("/\d{4}-\d{2}-\d{2}/", "2012-10-20", $results);
print_r( $results );
?>