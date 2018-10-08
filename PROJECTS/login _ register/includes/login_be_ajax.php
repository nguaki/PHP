<?php
    //Backend to login form.
    //Package data into JSON and echos back.
    //Design for AJAX call and response.
    
    require_once '../core/init.php';
    
    $clean_token= htmlspecialchars($_POST['token']);
    //If token does not exists from the form, generate one.
    if(!$clean_token)  Token::generate();
   
    //Check inputs
    if(Input::exists()) 
    {
        //Check CSRF attack if any.       
        if(Token::check($clean_token))
        {
            
            //if not empty.
            if( isset($_POST['email']) && !empty($_POST['email'])){
                //if invalid, return.
                if(!Validate::checkEmail($_POST['email'])){
                    $data['error'] = 'Invalid Email';
                    echo json_encode($data);
                    return;
                }
                //echo 'before sanitize';
                //var_dump($_POST);
                //Sanitize both valid nor invalid eail.
                //$_SESSION['clean_data']['email'] =   Validate::sanitizeEmail($_POST['email']);
                $_POST['email'] =   Validate::sanitizeEmail($_POST['email']);
                    //echo json_encode($data);
                    //return;
                //echo 'after sanitize';
                //var_dump($_POST);
            }
            //No need to sanitize password.
            $_SESSION['clean_data']['password'] = $_POST['password'];
            
            $inputRules   = new InputRules();
            
            //With Login, all we care about is there is some kind of inputs.
            //$validation = $inputRules->check($_SESSION['clean_data'], 
            $validation = $inputRules->check($_POST, 
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
                if($login){
                    //Redirect::to('index.php');
                    $data['new_page'] = 'index.php';                           
                    echo json_encode($data);
                }
                else{
                    $data['error'] = 'Incorrect Password';                   
                    echo json_encode($data);
                }
            } else {
                if(!$data['error']) $data['error'] = "";
                foreach( $validation->errors() as $error )
                {   
                   $data['error'] .= $error . '<br>';
                }
                echo json_encode($data);
            }
        }
        else{
            $data['error'] =  "Tokens do not match";
            echo json_encode($data);
        }
    }
?>