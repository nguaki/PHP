<?php
    class User{
        private $_db,
                $_data;
        
        public function __construct($user = null){
           $this->_db = DB::getInstance(); 
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
               $data = $this->_db->get('users', array( 'user_email', '=', $email));
           }
           
           if( $data && $data->count()){
               $this->_data = $data->first();
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
        public function login($email = null, $password=null) {
             
            $user = $this->find($email);
            
            if($user)
            {
               if( password_verify( $password, $this->_data->user_pass ) )
               {
                        echo "Login ok". '<br>';
                   if($this->increment_visit_count($email)){
                        error_log("UPDATE ERROR");
                        die();
                   }
                   return true;
                        //redirect("nav_bar.html")(;
                        //redirect("http://api.ryanroper.com");
                    }
                }

            return false;
        }
    }
?>