<?php
    class User{
        private $_db,
                $_data,
                $_sessionName,
                $_cookieName,
                $_isLoggedIn;
                
       //$user - email of a user 
        public function __construct($user = null){
           $this->_db = DB::getInstance(); 
           $this->_sessionName = Config::get('session/session_name');
           $this->_cookieName  = Config::get('remember/cookie_name');
           
           //Check if a user is logged in.
           if(!$user){
               if(Session::exists($this->_sessionName)){
                   $user_email = Session::get($this->_sessionName);
                   
                   if($this->find($user_email)){
                       $this->_isLoggedIn = true;
                   } else {
                       //process logout
                   }
               }
           } else {
               //Rememberme - existing user wants to rejoin the site, but SESSION_ID no longer exists.
               //In this case, instantiate with the specific email and recover the data related to
               //this object.
               if( $this->find($user) )
                $this->_isLoggedIn = true;
           }
        }
       
        //Inserts a new row for a new user.
        //
        //$fields : associative array of column names
        //          and its values.
        public function create($fields=array()){
            if(!$this->_db->insert('users', $fields)) {
                throw new Exception("Error with creating a new user.");
            }
        }
        
        public function find($email=null) {
           if($email) {
               //Returns false or entire object of DB class.
               $objDB = $this->_db->get('users', array( 'user_email', '=', $email));
           }
           
           if( $objDB->count()){
               $this->_data = $objDB->first();
               return true;
           }
           
           return false;
        }
       
        
        //auto increment visit each time a user visits a site.
        public function increment_visit_count($email){
            
            if(!$this->_db->query("UPDATE users SET visit_count = visit_count + 1 where user_email ='" . $email . "'" )->error())
                return true;
            else
                return false;
           //Updating integer doesn't work.
           //$set_array = array( "visit_count" => "visit_count+1");
           //return ($this->_db->update("users", $email, $set_array )) ? true: false;
        }
        
        //Checks the authentication of login. 
        //First,  get a row that matches $email.
        //Second, check if the password matches.
        // 
        //$email    -  actual value of an email.
        //$password -  actual value of password.
        public function login($email = null, $password=null, $remember = false) 
        {
            if( !$email && !$password && $this->exists())
            {
                Session::put($this->_sessionName, $this->data()->user_email);
            }
            else
            {
                $user = $this->find($email);
            
                if($user) 
                {
                    //Check if a match
                   if( Hash::verify_pw_hash( $password, $this->data()->user_pass ) )
                   {
                        Session::put($this->_sessionName, $this->data()->user_email);
                        
                        if(!$this->increment_visit_count($email)){
                            error_log("UPDATE ERROR");
                            die();
                       }
                       
                       //Implementing rememberme.
                       //This logic gets executed when a user hits submit button with
                       //rememberme check box clicked.
                       if($remember){
                           
                            //Check to see if user session data is in rememberme table. 
                            $hashCheck = $this->_db->get('users_session', array('user_email', '=', $this->data()->user_email));
                            
                            //If the data is not in the remeberme table, insert a new row.
                            if(!$hashCheck->count()){
                                $hash = Hash::unique();     
                               
                                $this->_db->insert('users_session',
                                                   array( 
                                                          'user_email' => $this->data()->user_email,
                                                          'hash' => $hash 
                                                        ));
                            }else{
                                //Retrieve first hash data.  There shouldn't be more than 1.
                                $hash = $hashCheck->first()->hash; 
                            }
                            
                            Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
                       }
                       return true;
                    }
                }
            }
            return false;
        } 
    
        public function exists(){
            return (!empty($this->_data)) ? true : false;
        } 
        
        //Getter for private member. 
        public function data(){
            return $this->_data;
        }
        
        //Getter for private member. 
        public function isLoggedIn(){
            return $this->_isLoggedIn;
        }
        
        public function logout(){
            
            //$this->_db->delete('users_session', array('user_email', '=', $this->data()->user_email ));
            DB::getInstance()->query( "DELETE FROM users_session WHERE user_email = '" . $this->data()->user_email . "'" );
            Cookie::delete($this->_cookieName);
            Session::delete($this->_sessionName);
        }
    }
?>