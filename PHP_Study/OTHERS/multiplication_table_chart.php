<?php
// Draws multiplcation chart in table format.
// Uses echo commands to display html tags.
// Use backslash to escape double quotes(make double quotes literal.)
//
// Note that this file has extension of PHP.
// However, with echo() statements, it will send out
// html lines which APACHE will interpret as HTML.
//
// Sep 27, 2018   Commented   OP, KS
//
	echo "<table style = \"border: 1px solid #000;\">\n";

	for( $across = 1; $across <= 100; $across++ )
	{
		echo "<tr> \n";
		for( $down = 1; $down <= 100; $down ++ )
		{
			echo "<td style = \"border: 1px solid #000; width: 25px; text-align:center;\">\n";
			echo ( $across * $down );
			echo "</td> \n";
		}
		echo "</tr>";
	}
	echo "</table>";
?>