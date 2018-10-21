<?php
//Escape string for display to browser.
function escape( $string ) 
{
	return htmlentities( $string, ENT_QUOTES, 'UTF-8' );
}
?>