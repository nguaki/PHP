<?php
session_start();

//fclose(STDOUT);
//fclose(STDERR);
$STDOUT = fopen('application.log', 'wb');
$STDERR = fopen('error.log', 'wb');

	$GLOBALS['config'] = array(
			'mysql' => array(
				'host' => getenv('IP'),
				'username' => getenv('C9_USER'),
				'password' => '',
				'db' => 'dblogin',
				'dbport' => 3306 
				),
				
			'remember' => array( 
				'cookie_name' => 'hash',
				'cookie_expiry' => 604800
			),
			
			'session' => array(
				'session_name' => 'user'
			)
);

/*
spl_autoload_register( function($class){
						require_once '../classes/' . $class . '.php';
				});

require_once '../functions/sanitize.php';
*/				

class Config
{	public static function get($path = null)
	{
		if( $path )
		{
			$config = $GLOBALS['config'];
			$path = explode( '/', $path );
			
			//print_r( $path );
		
			foreach( $path as $bit )
			{
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