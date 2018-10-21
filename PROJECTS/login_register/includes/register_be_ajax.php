<?php
    //Backend to register form.
    //Package data into JSON and echos back.
    //Design for AJAX call and response.
    
    require_once '../core/init.php';
    
    //If token does not exists from the form, generate one.
    
    $clean_token= htmlspecialchars($_POST['token']);
    //If token does not exists from the form, generate one.
    if(!$clean_token)  Token::generate();
    //echo var_dump($_POST); 
    //Proceed with registration if any inputs exist.
    if (Input::exists())
    {
        //Proceed with registration if CSRF attack is not an issue.
       if (Token::check($clean_token))
       {
            //if email input is not empty.
            if( isset($_POST['email']) && !empty($_POST['email'])){
                //if invalid, return.
                if(!Validate::checkEmail($_POST['email'])){
                    $data['error'] = 'Invalid Email';
                    echo json_encode($data);
                    return;
                }
                //Sanitize both valid nor invalid email.
                $_POST['email'] =   Validate::sanitizeEmail($_POST['email']);
            }
            
            //if username input is not empty.
            if( isset($_POST['user_name']) && !empty($_POST['user_name'])){
                //if invalid, return.
                if(!Validate::checkUserName($_POST['user_name'])){
                    $data['error'] = 'Username should contain only alphanumeric.';
                    echo json_encode($data);
                    return;
                }
                //There is no need to sanitize username.  If it passes thru validation,
                //this should be sufficient.
            }
            
            $inputRules   = new InputRules();
     
            $inputRules->check( $_POST, array(
                                           'email' => array(
                                                              'required' => true,
                                                              'min'      => 2,
                                                              'max'      => 20,
                                                              'unique'   => 'users'
                                                            ),
                                            'password' => array(
                                                                 'required' => true,
                                                                 'min'      => 6
                                                               ),
                                            'password_again' => array(
                                                                        'required' => true,
                                                                        'matches'  => 'password'
                                                                     ),
                                            'user_name' => array(
                                                             'required' => true,
                                                             'min' => 2,
                                                             'max' => 50
                                                           )
                                        )
                            );
             if ($inputRules->passed())
             {   
                 //Insert a new registration.
                 $hash = Hash::generate_pw_hash($_POST['password'] );
                 
                $user = new User();
                
                try
                {
                    //Insert a new row of data for a user.
                    $user->create( 
                                    array( 
                                            'user_email'=> $_POST['email'],
                                            'user_name'=> $_POST['user_name'],
                                            'user_pass' => $hash,
                                            'visit_count' => 0
                                         )
                                  );
                    //Session::flash('success', 'You registered successfully!');
                    Session::flash('home', 'You registered successfully! Please log in.');
                    $data['error'] = 'Congratulations! You are registered.';
                    echo json_encode($data);
                } 
                catch( Exception $e )
                {
                    //Redirect::to(404);
                    $data['new_page'] = 'index.php';                           
                    echo json_encode($data);
                    die($e->getMessage());
                }         
            }else{
                $data['error'] = "";
 
                //Display errors on inputs.
                foreach($inputRules->errors() as $error)
                   $data['error'] .= $error . '<br>';
                echo json_encode($data);
            }
       } else {
            $data['error'] = 'Tokens do not match';
            echo json_encode($data);
       }
    }
?>
