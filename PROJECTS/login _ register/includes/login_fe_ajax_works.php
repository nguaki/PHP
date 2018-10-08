<?php
    require_once "../core/init.php";
    echo 'beginning of login_fe_ajax.php _SESSION=:';
    var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
<meta charset="utf-8"/>
  <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
</head>

<body>
    <form action="login_be_ajax.php" method="POST" id="loginForm">
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
    <script type='text/javascript'>
    /*global $*/
        $("#loginForm").submit(function(event) {

      /* stop form from submitting normally */
      event.preventDefault();

      /* get the action attribute from the <form action=""> element */
      var $form = $( this ),
          url = $form.attr( 'action' );
          
      /* Send the data using post with element id name and name2*/
      var posting = $.post( url, { email: $('#email').val(), password: $('#password').val(), token: $('#token').val() } );

      /* Alerts the results */
      posting.done(function( data ) {
          alert("success");
          alert(data);
          var data = JSON.parse(data);
          $('#error_field').html(data.error);
          //window.location = data.new_page;
          var string_data = JSON.stringify(data);
          alert(string_data.new_page);
          window.location = string_data.new_page;
        });
      });
    </script>
</body>
</html>