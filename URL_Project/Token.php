<?php
//Checks for CSRF attack by comparing tokens from the form and _SESSION.
class Token
{
	public static function generate()
	{
		// It is very important to assigns to $_SESSION[] when a token is generated.
		return $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
	}
	
	public static function check($token)
	{
		// Checks if the token matches.  This is the crux of CSFR prevention.
		if( isset($_SESSION['token']) && $token === $_SESSION['token'] ) //Check the type also,not just the value.
		{
			unset( $_SESSION['token']); //Once it is used, delete the token. Token gets generated whenever there is a refresh.
			return true;
		}
		return false;
	}
}