<?php
//Sep 29, 18
//
//Takes care of nested XML file.
//Need to learn how to read XML file.
//
//OUTPUT
//A very Good Book Jane Doe Sams Publishing Indianapolis 2012 
//Bible Holy Spirit Unknown Unknown 5000BC 
//
	$theData = simplexml_load_file("books.xml");

	foreach( $theData->Book as $theBook )
	{
		$TheBookTitle = $theBook->Title;
		$TheAuthor = $theBook->Author;
		$PublisherName = $theBook->PublishingInfo->PublisherName;
		$PublisherCity = $theBook->PublishingInfo->PublisherCity;
		$PublisherYear = $theBook->PublishingInfo->PublishedYear;

		echo "$TheBookTitle $TheAuthor $PublisherName $PublisherCity $PublisherYear <br>";

		unset($TheBookTitle);
		unset($TheAuthor);
		unset($PublisherName);
		unset($PublisherCity);
		unset($PublisherYear);
	}
?>
		
