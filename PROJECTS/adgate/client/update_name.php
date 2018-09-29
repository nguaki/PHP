<?php
session_start();
require_once 'apicaller.php';

$apicaller = new ApiCaller('APP001', '28e336ac6c9423d946ba02d19c6a2632', 'https://my-php-dguai.c9users.io/adgate/server/');
error_log("triggering update client");

$post_data = file_get_contents("php://input");
//var_dump($post_data);
$data = json_decode($post_data);

//error_log($_GET);
error_log($data->name_index);
error_log($data->first_name);
error_log($data->last_name);

$new_item = $apicaller->sendRequest(array(
	'controller' => 'todo',
	'action' => 'update',
	'name_id' => $data->name_index,
	'first_name' => $data->first_name,
	'last_name' => $data->last_name,
	'username' => $_SESSION['username'],
	'userpass' => $_SESSION['userpass']
));

header('Location: list_names.php');
exit();
?>