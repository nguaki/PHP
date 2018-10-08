<?php
    //validate and sanitize function. 
    class Validate{
        public static function checkEmail($email){
            return (filter_var($email,FILTER_VALIDATE_EMAIL)) ? true : false;
        }
        
        public static function sanitizeEmail($email){
                return filter_var($email,FILTER_SANITIZE_EMAIL);
        }
    }
?>