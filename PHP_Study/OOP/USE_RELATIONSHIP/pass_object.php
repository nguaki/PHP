<?php
// June 29, 2015
// EXPLAIN : An object is passed in as an arguement.
//
//
// Oct 1, 2018
//    ShopProduct       <---------  ShopProductWriter 
//  |-------------|                |------------------|
//  |             |                |                  |
//  |-------------|                |------------------|
//
//  ShopProductWriter uses ShopProduct
//  This is different from Composition.
//
//  Don't be scared on an object.  Think of it as an extension of a struct.
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

// The object $shopProduct is passed in as an object.
// PHP is very loose in type since type declaration is not necessary.
class ShopProductWriter {
	public function write( $shopProduct )
	{
		$str = "{$shopProduct->title}: " .
				$shopProduct->getProducer() .
				"{$shopProduct->price}" . "</br>";
		print $str;
	}

};

$product1 = new ShopProduct( "servant", "James", "Che", 0.0 );

//print "author: {$product1->getProducer()}</br>";
$writer = new shopProductWriter();
$writer->write( $product1 );

?>