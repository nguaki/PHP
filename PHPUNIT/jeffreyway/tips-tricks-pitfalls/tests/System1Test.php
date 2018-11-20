<?php

class SystmeTest extends PHPUnit_Framework_TestCase{

	public function test_if_works(){
	
		$this->assertNotEmpty( (new acme\System1)->go() );
	}
}
?>