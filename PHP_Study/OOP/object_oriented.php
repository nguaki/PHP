<?php
//OUTPUT:
//Hello .Matthew
//
//Simple demonstration of inheritance of OO.
//
class myClass
{
	public $name = "James";

	function myClass( $N )
	{
		$this->name = $N;
	}

	function SayHello()
	{
		echo "Hello .$this->name<br>";	
	}	
}

class ChildClass extends myClass
{
}

$ChildClass = new ChildClass( "Matthew" );

$ChildClass->SayHello();

?>