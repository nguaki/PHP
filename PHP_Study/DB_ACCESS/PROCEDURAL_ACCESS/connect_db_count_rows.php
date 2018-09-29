<?php
//
//Retrieves number of rows returned using mysqli_num_rows() command.
//
//Sep 28, 18   OP,KS   Commented.
//
	$mysqli = new mysqli( "localhost", "root", "John0316", "test" );

	if (mysqli_connect_errno())
	{
		printf( "Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	else
	{
		printf( "Host information: %s\n", mysqli_get_host_info($mysqli));
		
		$sql = "SELECT * FROM employee";
		
		$res = mysqli_query( $mysqli, $sql );
		
		if( $res )
		{
			$number_of_rows = mysqli_num_rows( $res );
			printf( "Result set has %d rows. \n", $number_of_rows );
		}
		else
		{
			printf( "Could not retrieve records. %s\n", mysqli_error($mysqli));
		}
		
		mysqli_free_result($res);
		mysqli_close($mysqli);
	}	
?>