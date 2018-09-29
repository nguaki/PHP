<?php
//Demonstration powerful getdate() command.
//One simple command gets all these values.
//Note that these values are stored as (key,value) hash associative array.
//seconds	31 
//minutes	14 
//hours	2 
//mday	28 
//wday	5 
//mon	9 
//year	2018 
//yday	270 
//weekday	Friday 
//month	September 
//0	1538100871 

//Today is Friday,September 28,2018   <== Coming from getdate()
//Friday, September 28 2018           <== Coming from time() and date()

$date_array = getdate();

foreach( $date_array  as $key=>$value )
{
	echo "$key	$value <br>";
}
	
echo"Today is " . $date_array['weekday'] . "," . 

$date_array['month'] . " " . $date_array['mday'] . "," . $date_array['year'] . "<br>";

//Here is another way getting date using time() and parsing 
//using date() function.
$time = time();
// This method is so easier way to format.
echo date( "l, F d Y", $time );  // l (day of week) F (Month) d(day of month) Y(year)
?>