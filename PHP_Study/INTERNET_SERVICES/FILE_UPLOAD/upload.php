<?php
//Supposed to upload a file and move to a directory.
//

//$file_dir = "C:\Users\james che\Downloads";
$file_dir = "C:\\temp";

foreach( $_FILES as $file_name => $file_array )
{
	echo "path:   ".$file_array['tmp_name']. "<br/>";
	echo "name:   ".$file_array['name']. "<br/>";
	echo "type:   ".$file_array['type']. "<br/>";
	echo "size:   ".$file_array['size']. "<br/>";
	
	if( is_uploaded_file($file_array['tmp_name']))
	{
		move_uploaded_file($file_array['tmp_name'], 
			$file_dir . "\\" . $file_array['name']) or die( "Couldn't move file" );
		echo "File was moved to" . $file_dir . "!";
	}
	else
	{
		echo "No file was found.";
	}
}
?>