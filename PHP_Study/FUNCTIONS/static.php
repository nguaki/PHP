<?php
// OUTPUT: 
//	1.Hello There
//  2.Life sucks but still worth a living
//
// Demonstration of baby-global static variable.

	function print_A_Line( $AText )
	{
		static $iCount = 1;
	
		echo "<h1>" . $iCount . "." . $AText ."</h1>\n";
		$iCount ++;
	}

	print_A_Line( "Hello There" );
	print_A_Line( "Life sucks but still worth a living" );
	
?>