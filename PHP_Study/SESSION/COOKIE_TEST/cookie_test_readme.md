Sep 28, 2018

Demonstration of time expiration of COOKIE.

(1)When invoking test_cookie.php for the first time, the browser displays:

Hello, you. This may be your first visit.

/home/ubuntu/workspace/PHP_SamsTYS/Ch12/test_cookie.php:23: array(3) { 'PHPSESSID' => string(26) "4grrcov82dke9pam3l9ksqu087" 
'XDEBUG_SESSION' => string(9) "cloud9ide" 'vegetable' => string(9) "artichoke" }


(2)When I refresh, it now remembers my name.
Hello again! You are: james

/home/ubuntu/workspace/PHP_SamsTYS/Ch12/test_cookie.php:23: array(4) { 'PHPSESSID' => string(26) "4grrcov82dke9pam3l9ksqu087" 
'XDEBUG_SESSION' => string(9) "cloud9ide" 'vegetable' => string(9) "artichoke" 'user' => string(5) "james" }

(3)When I browse a couple of minutes later, the brower forgets my name
Hello, you. This may be your first visit.

/home/ubuntu/workspace/PHP_SamsTYS/Ch12/test_cookie.php:23: array(3) { 'PHPSESSID' => string(26) "4grrcov82dke9pam3l9ksqu087" 
'XDEBUG_SESSION' => string(9) "cloud9ide" 'vegetable' => string(9) "artichoke" }
