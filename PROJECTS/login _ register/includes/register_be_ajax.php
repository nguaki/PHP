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
            //$Validation = new Validate();
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
                
                try{
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
                } catch( Exception $e ){
                    //Redirect::to(404);
                    $data['new_page'] = 'index.php';                           
                    echo json_encode($data);
                    die($e->getMessage());
                }         
                //if(!DB::getInstance()->insert('users', $field)) 
                //    echo "insert failed";
                    
                /*else
                {
                    Session::flash('success', 'You registered successfully!');
                    header('Location: index.php');
                }*/
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
