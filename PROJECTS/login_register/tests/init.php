<?php
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
												  ),	
								'weather' => array(
														'city'    => 'kansas city',
														'country' => 'us',
														'api_id'  => 'e44e3488ccc2774c03bddffbb8161aed',
														'url'     => 'http://api.openweathermap.org/data/2.5/weather?q=',
														'unit_time' => 'min',     //min or sec
													    'refresh_rate'	=> 1
												  )											  
							);

 spl_autoload_register( function($class){
						$file = dirname(__FILE__) . '/../classes/' . $class . '.php';
	                    if(file_exists($file))
                                require_once($file);
	});
?>