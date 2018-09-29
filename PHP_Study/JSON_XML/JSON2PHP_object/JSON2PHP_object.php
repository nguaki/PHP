<?php
	$thedata = file_get_contents("books.txt");
	
	echo "<pre>";
	print_r( json_decode($thedata));
	echo "</pre>";	
?>
	