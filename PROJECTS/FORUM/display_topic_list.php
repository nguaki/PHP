<?php
include 'ConnectDB.php';
####################################
# 12-20-14  This script lists all the topics.
#           This script is called by 2 scripts.
#           Namely addtopic.php and when a user
#           clicks the hyperlink at below the bottom
#           of a table.
#
###################################
vConnectDB( "test" );

//gather the topics.
$get_topics_sql = "SELECT topic_id, topic_title, 
                          DATE_FORMAT(topic_create_time,  '%b %e %Y at %r') as fmt_topic_create_time, 
						  topic_owner 
				   FROM forum_topics 
				   ORDER BY topic_create_time DESC";
						  
$get_topics_res = $mysqli->query($get_topics_sql) or die($mysqli->error);

//If no rows returned.
//if (mysqli_num_rows($get_topics_res) < 1) 
if ($get_topics_res->num_rows < 1) 
{
	//there are no topics, so say so
	$display_block = "<p><em>No topics exist.</em></p>";
} 
else 
{
	//create the display string
    $display_block = <<<END_OF_TEXT
    <table style="border: 1px solid black; border-collapse: collapse;">
    <th>TOPIC TITLE</th>
    <th># of POSTS</th>
END_OF_TEXT;

	//while ($topic_info = mysqli_fetch_array($get_topics_res)) 
	while ($topic_info = $get_topics_res->fetch_array(MYSQLI_ASSOC))  //Make it OO.
	{
		$topic_id = $topic_info['topic_id'];   // Don't need to stripslashes from a number. 
		$topic_title = stripslashes($topic_info['topic_title']);
		$topic_create_time = $topic_info['fmt_topic_create_time']; // Don't need to stripslashes from time.
		$topic_owner = stripslashes($topic_info['topic_owner']); 
	
		//get number of posts for that particuar ID.
		$get_num_posts_sql = "SELECT COUNT(post_id) AS post_count 
		                      FROM forum_posts 
							  WHERE topic_id = '".$topic_id."'";
							  
							  
		$get_num_posts_res = $mysqli->query($get_num_posts_sql) or die($mysqli->error);
		
		
		// 12-21-14  Get the number of posts for a given topic.
		$posts_info = $get_num_posts_res->fetch_array(MYSQLI_ASSOC); //$post_info gets a hash array of 1 row. 
		
		$num_posts = $posts_info['post_count']; // Get the actual value.

		//add to display
		$display_block .= <<<END_OF_TEXT
		<tr>  <?--tr represents a row-->
		<td><a href="show_posts_of_a_topic.php?topic_id=$topic_id"><strong>$topic_title</strong></a><br/><?-- td represents a column.-->
		Created on $topic_create_time by $topic_owner</td>   <?-- End of a column -->
		<td class="num_posts_col">$num_posts</td>    <?-- A new column -->
		</tr>  <?--End of a row-->
END_OF_TEXT;
	}
	//free results
	$get_topics_res->free_result();
	$get_num_posts_res->free_result();

	//close connection to MySQL
	$mysqli->close();

	//close up the table
	$display_block .= "</table>";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Topics in My Forum</title>
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
</style> <?-- num_post_col is assigned at the top in the display block -->
</head>
<body>
<h1>Topics in My Forum</h1>
<?php echo $display_block; ?>
<p>Would you like to <a href="addtopic.html">add a topic</a>?</p>
</body>
</html>