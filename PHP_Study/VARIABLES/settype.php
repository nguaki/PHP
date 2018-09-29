<?php
//
//Sets type of a variable.
//I don't recall doing this in C/C++.
//Wonder where this would be useful.
//3.14 is a double? 1
//3.14 is a string? 1
//3 is a integer? 1
//1 is a boolean? 1	
//
//Sep 27, 18     Commented    OP,KS
//
	$undecided = 3.14;
	
	echo "$undecided is a double? " . is_double($undecided). "<br/>";

	settype( $undecided, 'string' );
	echo "$undecided is a string? " . is_string($undecided). "<br/>";

	settype( $undecided, 'integer' );
	echo "$undecided is a integer? " . is_integer($undecided). "<br/>";

	settype( $undecided, 'bool' );
	echo "$undecided is a boolean? " . is_bool($undecided). "<br/>";

?>