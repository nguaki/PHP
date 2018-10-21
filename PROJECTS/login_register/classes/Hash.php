<?php
    //Centralize all hash related functions in one place.
    class hash{
        //Generate a hash value with salt.
        public static function generate_pw_hash( $password ){
            return password_hash($password , PASSWORD_DEFAULT);
        }
        
        //Used to validate if password and hashed value are a match.
        public static function verify_pw_hash( $password, $hash_value ){
            return password_verify($password , $hash_value);
        }
        
        //Generate a unique string and feed it to above hash function.
        //This is used in remember me functionality.
        public static function unique(){
            return self::generate_pw_hash(uniqid());
        }
    }

?>