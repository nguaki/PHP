<?php

function getPrice( $findBook )
{
	$Books = array( 
					"Java" => 30,
					"C" => 25,
					"PHP" => 40,
				  );
				  
	foreach( $Books as $Book=>$Price )
	{
		if( $findBook == $Book )
		{
			return $Price;
			return;
		}
	}
}

?>