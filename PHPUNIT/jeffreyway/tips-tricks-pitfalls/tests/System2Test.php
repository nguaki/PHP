<?php

class Systme2Test extends PHPUnit_Framework_TestCase{

	public function test_if_works(){
	
		$this->assertEquals( 'local time', (new acme2\System2)->go() );
	}
}
?>