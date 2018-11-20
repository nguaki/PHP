<?php
    class Session{
        
        //Check if token exists in $_SESSION.
        public static function exists($name){
            return (isset($_SESSION[$name])) ? true : false;
        }
        
        //Token value will be stored in $_SESSION[].
        public static function put($name, $value){
            return $_SESSION[$name] = $value;
        }
      
        //Return token value.
        public static function get($name){
            return $_SESSION[$name];
        }
        
        //Remove token form $_SESSION. 
        public static function delete($name){
            if(self::exists($name))
                unset($_SESSION[$name]);
        }
       
        //Purpose of this method is to display a message just
        //once. When browser if refreshed, the message will
        //not redisplay.
        //Example:When registration is a success, it will
        //display success message but when browser if refreshed,
        //the message will be gone.
        public static function flash($name, $string=''){
            if (self::exists($name)){
                $session = self::get($name);
                self::delete($name);
                return $session;
            }else{
                return self::put($name,$string);
            }
        }
    }

?>