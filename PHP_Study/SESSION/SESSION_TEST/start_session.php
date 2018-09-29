<?php
//  When a browser is up,  this browser will have the same session 
//  until it the browser is destroyed.
//
// OUTPUT:
// Your session ID is : 4grrcov82dke9pam3l9ksqu087
//
// Demonstration of assigning long unique session ID.
//
// Sep 28, 18  OV KS  Other session related PHP programs
//                    also have same session IDs.
//
 session_start();
 
echo "<p>Your session ID is : "    .session_id().      "</p>";

?>