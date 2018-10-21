<?php
    //checks if _GET and _POST exists.
    class Input
    {
        static public function exists($type='post'){
            switch($type)
            {
                case 'post':
                    return (!empty($_POST)) ? true : false;
                case 'get':
                    return (!empty($_GET)) ? true : false;
                default:
                    return false;
            }
        }
        
        static public function get($item){
            if(isset($_POST[$item]))
                return $_POST[$item];
            else if(isset($_GET[$item]))
                return $_GET[$item];
            return '';
        }
    }
?>