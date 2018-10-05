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
                    echo "$error<br>";
            }
        }
    }
?>
    <form action="" method="POST">
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