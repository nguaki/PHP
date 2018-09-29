<?php
session_start();
include_once 'apicaller.php';

$apicaller = new ApiCaller('APP001', '28e336ac6c9423d946ba02d19c6a2632', 'https://my-php-dguai.c9users.io/adgate/server/');

$new_item = $apicaller->sendRequest(array(
	'controller' => 'todo',
	'action' => 'delete',
	'name_id' => $_GET['name_id'],
	'username' => $_SESSION['username'],
	'userpass' => $_SESSION['userpass']
));

header('Location: list_names.php');
exit();
?>