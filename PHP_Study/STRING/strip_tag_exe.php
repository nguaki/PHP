<?php
/*OUTPUT
"I simply will not have it,"   <===simply is italicized in browser.
said Mr. Dean.

The end.


"I simply will not have it,"said Mr. Dean. <===simply is no longer italicized.

The end.

Demonstration of removal html tags by using strip_tags() command.

Sep 27, 18    Removing tags.   OP, KS
*/
$string = "<p> \"I <em>simply </em> will not have it,\"<br/>said Mr. Dean.</p><p><strong>The end.</strong></p>";
echo $string; 
echo  "<br/>";
echo strip_tags( $string, "<br/><p>");
?>