<?php
/*  OUTPUT
Array ( [0] => http://www.php.net [1] => www.php.net ) 
host is: www.php.net 
domain name is: php.net
*/
// get host name from URL

// I don't understand this

preg_match('@^(?:http://)?([^/]+)@i', "http://www.php.net/index.html", $matches);
//  @   -  delimeter character
//  ^   -  must start with this character.
//  ()  -  capture this into [1]
//  ?:   -  i don't understand what this is.  My best guess is if "http://" exists check for non '/' characters.
//          So in the above case, it will go all the way before  "/index.html".  
//          So, it will match for  "http://www.php.net".
//  ?    -  0 or 1 times
//  ()  - capture this into [2] (not sure)
//  [^/] - everything except / character
//  +  -  1 or more repeats
//  @   -  end of the delimeter
//  i  -  case insensitive
print_r( $matches );
echo "<br>";
$host = $matches[1];
echo "host is: $host <br>";

// get last two segments of host name
// $host = www.php.net

preg_match('/[^.]+\.[^.]+$/', $host, $matches);
//  [^.]    -  get all characters that is not '.' character.
//  +       -  one or more 
//  e.g.    abcdef123ad   will be fine.
//  \.      -  must be a '.'  character
//  e.g.    abcdef123ad.  will be fine.
//  [^.]    -  get all characters that is not '.' character.
//  +       -  one or more 
//  $       -  must end.
//  Whatever matches this pattern, will be stored in $matches[0].
//
echo "domain name is: {$matches[0]}\n";
// This pattern is more correct than the above.
// The suffix after . should be limited in size.
preg_match('/[^.]+\.[^.]{2,5}$/', $host, $matches1);
echo "domain name is: {$matches1[0]}\n";

?>