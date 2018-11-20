<?php

class MockTest extends PHPUnit_Framework_TestCase
{

	public function test_mockery()
	{
		//Nov 12, 2018
		//Mocking is a way to fake calling.
		//This is not a good example of mocking.
		//A good example is as follows:Lets say you need to test
		//a method which inserts a row of a new user and send an
		//email to the user.  We don't want to sent an email to a new user.
		//But we still need to test the function.
		//So we can actually call the function and skip sending an email line.
		$mock = Mockery::mock('acme\Bar');	
		
		//Run once and let it return a string.
		//This example doesn't test the real code.
		//So I think this is a waste of testing but for the sake of learning mocking, it is here.
		$mock->shouldReceive('run')->once()->andReturn('mocked');
		
		$this->assertEquals( 'mocked', $mock->run() );
		
		//This is the actual source code.
		$this->assertEquals( 'running from Bar', (new acme\Bar)->run());
	}
}
?>