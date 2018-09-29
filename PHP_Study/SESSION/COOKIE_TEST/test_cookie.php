<?php
######
# Date: Dec 17, 2014
# This is how to set up a cookie.
# Notice that one cookie needs one setcookie() statement.
# Each cookie has an expiration time.
#
# The very first time when this program is invoked, the program will
# go to else statement.  The very first invocation of this program
# will have cookie set up in the server but the call isset() will be
# false.
######


setcookie( "vegetable", "artichoke", time()+3600, "/", "", 0 );   # This cookie will last 1 hour.
setcookie( "user", "james", time()+60, "/", "", 0 );              # This cookiw will last 1 minute.

if (isset( $_COOKIE['user'])) {
	echo "<p>Hello again!  You are:   " .$_COOKIE['user']. "</p>";
} else {
	echo "<p>Hello, you.  This may be your first visit. </P>";
}
var_dump( $_COOKIE);  # This will also dump the session ID also by default.

?>