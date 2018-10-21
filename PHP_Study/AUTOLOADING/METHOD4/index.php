<?php
//Next 2 lines work.
//use Codecourse\Repositories\UserRepository as UserRepository;
//use Codecourse\Filters\Filters as Filters;

//Next 2 lines work.
use Codecourse\Repositories\UserRepository;
use Codecourse\Filters\Filters;

//Next 2 lines don't work.
//use Codecourse\Repositories;
//use Codecourse\Filters;

require_once "app/start.php";

$user = new UserRepository();
$user = new Filters();

?>