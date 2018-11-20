<?php
use Acme\PurchaseController1;
use Acme\Billing\StripeBilling;

class  PurchaseController2Test extends PHPUnit_Framework_TestCase
{

	public function test_coupled_objects()
	{
		$result = (new PurchaseController1(new StripeBilling))->buy();
		
		var_dump($result);
	}
}
