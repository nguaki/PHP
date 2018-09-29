<?php
//OUTPUT:
//name ............ Angela Kim 
//age ............ 52 
//occupation ............ Japanese Evangelist 
//name ............ James Che 
//age ............ 49 
//occupation ............ Gingiskhan 
//name ............ John Che 
//age ............ 51 
//occupation ............ Civil Engineer 
//
//Using foreach($c as $key=>$value)
//name ............ Angela Kim 
//age ............ 52 
//occupation ............ Japanese Evangelist 
//name ............ James Che 
//age ............ 49 
//occupation ............ Gingiskhan 
//name ............ John Che 
//age ............ 51 
//occupation ............ Civil Engineer 
//
//Two ways of printing key value.
// 1. while(list($key,$value) = each($c))
//
// 2. foreach( $c as $key => $value )
//
	$characters = array(
				array(
					"name" => "Angela Kim",
					"age" => 52,
					"occupation" =>	"Japanese Evangelist"
				     ),
				array(
					"name" => "James Che",
					"age" =>49,
					"occupation" => "Gingiskhan"
				     ),
				array(
					"name" => "John Che",
					"age" =>51,
					"occupation" => "Civil Engineer"
				     )
			   );
	

	foreach( $characters as $c )
	{
		//Uses list() and each().
		while( list($k, $v) = each( $c ) )
		{
			echo "$k ............ $v </br>";
		}
		echo"<hr/>";
	}
	
	foreach( $characters as $c )
	{
		foreach( $c as $key=>$value )
		{
			echo "$key ............ $value </br>";
		}
		echo"<hr/>";
	}
?>