<?php    
    //Front End for Login Registration.
    //Utilizes AJAX call.
    
    //Need for Token::generate().
    require_once "../core/init.php";
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
          <a class="navbar-brand" href="login_fe_ajax_boot.php">Login</a>
        </div>
    </nav>
      
   <div class="container">
      <form action="register_be_ajax.php"  method="POST" id="RegiForm">
        <p><span style="font-size: 20px" id="error_field"></span></p>
        
        <div class="form-group">
           <label for="email">Email</label>
           <input type="email" class="form-control" name="email" id="email" placeholder="">
        </div>

       <div class="form-group">
           <label for="password">Password</label>
           <input type="password" class="form-control" name="password" id="password" placeholder="">
       </div>
       
       <div class="form-group">
           <label for="password_again">Reenter Password</label>
           <input type="password" class="form-control" name="password_again" id="password_again" placeholder="">
       </div>
       <div class="form-group">
           <label for="user_name">Name</label>
           <input type="user_name" class="form-control" name="user_name" id="user_name" placeholder="">
       </div>
       <input type="hidden" name="token" id="token" value="<?php echo Token::generate();?>">

       <input type="submit" class="btn btn-default" value="Register">
    </form>
  </div>
    <!-- jQuery (necessary for AJAX and Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
    <script src="JS/bootstrap.min.js"></script>
    <script type="text/javascript" src="JS/regi_ajax_call.js"></script>

</body>
</html>