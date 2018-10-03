<?php
echo "Hi";

?>

<!DOCTYPE HTML>
<head></head>
<body>
   <form action=""  method="POST">
       <div class="field">
           <label for="email">Email</label>
           <input type="email" name="email" id="email">
       </div>
       <div class="field">
           <label for="password">Password</label>
           <input type="password" name="password" id="password">
       </div>
       <div class="field">
           <label for="password_again">Reenter Password</label>
           <input type="password" name="password_again" id="password_again" value="">
       </div>
       <div item="user_name">
           <label for="user_name">Name</label>
           <input type="user_name" name="user_name" id="user_name" value="">
       </div>
       <input type="submit" value="Register">
   </form>
</body>
</html>