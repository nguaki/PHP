<?php

class Validate{
    private $_errors = array(),
            $_db = NULL,
            $_pass = false;  
    
    public function __construct(){
        
        $_db = DB::getInstance();
        //if( $_db instanceof DB ) 
        //    echo "DB<br>";
        //else 
        //    echo "Not DB<br>";
        //var_dump($_db);
        //echo '_db instantiated';
    }
    
    //input parameters
    //   $source : implies either $_POST or $_GET.
    public function check( $source, $items = array() ) 
    {
        foreach($items as $input_name => $rule_set){
            foreach($rule_set as $rule => $rule_value ){
               
                //obtaining the value of an input of the form.
                $value = $source[$input_name]; 
                
                if( $rule === 'required' && empty($value))
                    $this->addErrors( "{$input_name} is empty.");
                else if(!empty($value)){
                    switch($rule)
                    {
                        case 'min':
                            if(strlen($value)<$rule_value)
                                $this->addErrors( "{$input_name} must be minumum of $rule_value.");
                            break;
                        case 'max':
                            if(strlen($value)>$rule_value)
                                $this->addErrors( "{$input_name} must be maximum of $rule_value.");
                            break;
                        case 'matches':
                            if($value != $source[$rule_value])
                                $this->addErrors( "{$rule_value} does not  match.");
                            break;
                            
                        case 'unique':
                            //Cannot call query().
                            //_db is an instance of DB but cannot recognize the query() method.
                            //$userRows =  $this->_db->query("SELECT * FROM users where user_email= '". $value ."'");
                            $userRows = DB::getInstance()->query("SELECT * FROM users where user_email= '". $value ."'");
                            if($userRows->count()) 
                                $this->addErrors( "Such email already exists.");
                            break;
                    }
                }
            }
        }
        
        if( empty($this->_errors) ) $this->_pass = true;
        
        return $this;
    }
   
    public function passed()
    {
        return $this->_pass;
    }
    public function errors()
    {
        return $this->_errors;
    }
    
    private function addErrors($errorMessage)
    {
       //echo $errorMessage . '<br>';
       $this->_errors[] = $errorMessage;  
    }
}
?>