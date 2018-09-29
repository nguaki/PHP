<?php
class Todo
{
    private $_params;
     
    public function __construct($params)
    {
        $this->_params = $params;
    }
     
     public function createName()
    {
        error_log("createName() executed.");
        //create a new todo item
        $name = new NameItem();
        $name->first_name = $this->_params['first_name'];
        $name->last_name = $this->_params['last_name'];
      
        //pass the user's username and password to authenticate the user
        $name->save($this->_params['username'], $this->_params['userpass']);
     
        //return the todo item in array format
        //var_dump($name->toArray());
        return $name->toArray();
    }
     
     public function readName()
    {
   
        //read all the todo items while passing the username and password to authenticate
        $name_items = NameItem::getAllItems($this->_params['username'], $this->_params['userpass']);
        
        //return the list
        return $name_items;
    }
    
    public function updateName()
    {
        //update a todo item
        //retrieve the todo item first
        //$todo = NameItem::getItem($this->_params['name_id'], $this->_params['username'], $this->_params['userpass']);
        
        error_log("updateName action() executed");

        $name = new NameItem();

        //update the TODO item
        $name->first_name = $this->_params['first_name'];
        $name->last_name = $this->_params['last_name'];
        $name->name_id = $this->_params['name_id'];
        
        //pass the user's username and password to authenticate the user
        $name->update($this->_params['username'], $this->_params['userpass']);
        
        //return the newly updated todo item
        //in array format
        return $name->toArray();

    }


    public function deleteName()
    {
        error_log("deleteAction()");
        //delete a name item
        //delete the name item while passing the username and password to authenticate
        $name = new NameItem();
        $name->name_id = $this->_params['name_id'];
      
        //pass the user's username and password to authenticate the user
        $name->delete($this->_params['username'], $this->_params['userpass']);

        //return the deleted todo item
        //in array format, for display purposes
        return $name->toArray();

    }
    
    public function checkName()
    {
        error_log("checkName()");
        
        $name = new NameItem();
        $return_value = $name::_checkIfUserExists($this->_params['username'], $this->_params['userpass']);
    
        if($return_value == true){
            return true;
            
        } else {
            return false;
        }
    }

}