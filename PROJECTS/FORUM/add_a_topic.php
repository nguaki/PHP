<?php
//
//  This program is called from addtopic.html.
//  There are three text inputs.
//
include 'ConnectDB.php';

vConnectDB( "test" );

//check for required fields from the form.
//If one of the fields is empty, just go back to the input field.(12-20-14)
if ((!$_POST['topic_owner']) || (!$_POST['topic_title']) || (!$_POST['post_text'])) {
	header("Location: addtopic.html");  //Very powerful statement.(12-20-14)
	exit;
}

//create safe values for input into the database.
// The question is that, is it safe enough?(12-20-14)
$clean_topic_owner = mysqli_real_escape_string($mysqli, $_POST['topic_owner']);
$clean_topic_title = mysqli_real_escape_string($mysqli, $_POST['topic_title']);
$clean_post_text = mysqli_real_escape_string($mysqli, $_POST['post_text']);

//create and issue the first query.
//(12-20-14)Remember that there are 4 columns, but here the specify 3 columns.
//The first column is auto-increment.  
//The alternative way of calling this is as follows:
// INSERT INTO forum_topics values ( NULL, '".$clean_topic_title."', now(), '".$clean_topic_owner."');
// The first statement is NULL value for the auto-increment.
// But this is very confusing since the type declaration is NON-NULL.  Wow. Very confusing.
$add_topic_sql = "INSERT INTO forum_topics (topic_title, topic_create_time, topic_owner) 
				  VALUES ('" .$clean_topic_title .  "', now(), '" .$clean_topic_owner. "')";
				  
// (12-20-14)Not sure why there is dot before and after.
// (12-21-14)Dot operator is just the concatenation operator.

$add_topic_res = $mysqli->query($add_topic_sql) or die($mysqli->error);

//get the id of the last query.
//Gets the auto increment value of the previous insert.
$topic_id = mysqli_insert_id($mysqli);

//create and issue the second query
$add_post_sql = "INSERT INTO forum_posts(topic_id, post_text, post_create_time, post_owner) 
                 VALUES ('".$topic_id."', '".$clean_post_text."',  now(), '".$clean_topic_owner."')";
				 
$add_post_res = $mysqli->query($add_post_sql) or die($mysqli->error);

//close connection to MySQL
$mysqli->close();
//create nice message for user
$display_block = "<p>The <strong>".$_POST["topic_title"]."</strong> topic has been created.</p>";
?>

<!DOCTYPE html>
<html>
<head>
<title>New Topic Added</title>
</head>
<body>
<h1>New Topic Added</h1>
<?php 
	 echo $display_block; 

	 echo "$topic_id<br>";
	 
	  //header("Location: showtopic.php?topic_id=".$_POST['".$topic_id."']);
	  header("Location: display_topic_list.php");

	  //header("Location: showtopic.php");  //(12-20-14)
										  //Very powerful command.  It goes to separate file.
	                                      //So what this tells me that the server recognizes the 
										  //existence of this file.  So somehow the all the files that
										  //exist on the same directory is in somekind of memory.

?>
</body>
</html>