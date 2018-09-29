<?php

require_once '../database.php';
require_once '../queryDB.php';

class test_queryDB extends PHPUnit_Framework_TestCase
{
	public $test1, $test2;
	public $mysqli;
 
	public function setUp() {
		 $this->mysqli = Database::getInstance()->getConnection();
		 $this->test1 = new queryDB();
	}
    /**
     * @expectedException Failed to execute a query.
     */
	public function testWeirdQuery() {
		 //$test = $this->test1->query($this->mysqli, "aajfkjkelr");
 
		 //$this->setExpectedException('Failed to execute a query.');
		 try{
		 	$this->test1->query($this->mysqli, "update xyz");
			$this->fail();
		}
		catch( Exception $e) {
			
		}
	}



}
 

?>