<?php

$clean_topic_owner = "xyz";
$clean_topic_title = "abc";

// 12-20-14
// The previous 2 Query strings are identical.
// The dot is concatenation.
// By first query makes the dot operation in action in more clear way.
$Query = "INSERT INTO forum_topics (topic_title, topic_create_time, topic_owner) VALUES ('" .
				  $clean_topic_title .
				  "', now(), '" .
				  $clean_topic_owner .
				  "')";
$Query = "INSERT INTO forum_topics (topic_title, topic_create_time, topic_owner) 
          VALUES ('" .$clean_topic_title."', now(), '" .$clean_topic_owner ."')";
			  
echo "$Query<br>";

//INSERT INTO forum_topics (topic_title, topic_create_time, topic_owner) VALUES ('abc', now(), 'xyz')

				  
//$Query1 = "INSERT INTO forum_topics (topic_title, topic_create_time, topic_owner) 
				 // VALUES ('"$clean_topic_title"', now(), '"$clean_topic_owner"')";
				  //Parse error: syntax error, unexpected '$clean_topic_title' (T_VARIABLE) in      C:\xampp\htdocs\xampp\my_exercises\Ch21\test.php on line 11
//echo "$Query1<br>";
?>