<?php
// This utilizes _SESSION global variable to store data.
// But this doesn't set the cookie in case this session is dead.
// When the another sesssion is invoked by opening up a new browser,
// the cookie will remember and identify the user.
//
// Sep 28, 2018 
// Note that same session ID was created with same browser.
// If I open up different browser, would it have a different session ID?
//

session_start();
echo "<p>Your session ID is : "    .session_id().      "</p>";

$_SESSION['product1'] = "Sonic Screwdriver";
$_SESSION['product2'] = "HAL 2000";

echo "The product has been registered.";

?>