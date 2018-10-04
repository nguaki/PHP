<?php
    //require_once $_SERVER['DOCUMENT_ROOT'] . '/../core/init.php';
    require_once '../core/init.php';
    
    //Proceed with registration if any inputs exist.
    if (Input::exists())
    {
        //Proceed with registration if CSRF attack is not an issue.
       if (Token::check(Input::get('token')))
       {
            $Validation = new Validate();
             $Validation->check( $_POST, array(
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
             if ($Validation->passed())
             {   
                 //Insert a new registration.
                 $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                 //$sql_statement = "INSERT INTO users (user_name, user_email, user_pass, visit_count) VALUES ( '" . $_POST['user_name'] . "','" . $_POST['email'] . "','" . $hash . "',0)";
                //echo $sql_statement . '<br>';
                //DB::getInstance()->query($sql_statement);
                $user = new User();
                
                try{
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
                    Redirect::to(404);
                } catch( Exception $e ){
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
            
                //Display errors on inputs.
                foreach($Validation->errors() as $error)
                echo "$error<br>";
            }
       } 
    }
?>

<!DOCTYPE HTML>
<head></head>
<body>
   <form action=""  method="POST">
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
       <input type="hidden" name="token" value="<?php echo Token::generate();?>">
       <input type="submit" value="Register">
   </form>
</body>
</html>