<?php
    //Front End for Login Registration.
    //Utilize AJAX call.
    
    //Need for Token::generate().
    require_once "../core/init.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
      .navbar{
        margin-bottom:0;
        border-radius:0;
      }
    </style>

  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Home</a>
        </div>
    </nav>

    <div class="container">
        <form action="login_be_ajax.php" method="POST" id="loginForm">
            
        <p><span style="font-size: 20px" id="error_field"></span></p>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="" >
        </div> 
        
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control"  name="password" id="password" placeholder="">
        </div> 
        
        <div class="form-group">
            <input type="checkbox"  name="remember" id="remember">
            <label for="remember">Remember</label>
        </div> 
            <input type="hidden" class="form-control" name="token" id="token" value="<?php echo Token::generate(); ?>">
            <input type="submit"  class="btn btn-default" value="Log In">
    </form>
  </div>
  
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"> </script>    
  <script src="JS/bootstrap.min.js"></script>
    <script type="text/javascript" src="JS/login_ajax_call.js"> </script>
</body>
</html>

<?php
    //echo '<br><br><br>';
	//echo '<div class="container"><p><a href="index.php">Home</a></p></div>';
?>