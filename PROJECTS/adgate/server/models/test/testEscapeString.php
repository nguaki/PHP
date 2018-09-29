<?php
require_once '../database.php';
require_once '../escapeString.php';

class test_escapeString extends PHPUnit_Framework_TestCase
{
	public $test1, $test2;

	public function setUp() {
		 $mysqli = Database::getInstance()->getConnection();
		 $this->test1 = new escapeString($mysqli, array("fasgdfd, afdafda"));
		 $this->test2 = new escapeString($mysqli, array("fasgdfd/n, afdafda\n"));
	}

	public function testNoEscapeString() {
		 $escapedStrings = $this->test1->getEscapedStrings();
		 $this->assertTrue( $escapedStrings == array("fasgdfd, afdafda"));

	}

	public function testEscapeString() {
		 $escapedStrings = $this->test2->getEscapedStrings();
		 $this->assertTrue( $escapedStrings == array("fasgdfd/n, afdafda\\n"));
		 $this->assertFalse( $escapedStrings == array("fasgdfd/n, dafda\n"));

	}
}
 

?>