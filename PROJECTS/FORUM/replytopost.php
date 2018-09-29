<?php
######################
#  12-21-14   This script is called from show_posts_of_a_topic.php hyperlink.
#
######################
include 'ConnectDB.php';

vConnectDB( "test" );


//check to see if we're showing the form or adding the post
//Note that is $_POST doesn't exists, this will display a POST form.
if (!$_POST) 
{
   // showing the form; check for required item in query string
   if (!isset($_GET['post_id'])) 
   {
      header("Location: topiclist.php");
      exit;
   }
   //create safe values for use
   $safe_post_id = mysqli_real_escape_string($mysqli, $_GET['post_id']);
   
   //still have to verify topic and .  why left join?
   $verify_sql = "SELECT ft.topic_id, ft.topic_title 
				  FROM forum_posts AS fp LEFT JOIN forum_topics AS ft ON fp.topic_id = ft.topic_id        
				  WHERE fp.post_id = '".$safe_post_id."'";
				  
   $verify_res = $mysqli->query($verify_sql) or die($mysqli->error);
   
   if ($verify_res->num_rows < 1) 
   {
	  //this post or topic does not exist
	  header("Location: topiclist.php");
	  exit;
   } 
   else 
   {
	  //get the topic id and title
	  //while($topic_info = mysqli_fetch_array($verify_res)) {
	  //   $topic_id = $topic_info['topic_id'];
	  //   $topic_title = stripslashes($topic_info['topic_title']);
	  //}
	  $topic_info = $verify_res->fetch_array(MYSQLI_ASSOC);
	  $topic_id = $topic_info['topic_id'];
	  $topic_title = stripslashes($topic_info['topic_title']);
	}
	#######################
	# The below html lines can be embedded within this php code and use
	# $display_block string.
	# This is very confusing.
	########################
?>
  <!DOCTYPE html>
  <html>
  <head>
  <title>Post Your Reply in <?php echo $topic_title; ?></title>
  </head>
  <body>
      <h1>Post Your Reply in <?php echo $topic_title; ?></h1>
      
      <!--Calls the php code from this file. -->
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <p><label for="post_owner">Your Email Address:</label><br/>
          <input type="email" id="post_owner" name="post_owner" size="40" maxlength="150" required="required"></p>
          
          <p><label for="post_text">Post Text:</label><br/>
          <textarea id="post_text" name="post_text" rows="8" cols="40" required="required"></textarea></p>
          
          <input type="hidden" name="topic_id" value="<?php echo $topic_id; ?>">
          <button type="submit" name="submit" value="submit">Add Post</button>
      </form>
  </body>
  </html>
<?php
  //free result
  $verify_res->free_result();
  //close connection to MySQL
  $mysqli->close();

} 
else if ($_POST) 
{
      //check for required items from form
      if ((!$_POST['topic_id']) || 
	      (!$_POST['post_text']) ||
          (!$_POST['post_owner'])) {
          header("Location: topiclist.php");
          exit;
      }
      //create safe values for use. Avoid SQL injection?
      $safe_topic_id = mysqli_real_escape_string($mysqli, $_POST['topic_id']);
      $safe_post_text = mysqli_real_escape_string($mysqli, $_POST['post_text']);
      $safe_post_owner = mysqli_real_escape_string($mysqli, $_POST['post_owner']);
	  
	  //$tCurrTime = now();
	  
	  echo "$tCurrTime<br/>";
	  
      //add the post
      $add_post_sql = "INSERT INTO forum_posts (topic_id,post_text, post_create_time,post_owner) 
					   VALUES('".$safe_topic_id."', '".$safe_post_text."', now(),'".$safe_post_owner."')";
					   
      $add_post_res = $mysqli->query($add_post_sql) or die($mysqli->error);
      //close connection to MySQL
      $mysqli->close();
      //redirect user to topic
      header("Location: show_posts_of_a_topic.php?topic_id=".$_POST['topic_id']);
      exit;
}
?>