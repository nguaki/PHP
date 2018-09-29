<?php
//OUTPUT
//
//Make me Bold
//Under line and italicize me
//Under line and italicize me
//"Double quote me and italicize me"
//
//Sep 27, 18  Checks if such a function exists.
//            Creates function dynamically.
//
	//Notice the declaration function in PHP.
	//C/C++ does not need the keyword function.
	//The number of variables is variadic.
	//The third parameter is default parameter.
	function WrapText( $Tag, $Txt, $func = "" )
	{
		//If Tag is not empty and function exists.
		if( !empty($Tag) && function_exists( $func ) )
		{
			$Txt = $func( $Txt );
			return "<" . $Tag .">" . $Txt . "</" . $Tag . ">";
		}
		else
		{
			return "<" . $Tag .">" . $Txt . "</" . $Tag . ">";
		}
	}


	//This function underlines a text using CSS.
	function underline_me( $Txt )
	{
		return "<span style=\"text-decoration:underline;\">" . $Txt . "</span>";
	}

	//Executes echo() statements to print HTML statements.
	echo WrapText( "Strong", "Make me Bold" );
	echo "<br>";
	echo WrapText( "em", "Under line and italicize me", "underline_me1" );
	echo "<br>";
	echo WrapText( "em", "Under line and italicize me", "underline_me" );
	echo "<br>";
	echo WrapText( "em", "Double quote me and italicize me", 
			create_function( '$Txt', 'return "&quot;$Txt&quot;";'));//refer to pg 134&135
	echo "<br>";

?>