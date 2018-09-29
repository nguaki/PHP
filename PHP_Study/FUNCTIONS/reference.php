<?php
//OUTPUT is 15
//Demonstration of reference in PHP.
//Notice the & in front the variable.
//It follows more C++ reference variable method.
//
//Sep 27, 2018  Commented   OP, KS
//
	function Add_number( &$X )
	{
		$X = $X + 5;
	}
	
	$XYZ = 10;

	Add_number( $XYZ );

	echo $XYZ;
	
?>