<?php
require_once '../core/init.php';

//echo Config::get('mysql/host');
//$string = 'mysql:host=' . Config::get('mysql/host') . '\;dbname=' . Config::get('mysql/db') . 
//			                       Config::get('mysql/username') . Config::get('mysql/password');

//echo $string;
/**$user = DB::getInstance()->get('users', array( 'username', '=', 'alex' ));
if( !$user->count())
{
	echo 'No user';
}
else
{
	echo $user->first()->username;
}  **/

/* $user = DB::getInstance()->insert('users', array( 
			'username' => 'Dale',
			'password' => 'password',
			'salt' => 'salt'
		)); */
$user = DB::getInstance()->update('users', 2,  array( 
			'password' => 'newpassword',
			'name' => 'Dale Barrett' ) );
?>