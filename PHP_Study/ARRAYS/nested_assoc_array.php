<?php
//Oct 2, 2018
//In PHP, there is no indexing.
//This will not work.
//$datas[4] = array(

	$datas = array(
					array( 
						"email"=>"sahfkashf@gmail.com", 
						"password"=>"178899098"
					),
					array( 
						"email"=>"sahfkashfgmail.com", 
						"password"=>"178899098"
					),
					array( 
						"email"=>"", 
						"password"=>"178899098"
					),
					array( 
						"email"=>"sahfkashf@gmail.com", 
						"password"=>"78899098"
					)
				);
				
	foreach( $datas as $c )
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