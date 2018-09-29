<?php
function vConnectDB( $sDBName )
{
	global $mysqli;
	
	$mysqli = new mysqli( "localhost", "root", "John0316", "test" );

	######
	# 12-12-14  Gets the error number of the connection.
	######	
	#if (mysqli_connect_errno())
	if ( $mysqli->connect_errno )
	{
		printf( "Connect failed: %s\n", $mysqli->connect_errno );
		exit();
	}
	
	#######
	# 12-12-14 Now use a database.  If the DB doesn't exists, exit out
	#          of the program.
	#######
	$bResult = $mysqli->select_db( $sDBName );
	if( $bResult == FALSE )
	{
		printf( "$sDBName database doesn't exists. \n" );
		exit();
	}
}
?>