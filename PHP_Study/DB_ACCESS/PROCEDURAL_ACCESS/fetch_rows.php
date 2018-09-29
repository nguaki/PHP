<?php
	$mysqli = new mysqli( "localhost", "root", "John0316", "test" );

	if (mysqli_connect_errno())
	{
		printf( "Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	else
	{
		printf( "Host information: %s\n", mysqli_get_host_info($mysqli));
		echo "<br>";
		
		$sql = "SELECT * FROM employee";
		$res = mysqli_query( $mysqli, $sql );
		
		if( $res )
		{
			$number_of_rows = mysqli_num_rows( $res );
			printf( "Result set has %d rows. \n", $number_of_rows );
			echo "<br>";
	
			
			echo "<table style=\"border: 1px solid #000;\">\n";
			echo "<tr> \n";


			while( $newArray= mysqli_fetch_array($res,MYSQLI_ASSOC))
			{
				$id = $newArray['id'];
				$first_name = $newArray['first_name'];
				$last_name = $newArray['last_name'];
				$status = $newArray['status'];

				//echo "$id	$first_name	$last_name	$status<br/>";
			
				echo "<td style=\"border: 1px solid #000; width: 10px; text-align:left;\">";
				echo $id;
				echo "</td>";
				echo "<td style=\"border: 1px solid #000; width: 50px; text-align:left;\">";
				echo $first_name;
				echo "</td>";
				echo "<td style=\"border: 1px solid #000; width: 50px; text-align:left;\">";
				echo $last_name;
				echo "</td>";
				echo "<td style=\"border: 1px solid #000; width: 5px; text-align:left;\">";
				echo $status;
				echo "</td>";
				echo "<tr> \n";

			}
		}
		else
		{
			printf( "Could not retrieve records. %s\n", mysqli_error($mysqli));
		}
		
		mysqli_free_result($res);
		mysqli_close($mysqli);
	}	
?>