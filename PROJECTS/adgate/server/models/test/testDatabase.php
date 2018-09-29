<?php

require_once '../database.php';
require_once '../queryDB.php';

class test_DBconnection extends PHPUnit_Framework_TestCase
{
	public $test1, $test2;
	public $mysqli;
 
	public function setUp() {
		$this->mysqli = Database::getInstance()->getConnection();
		//$this->test1 = new queryDB();
	}

	public function testSuccessSelect() {
		$results = $this->mysqli->query("select * from admin_login");
		
		$this->assertGreaterThanOrEqual(1, count($results));
				
	}

}
 

?>