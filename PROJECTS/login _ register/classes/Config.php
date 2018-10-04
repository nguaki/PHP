<?php
//Traverses double nested associative array to find the
//key. This is very efficient to find a key by using
//hash map concept.  
class Config
{	public static function get($path = null)
	{
		if( $path )
		{
			$config = $GLOBALS['config'];
			
			//$path is now an array.
			$path = explode( '/', $path );
			
			//print_r( $path );
		
			foreach( $path as $bit )
			{
				//if the $bit exists, then jump into inner array.
				if( isset( $config[$bit] ) )
				{
					$config = $config[$bit];
				}
			}
			return $config;
		}
	
		return false;
	}
}

?>