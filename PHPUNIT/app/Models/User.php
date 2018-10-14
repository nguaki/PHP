<?php

//Note that this file must reside under app/Models directory.
//Also note that UNIX directory is '/' but the namespace is '\'.
//This is confusing.

namespace App\Models;

class User{
    public $first_name;
    public $last_name;
    public $email;
    
    public function setFirstName($firstName){
        $this->first_name = trim($firstName);
        
    }
    
    public function setLastName($lastName){
        $this->last_name = trim($lastName);
    }
    
    public function setEmail($email){
        $this->email = trim($email);
    }
    
    public function getFirstName(){
        return($this->first_name);
    }
    
    public function getLastName(){
        return($this->last_name);
    }
    
    public function getFullName(){
        return ( $this->first_name . ' ' . $this->last_name );
    }
    
    public function getEmail(){
        return($this->email);
    }
    
    public function getFullInfo(){
        return [ 
                 "full_name" => $this->getFullName(),
                 "email"     => $this->getEmail(),
               ];
    }
};

?>