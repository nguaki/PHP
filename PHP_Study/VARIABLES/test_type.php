<?php
//////////////////////////////////////////////////////////////////
//Sep 27, 2018
//
//Checks the type of a variable with is_xxxx() built in function.
//is an integer? 1
//is array? 1
//is numeric? 
//is resource? 
//Q:What is is_resource()?
//////////////////////////////////////////////////////////////////
	$testing;     //no assignment
	echo "is null? " . is_null($testing);
	echo "<br/>";
	$testing = 5;
	echo "is an integer? " . is_int($testing);
	echo "<br/>";
	
	$testing = array( 'apple', 'pear', 'lemon' );
	echo "is array? " . is_array($testing);
	echo "<br/>";

	echo "is numeric? " . is_numeric($testing);
	echo "<br/>";
	echo "is resource? " . is_resource($testing); 
	echo "<br/>";
	
?>