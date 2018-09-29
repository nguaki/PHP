<?php
session_start();
require_once 'apicaller.php';
//get the form values
$username = $_POST['login_username'];
$userpass = $_POST['login_password'];
 
//session_start();
$_SESSION['username'] = $username;
$_SESSION['userpass'] = $userpass;

$apicaller = new ApiCaller('APP001', '28e336ac6c9423d946ba02d19c6a2632', 'https://my-php-dguai.c9users.io/adgate/server/');

$authentication = $apicaller->sendRequest(array(
	'controller' => 'todo',
	'action' => 'check',
	'username' => $_SESSION['username'],
	'userpass' => $_SESSION['userpass']
));

if(isset($authentication) && $authentication ){
    header('Location:list_names.php');
} else {
    header('Location:index.php');
}
?>