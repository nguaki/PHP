<?php
session_start();
require_once 'apicaller.php';
 
$apicaller = new ApiCaller('APP001', '28e336ac6c9423d946ba02d19c6a2632', 'https://my-php-dguai.c9users.io/adgate/server/');
 
$name_items = $apicaller->sendRequest(array(
    'controller' => 'todo',
    'action' => 'read',
    'username' => $_SESSION['username'],
    'userpass' => $_SESSION['userpass']
));
 

require_once("view/names.html");
?>