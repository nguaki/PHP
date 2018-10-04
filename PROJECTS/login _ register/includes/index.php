<?php
require_once '../core/init.php';

//First time call, it will display success message and then delete the message.
//When the browser refreshes, the message is no longer there.
var_dump($_SESSION);
if(Session::exists('success'))
	echo Session::flash('success');
	
if(Session::exists('home'))
	echo Session::flash('home');
	
?>