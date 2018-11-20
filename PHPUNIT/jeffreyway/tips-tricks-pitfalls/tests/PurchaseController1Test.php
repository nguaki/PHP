<?php
use Acme\PurchaseController1;

class  PurchaseController1Test extends PHPUnit_Framework_TestCase
{

	public function test_coupled_objects()
	{
		$result = (new PurchaseController1)->buy();
		
		var_dump($result);
	}
}
