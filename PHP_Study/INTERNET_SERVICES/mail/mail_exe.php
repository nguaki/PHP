<?php
	//echo "Sending an email. <br>";
	//mail( "jms_che@yahoo.com", "Testing mail submission", "Hello World!", "From: jamesche0409@gmail.com" );
	
	$msg =  "Name:      ".$_POST['name']."\n";
	$msg .= "E-Mail:    ".$_POST['email']."\n";
	$msg .= "Message:   ".$_POST['msg']."\n";
	
	$recipient = "jms_che@yahoo.com";
	$subject = "test mail() php function";
	$mailheaders = "From: google";
	
	mail( $recipient, $subject, $msg, $mailheaders );
?> 

<!DOCTYPE html>
<html>
<head>
<title>Ackowlegement</title>
</head>
<body>
<p>Thanks <strong><?php echo $_POST['name']?></strong>, 
for your message. </p>
<p>Your email address:
	<strong><?php echo $_POST['email'] ?></strong></p>
<p>Your message: <?php echo $_POST['msg']; ?></p>
</body>
</html>