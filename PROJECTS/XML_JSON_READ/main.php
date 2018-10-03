<?php
	# Nov 15, 2014
	# Interesting concept.But I am not really overwhelmed by it.
	# It's a concept of interface where 2 classes inherit a skeleton
	# base  class (interface class is what is called).  Depends on 
	# which file is the input (XmL or Jason), I can comment one out
	# instead of others.  I am getting an error message if both co-exists.
	# Feb 25, 2014  - this error is resolved.
	# 
	#
	
	// For reading Json file as an input.	
	require 'JsonRepository.php';     
	
	// For reading XML file as an input.	
	require 'XMLRepository.php';        

	
	function printRepo( $postRepository, $source, $recordID )
	{
		echo '<h1>' . $source . '<h1>';
		echo '<br>';
		
		//var_dump($postRepository);
		$posts = $postRepository->All();   //Get all contents.

		echo '<ul>';
		foreach($posts as $post)
		{
			echo '<li>'. $post->title . '</li>';
			//echo '<li>'. $post->author . '</li>';
			echo '<li>'. $post->body . '</li>';
	
			echo '========================<br>';
		}
		echo '</ul>';
		
		$post = $postRepository->Find($recordID);   // Get just the third one.
		echo "item # $recordID: <br>";
		echo '<h1>Title:' . $post->title . '</h1>';
		echo '<h1>Body:' . $post->body . '</h1>';
	}	
	
	$RepoType = $_POST["format_type"];
	$RecordID = $_POST["record_id"];

    echo 'RecordID = ' . $RecordID;
    echo '<br>';
    
    if ($RepoType == "xml")	$className = "XMLRepository";
    else $className = "JsonRepository";
    
	$postRepository = new $className();  // Instantiating an object to read Json file.
    printRepo($postRepository, $className, $RecordID);
    
	/*
	$postRepository = new JsonRepository();  // Instantiating an object to read Json file.
    printRepo($postRepository, "FROM JSON");
    $postRepository = new XMLRepository();     // Instantiating an object to read XML file.
    printRepo($postRepository, "FROM XML");
    */
?>