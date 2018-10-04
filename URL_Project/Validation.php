<?php
require_once 'DB/Database.php';
require_once 'Token.php';
require_once 'Validation.php';

    function checkCSRF()
    {
	    //Check for CSRF attack.
		if( !Token::check($_POST['token']))
		{
			echo 'CSFR check: Not passed';
			redirect("index.php");
		}
    }
    
    function sanitizeEmail()
    {
        //Filter out email input. 
        $email = filter_input(
                    INPUT_POST,
                    'email',
                    FILTER_VALIDATE_EMAIL
                    );
        if($email){
            return $email;
        }else{
            error_log( "Email is not clean");
			redirect("index.php");
        }
    }
   
    //Further implementation: Need to set up an array of acceptable URLs.
    //Check if $url exists in this array.
    //Redirect only if it is in this array.
    function redirect( $url ) 
    {
        header("Location: $url");
        die();
    }
    
    function validatePassword($userRows)
    {
        if($userRows->count() > 0)
        {
            $userRows = $userRows->getResults(); 
            //echo 'user count > 0 ';
            foreach( $userRows as $userRow )
            {
                //echo 'user_name:' . $userRow->user_name . ':' . 'user_pass' . $userRow->user_pass . '<br>';
                if( password_verify( $_POST['password'], $userRow->user_pass ) )
                {
                    //echo "Login ok are same". '<br>';
                    $userRows = Database::getInstance()->update("UPDATE users SET visit_count = visit_count + 1 where user_email ='" . $clean['email'] . "'" );
                    redirect("nav_bar.html");
                    //redirect("http://api.ryanroper.com");
                }
                else
                {
                    error_log( "Login not OK");
                    redirect("index.php");
                }
            }
        }   
        else
        {
            //echo "No rows returned<br>";
            error_log("No rows returned.", 0);
            redirect("index.php");
        }
    }    
    //Only one instance to DB is created.
    $DB_Instance = Database::getInstance();

    if( isset( $_POST['email'], $_POST['password'], $_POST['token']))
    {
    	$email    = $_POST['email'];
	    $password = $_POST['password'];
	
    	if( !empty($email) && !empty($password))
	    {
		    checkCSRF(); 
            $clean = array();
            
            $clean['email'] = sanitizeEmail();
            
            //echo 'clean email' . $clean['email'] . '<br>';
            //die();
            try
            {
                $userRows = Database::getInstance()->query("SELECT user_pass FROM users where user_email= '". $clean['email'] ."'");
                //Database::getInstance()->query("UPDATE users set user_pass= '". $hash ."'");
          
                //$userRows = Database::getInstance()->get("SELECT * FROM users");
                //$userRows = Database::getInstance()->get("users", array( 'user_email', '=', "'".$email."'"));
                //$userRows = Database::getInstance()->get("users", array( 'user_email', '=', $email));
                
                validatePassword($userRows);
            }
            catch(PDOException $e)
            {   
                echo $e->getMessage();
            }
        } //If password and email are not empty.
    }//If password and email and toke are set.
?>