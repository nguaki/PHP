<?php

namespace App\Calculator;
use App\Calculator\OperationInterface;
use App\Calculator\Operands;
use App\Calculator\Exception\NoOperandException;

class Calculator{
   
    private $operations = [];
    
    //Assigns one operation.
    //Note the polymorphism is used here.  Interface class which
    //is the base of Addition and Division class can take in
    //both classes.
    public function setOperation(OperationInterface $operation){
        $this->operations[] = $operation; 
    }
    
    //Assigns multiple operations.
    //Note that PHP is a type loose language.
    //In this case array keyword is used to define the incoming parameter
    //must be an array.
    public function setOperations(array $operations){
        /*Method 1
        foreach($operations as $index=>$value){
            if (!($value instanceof OperationInterface) )
                unset($operations[$index]);
        }
        */
        //Filters out all operations that returns false.
        /*METHOD 2
        $filtered_operations = array_filter( $operations, function($operation){
            if(!$operation instanceof OperationInterface)
                return false;
            return true;
        });
        */
        $filtered_operations = array_filter( $operations, function($operation){
                return  ($operation instanceof OperationInterface);
        });
        //$this->operations = array_merge($this->operations, $operations); 
        $this->operations = array_merge($this->operations, $filtered_operations); 
    }
    
    public function getOperations(){
        return $this->operations; 
    }
    
    public function calculate(){
        //Since operations has objects of Addition or Divisions.
        if(count($this->operations) == 1)
            return $this->operations[0]->calculate(); 
        else{
        /*METHOD 1
          foreach($this->operations as $operation)
              $result[] = $operation->calculate();
          return $result;
          */
          return array_map(function($operation){
              return $operation->calculate();
          }, $this->operations);
        } 
    }
}