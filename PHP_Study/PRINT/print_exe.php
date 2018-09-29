<?php
//
//Products                           Price
//----------------------------------------
//Green armchair                    222.40
//Candlestick                         4.00
//Coffee Table                       80.60
//  36
//244d

$products = array( "Green armchair" => "222.4",
					  "Candlestick" => "4",
					 "Coffee Table" => "80.6" );
						
	echo "<pre>";
	// - means left justification
	// I guess the default is right justification.
	printf( "%-20s%20s\n", "Products", "Price" );
	
	// notice ' character before -40s.
	//I guess this means 40 - 
	printf( "%'-40s\n", "" );

	//.2 means 2 decimal format.
	foreach( $products as $key=>$val ){
		printf( "%-20s%20.2f\n", $key, $val );
	}
	
	printf( "% 4d\n", 36 );
	printf( "%x4d\n", 36 ); //<==Not sure what this means
	
	echo "</pre>";
?>