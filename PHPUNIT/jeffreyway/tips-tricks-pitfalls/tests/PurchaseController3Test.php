<?php
use Acme\PurchaseController3;
use Acme\Billing\StripeBilling;

class  PurchaseController3Test extends PHPUnit_Framework_TestCase
{

	public function test_mockery_object()
	{
	    $mock = Mockery::mock('Acme\Billing\StripeBilling');
	    //We are setting up what to return.
	    //shouldReceive is a weird name but it is expecting a method called 'charge()'.
	    //Call charge() method once and it should return "You have been X'd".
	    //So somehow when buy() method is called, this mock setup becomes the
	    //precedence over the actual souce code.
	    $mock->shouldReceive('charge')->once()->andReturn("You have been X'd");
	    
		$result = (new PurchaseController3($mock))->buy();
		
		//.string(17) "You have been X'd"
		var_dump($result);
	}
}
