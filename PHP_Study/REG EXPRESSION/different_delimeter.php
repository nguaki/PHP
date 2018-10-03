<?php

$string = "http://www.xyz.com";
if( preg_match("/http:\/\//", $string ) )     # match http:// protocol prefix with / delimiter
{
	echo "Match";
}
else
{
	echo "No Match";     
}
echo "<br>";


//Much easier way to express the pattern than the above.
if( preg_match("#http://#",   "http://"))      # match http:// protocol prefix with # delimiter
{
	echo "Match";
}
else
{
	echo "No Match";     
}
?>