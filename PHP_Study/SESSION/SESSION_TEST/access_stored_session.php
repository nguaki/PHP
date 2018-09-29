<?php
#####
# 12-15-14  If the browser is terminated then this SESSION variables are lost.
#           If the browser is still running, the session_start() will have the same session. 
#####
session_start();
echo "<p>Your session ID is : "    .session_id().      "</p>";

?>

<p>Your chosen products are:</p>
<ul>
<li><?php echo $_SESSION['product1'] ?></li>
<li><?php echo $_SESSION['product2'] ?></li>
</ul>