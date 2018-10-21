<?php
//  July 13, 2015
//  OUTPUT:
//
//	http://localhost:8080/xampp/my_exercises/php/WebServices/?book=Java
//  {"status":200,"status_message":"Book found","data":30}
//  
//  http://localhost:8080/xampp/my_exercises/php/WebServices/?book=C
//  {"status":200,"status_message":"Book found","data":25}
//
//  http://localhost:8080/xampp/my_exercises/php/WebServices/?book=Czz
//  {"status":200,"status_message":"Book NOT found","data":null}
//
//
include "functions.php";
//header( "Content-Type : Application/json" );   // <== Not sure what this does.

if( !empty( $_GET['book'] ) )
{
	
	$price = getPrice( $_GET['book'] );
	
	if( empty( $price ) )
	{
		deliver_response( 200, "Book NOT found", NULL );
	}
	else
	{
		deliver_response( 200, "Book found", $price );
	}
}
else
{
		deliver_response( 400, "Input missing", NULL );

}

function deliver_response( $status, $status_message, $data )
{
	header( "HTTP/1.1 $status $status_message" );   // <== Not sure what this does.
	
	$response['status'] = $status;
	$response['status_message'] = $status_message;
	$response['data'] = $data;
	
	$json_response = json_encode( $response );
	
	echo $json_response;
	
}
?>