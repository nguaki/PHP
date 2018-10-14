<?php
    require_once '../core/init.php';
    //  There are 2 idiocyncracies of this file.
    //  If there is a better way, I love to find it out.
    //
    //  (1)FE and BE coexists.
    //  (2)THere is no <!DOCTYPE html><head></head> with HTML.
    //
    //  CSRF requires token match.
    //  If <!DOC
    //
    //
    
    //Check inputs
    if(Input::exists()) 
    {
        
        //Check CSRF attack if any.       
        if(Token::check(Input::get('token'))) 
        {
            
            $validate   = new Validate();
            
            //With Login, all we care about is there is some kind of inputs.
            $validation = $validate->check($_POST, 
                                            array(
                                                  'email'   => array('required' => true),
                                                  'password'=> array('required' => true)
                                                )
                                          );
            if($validation->passed()){
                //Log user in
                $user = new User();
                
                //Check of remember check box.
                $remember = (Input::get('remember') === 'on') ? true : false;
                
                $login = $user->login(Input::get('email'), Input::get('password'), $remember);
                
                //If user is logged, redirect to home page.
                if($login)
                    Redirect::to('index.php');
                else 
                    echo 'Login failed';
            } else {
                foreach( $validation->errors() as $error )
                    echo "$error";
            }
        }
        else
            echo "Tokens do not match";
    }
?>
      <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
      <form action="" method="POST" id="loginForm">
        <p><span style="font-size: 10px" id="error_field"></span></p>
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
            <laber for="remember">Remember</laber>
        </div> 
            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
            <input type="submit" value="Log In">
    </form>
    <script type='text/javascript'>
    /* attach a submit handler to the form */
    $("#loginForm").submit(function(event) {

      /* stop form from submitting normally */
      event.preventDefault();

      /* get the action attribute from the <form action=""> element */
      var $form = $( this ),
          url = $form.attr( 'action' );

      /* Send the data using post with element id name and name2*/
      var posting = $.post( url, { email: $('#email').val(), password: $('#password').val() } );

      /* Alerts the results */
      posting.done(function( data ) {
          $('#error_field').html(data);
          alert("success");
          console.log('form post success');
      });
    });
    </script>