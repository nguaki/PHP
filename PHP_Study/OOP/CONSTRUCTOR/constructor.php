<?php
// June 26, 2015
// EXPLAIN : A constructor example.
//
class ShopProduct {
	public $title				= "default product";
	public $producerMainName	= "main name";
	public $producerFirstName	= "first name";
	public $price				= 0;

	function __construct( $title, $firstName, $lastName, $price )
	{
		$this->title = $title;
		$this->producerMainName = $firstName;
		$this->producerFirstName = $lastName;
		$this->price = $price;
	}
	
	function getProducer()
	{
		return "{$this->producerMainName} {$this->producerFirstName}";
	}
};

$product1 = new ShopProduct( "servant", "James", "Che", 0.0 );

print "author: {$product1->getProducer()}</br>";


?>