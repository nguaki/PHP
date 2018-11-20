<?php
    class cookie{
        public static function exists($name){
           return (isset($_COOKIE[$name])) ? true : false;
        }
        public static function get ($name){
           return (isset($_COOKIE[$name])&&!empty($_COOKIE[$name])) ? $_COOKIE[$name] : false;
           //return $_COOKIE[$name];
        }
        public static function put( $name, $value, $expiry ){
            
           $CookiSet = setcookie( $name, $value, time() + $expiry, '/' );
           //var_dump($_COOKIE);
           return $CookiSet;
        }
        public static function delete( $name ){
           return self::put( $name, "", time()-1);
        }
    }

?>