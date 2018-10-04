<?php
    //A wrapper to header.
    class Redirect{
        public static function to($location = null){
            if($location){
                if(is_numeric($location)){
                    switch($location){
                        case 404:
                            //echo "I am at:" . $_SERVER['DOCUMENT_ROOT'];
                            //die();
                            header('HTTP/1.0 404 Not Found');
                            //include "../includes/errors/404.php";
                            include "errors/404.php";
                            die();
                            //include "includes/errors/404.php";
                      break;
                    }
                }else{
                    header( 'Location:'. $location );
                    die();
                }
            }
        }
    }

?>