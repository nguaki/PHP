<?php
require_once '../core/init.php';

//First time call, it will display success message and then delete the message.
//When the browser refreshes, the message is no longer there.

if(Session::exists('success'))
	echo Session::flash('success');
	
if(Session::exists('home'))
	echo Session::flash('home');

	
$user = new User();
if($user->isLoggedIn()){
?>

	<ul>
		<li><a href="logout.php">Log out</a></li>
		<li><a href="disp_activities.php">Display Most Freq Visitors</a></li>
	</ul>
<?php
} else{
		echo '<p>You need to either <a href="login.php">login</a> or <a href="register.php">register</a></p>';
}
?>