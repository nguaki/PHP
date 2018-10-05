<?php
session_start();

$GLOBALS['config'] = array(
								'mysql' => array(
										    		//'host' => '127.0.0.1',
													'host' => getenv('IP'),
													//'username' => 'root',
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
														'session_name' => 'user',
														'token_name'    => 'token'
												  )	
							);

spl_autoload_register( function($class){
						require_once '../classes/' . $class . '.php';
				});

require_once '../functions/sanitize.php';
				
//If cookie exists but session doesn't exists and user wants to login.
if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name')))
{
	$hash = Cookie::get(Config::get('remember/cookie_name'));
	
	//Check is hash value from DB and hash value kept in $_COOKIE matches.
	//This means, the user wants to be remembered.
	$dbObj = DB::getInstance()->get( 'users_session', array( 'hash', '=', $hash));

    if( $dbObj->count() > 0 ){
    	$user = new User($dbObj->first()->user_email);
    	echo "user = ";
    	var_dump($user);
    	$user->login();
    } 
}
?>