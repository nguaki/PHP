<?php
	$testing = "12345";     
	$testing = "12345-4561";     
	$testing = "12345-456A";     

	/*Checks if the value is a legitimate US zipcode.*/
	$zipcode_validator = "/^\d{5}(\-\d{4})?$/";
	//     / - start of a match.
	//     ^ - beginning 
	//     \d{5} - 5 digits
	//     ( - beginning of a set
	//     \-  looking for -
	//     \d{4} - four digits
	//     ) - closing of a set
	//     ? - the whole set can be either 0 or 1.
	//     $ - end
	
	if (preg_match( $zipcode_validator, $testing ) )
	{
		echo "A Match";
	}
	else
	{
		echo "No Match";
	}
	
?>