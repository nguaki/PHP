<?php
    //Used to prevent CSRF.
    class Token
    {
        //Generate token using md5() and store the value to $_SESSION[].
        public static function generate(){
            return Session::put(Config::get('session/token_name'), md5(uniqid()));
        }
        
        public static function get(){
            return Session::get(Config::get('session/token_name'));
        }
       
        //Check for CSRF attack.
        public static function check($token){
            
            $tokenName = Config::get('session/token_name');
            
            //No CSRF attack here. 
            if(Session::exists($tokenName) && $token === Session::get($tokenName)){
                //Session::delete($tokenName);
                return true;
            }
            //CSRF attack is a possibility.
            return false;
        }
    }

?>