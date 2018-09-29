<?php
//Daily assistance with bathing and dressing
//Medication management
//Laundry
//Grooming needs
//wi-fi
//pets allowed
//smoking allowed indoor

	//$theData is an an array of objects where its member is Service.
	//
	//    |------------|
	//    | Service    |  ->  [Description]
	//    |------------|
	//    |------------|
	//    | Service    |  ->  [Description]
	//    |------------|
	//    |------------|
	//    | Service    |  ->  [Description]
	//    |------------|
	//    |------------|
	//    | Service    |  ->  [Description]
	//    |------------|
	//
	$theData = simplexml_load_file("services.xml");
	

	foreach( $theData->Service as $theService )
	{
		$TheService = $theService->Description;

		echo "$TheService<br>";

		//I don't see why this has to be deleted.
		//unset($TheService);
	}
?>