<?php
    require_once '../core/init.php';
    
   echo 'From login _SESSION=';
   var_dump($_SESSION);
   
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
                $errors = "";
                foreach( $validation->errors() as $error ){
                    $errors .= $error . '<br>';
                    
                }
                echo $errors . '<br>';
                    $_SESSION['errors'] = $errors;
                echo $_SESSION['errors'] . '<br>';
                //die();
                    Redirect::to('login_short_frontend.php');
            }
        }
        else
        {
            echo "Token do not match";
            Redirect::to('login_short_frontend.php');
        }
    }
?>
