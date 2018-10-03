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

/*var_dump
array(3) { 
	[0] => array(3) { 'name' => string(10) "Angela Kim" 
					  'age' => int(52) 
					  'occupation' => string(19) "Japanese Evangelist" 
					} 
	[1] => array(3) { 'name' => string(9)  "James Che" 
					  'age' => int(49) 
					  'occupation' => string(10) "Gingiskhan" 
					} 
    [2] => array(3) { 'name' => string(8) "John Che" 
    				  'age' => int(51) 
    				  'occupation' => string(14) "Civil Engineer" } }
*/
$characters = array (
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
	
   var_dump($characters);
	
	
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
	
	for( $key = 0, $size = count($characters); $key < $size; $key++ )
	{
		XPrint($characters[$key]);
	}
	foreach( $characters as $c )
	{
		XPrint($c);
	}
	
	function XPrint($x)
	{
		foreach( $x as $key=>$value )
		{
			echo "$key ............ $value </br>";
		}
	}
?>