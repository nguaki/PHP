<?php
##################
#  Displays all posts of a given topic.
#  This script is called from 2 places:
#     1. Hyperlink from display_topic_list.php table.
#     2. A button from replytopost.pl table,
#
##################
include 'ConnectDB.php';

vConnectDB( "test" );

//check for required info from the query string
if (!isset($_GET['topic_id'])) {
	header("Location: display_topic_list.php");
	exit;
}

//create safe values for use
$safe_topic_id = mysqli_real_escape_string($mysqli, $_GET['topic_id']);

//verify the topic exist
$verify_topic_sql = "SELECT topic_title 
					 FROM forum_topics 
					 WHERE topic_id = '".$safe_topic_id."'";
					 
$verify_topic_res =  $mysqli->query($verify_topic_sql) or die($mysqli->error);

if ($verify_topic_res->num_rows < 1) 
{
	//this topic does not exist
	$display_block = "<p><em>You have selected an invalid topic.<br/>
	Please <a href=\"topiclist.php\">try again</a>.</em></p>";
} 
else 
{
	//get the topic title
	//while ($topic_info = $verify_topic_res->fetch_array(MYSQLI_ASSOC)) {
	//	$topic_title = stripslashes($topic_info['topic_title']);
	//}
	
	$topic_info = $verify_topic_res->fetch_array(MYSQLI_ASSOC);
	$topic_title = stripslashes($topic_info['topic_title']);
	
	//gather the posts
	$get_posts_sql = "SELECT post_id, post_text, DATE_FORMAT(post_create_time, '%b %e %Y<br/>%r') AS fmt_post_create_time, post_owner 
					  FROM forum_posts 
					  WHERE topic_id = '".$safe_topic_id."' 
					  ORDER BY post_create_time ASC";
					  
	$get_posts_res = $mysqli->query($get_posts_sql) or die($mysqli->error);
	//create the display string
	$display_block = <<<END_OF_TEXT
	<p>Showing posts for the <strong>$topic_title</strong> topic:</p>
	<table>
	<tr>
	<th>AUTHOR</th>
	<th>POST</th>
	</tr>
END_OF_TEXT;
	while ($posts_info = $get_posts_res->fetch_array(MYSQLI_ASSOC)) {
		$post_id = $posts_info['post_id'];
		$post_text = nl2br(stripslashes($posts_info['post_text']));  //Since this is a post, there can be multiple lines.
		$post_create_time = $posts_info['fmt_post_create_time'];
		$post_owner = stripslashes($posts_info['post_owner']);
		//add to display
	 	$display_block .= <<<END_OF_TEXT
		<tr>
		<td>$post_owner        created on:   $post_create_time       </td>
		<td>$post_text<br/>
		<a href="replytopost.php?post_id=$post_id"><strong>REPLY TO POST</strong></a></td>
		</tr>
END_OF_TEXT;
	}
	//free results
	$get_posts_res->free_result();
	$verify_topic_res->free_result();
	//close connection to MySQL
	$mysqli->close();
	//close up the table
	$display_block .= "</table>";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Posts in Topic</title>
<style type="text/css">
	table {
		border: 1px solid black;
		border-collapse: collapse;
	}
	th {
		border: 1px solid black;
		padding: 6px;
		font-weight: bold;
		background: #ccc;
	}
	td {
		border: 1px solid black;
		padding: 6px;
		vertical-align: top;
	}
	/* visited link */
	a:visited {
		color: #00FF00;
	}

	/* mouse over link */
	a:hover {
		color: #FF00FF;
	}

	/* selected link */
	a:active {
		color: #0000FF;
	}
	
	.num_posts_col { text-align: center; }
</style>
</head>
<body>
<h1>Posts in Topic</h1>
<?php echo $display_block; 
   //header("Location: showtopic.php?topic_id=".$_POST['topic_id']);
     //header("Location: showtopic.php");
 //exit;
?>
<p>Would you like to <a href="display_topic_list.php">go to topic list</a>?</p>
</body>
</html>