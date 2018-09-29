<?php
session_start();
include_once 'apicaller.php';

$apicaller = new ApiCaller('APP001', '28e336ac6c9423d946ba02d19c6a2632', 'https://my-php-dguai.c9users.io/adgate/server/');

//todo: sanitize data.
$new_item = $apicaller->sendRequest(array(
	'controller' => 'todo',
	'action'     => 'create',
	'first_name' => $_POST['first_name'],
	'last_name'  => $_POST['last_name'],
	'username'   => $_SESSION['username'],
	'userpass'   => $_SESSION['userpass']
));

header('Location: list_names.php');
exit();
?>