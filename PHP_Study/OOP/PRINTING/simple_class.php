<?php
// June 26, 2015
// EXPLAIN : 4 ways of printing.
//
//Oct 1, 2018  OP,KS  Printed
//
class ShopProduct {
	public $title				= "default product";
	public $producerMainName	= "main name";
	public $producerFirstName	= "first name";
	public $price				= 0;

	function getProducer()
	{
		return "{$this->producerMainName} {$this->producerFirstName}";
	}
};

$product1 = new ShopProduct();

//Concatenation.
print "author: " . $product1->producerMainName . " " . $product1->producerFirstName . "</br>";

//{} inside double quotes allow print to evaluate what is inside {} first.
print "author: {$product1->producerMainName} {$product1->producerFirstName}</br>";

//Utilizes a method function plus concatenation.
print "author: " . $product1->getProducer() . "</br>";

//Calls method function inside method function.
print "author: {$product1->getProducer()}</br>";

?>