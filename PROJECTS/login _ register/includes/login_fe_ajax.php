<?php
    //Front End for Login Registration.
    //Utilize AJAX call.
    
    //Need for Token::generate().
    require_once "../core/init.php";
    unset ($_SESSION['clean_data']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
<meta charset="utf-8"/>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
  </script>
</head>
<body>
    <form action="login_be_ajax.php" method="POST" id="loginForm">
        <p><span style="font-size: 20px" id="error_field1"></span></p>
        <p><span style="font-size: 20px" id="error_field"></span></p>
        <div class="field">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="" autocomplete="on">
        </div> 
        <div class="field">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="" autocomplete="off">
        </div> 
        <div class="field">
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember</label>
        </div> 
            <input type="hidden" name="token" id="token" value="<?php echo Token::generate(); ?>">
            <input type="submit" value="Log In">
    </form>
    <script type="text/javascript" src="JS/ajax_call.js">
    </script>
</body>
</html>