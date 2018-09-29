<?php
//
//This utilizes _SESSION global variable to store data.
//But this doesn't set the cookie in case this session is dead.
//When the another sesssion is invoked by opening up a new browser,
//the cookie will remember and identify the user.
//
//Demonstrates the remembrance of $_SESSION[] from store_session_var.php.
//OUTPUT: 4grrcov82dke9pam3l9ksqu087

session_start();

//Watch out for the dots.
echo "<p>Your session ID is : "    .session_id().      "</p>";

if( $_SESSION['product1'] == "" )
{
	echo "Please log in <br>";
	die();
}
else
{
	//Remembers the $_SESSION[] from store_session_var.php
	echo "Welcome back <br>";
	
	echo $_SESSION['product2'];
	echo $_SESSION['product1'];

}