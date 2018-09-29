Sep 28, 2018

1) Invoke start_session.php.  Note the session_id.

2) Invoke other php files.  Notice the same session_id although
   these files are not related to each other.
   The only thing that is common is that all files are running
   in one browser.
   
3) Run store_session_var.php.
   And then run other php files.
   
   These demonstrates that $_SESSION[] is a way to keep the states of
   otherwise these stateless sessions.
   