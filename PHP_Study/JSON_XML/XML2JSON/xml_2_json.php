<?php
	$thedata = simplexml_load_file("books.xml");
	
	//<pre> tag makes it pretty.
	echo "<pre>";
	print_r($thedata);
	echo "</pre>";	
	
	// Dump it to json format.
	echo json_encode( $thedata );
?>
	