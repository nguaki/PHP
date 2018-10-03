<?php
//Sep 29, 18
//Q:Not sure what this is all about?
//  Does it mean to receive as text?
header( 'Content-Type: text/plain' );

$page = file_get_contents( 'http://youtube.com/' );  //Gets contents of this website.

//echo $page;

//Search for all lines that have <a  >   </a> tags.
preg_match_all( '#<a.*>(.*)</a>#Us', $page, $matches,  PREG_SET_ORDER );  //Not sure what Us modifier mean.

print_r( $matches );

#print ($matches[1]);   error message


$c = curl_init( 'http://youtube.com/' );  //Gets contents of this website.
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
$page = curl_exec($c);;
curl_close($c);

preg_match_all( '#<a.*>(.*)</a>#Us', $page, $matches,  PREG_SET_ORDER );  //Not sure what Us modifier mean.

print_r( $matches );

?>