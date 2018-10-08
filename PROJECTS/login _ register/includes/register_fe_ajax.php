<?php    
    //Front End for Login Registration.
    //Utilize AJAX call.
    
    //Need for Token::generate().
    require_once "../core/init.php";
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Login</title>
<meta charset="utf-8"/>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
  </script>
 </head>
<body>
   <form action="register_be_ajax.php"  method="POST" id="RegiForm">
        <p><span style="font-size: 20px" id="error_field"></span></p>
        <div class="field">
           <label for="email">Email</label>
           <input type="email" name="email" id="email" value="">
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
       <input type="hidden" name="token" id="token" value="<?php echo Token::generate();?>">

       <input type="submit" value="Register">
   </form>
    <script type="text/javascript">
        /*global $*/
        $("#RegiForm").submit(function(event) {

      /* stop form from submitting normally */
      event.preventDefault();

      /* get the action attribute from the <form action=""> element */
      var $form = $( this ),
          url = $form.attr( 'action' );
         alert(url);
      /* Send the data using post with element id name and name2*/
      var posting = $.post( url, { email: $('#email').val(),
                                   password: $('#password').val(),
                                   password_again: $('#password_again').val(),
                                   user_name:$('#user_name').val(),
                                   token: $('#token').val()
                                 } 
                            );

      /* Alerts the results */
      posting.done(function( data ) {
          //alert("success");
          alert(data);
          var data = JSON.parse(data);
          $('#error_field1').html(data.invalid_email);
          $('#error_field').html(data.error);
          //window.location = data.new_page;
          //var string_data = JSON.stringify(data);
          //alert(String(data.new_page));
          if(data.new_page){
            window.location = String(data.new_page);
          }
        });
      });

    </script>
</body>
</html>