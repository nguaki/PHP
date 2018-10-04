<?php
    require_once '../core/init.php';
    
    
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
                $login = $user->login(Input::get('email'), Input::get('password'));
                
                if($login)
                    echo 'Login Success';
                else 
                    echo 'Login failed';
            } else {
                foreach( $validation->errors() as $error )
                    echo "$error<br>";
            }
        }
    }
?>
    <form action="" method="POST">
        <div class="field">
            <label for="">Email</label>
            <input type="email" name="email" id="email" value="" autocomplete="on">
        </div> 
        <div class="field">
            <label for="">Password:</label>
            <input type="password" name="password" id="password" value="" autocomplete="off">
        </div> 
            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
            <input type="submit" value="Log In">
    </form>