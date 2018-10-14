<?php

namespace App\Calculator;
use App\Calculator\OperationInterface;
use App\Calculator\Operands;
use App\Calculator\Exception\NoOperandException;

class Division extends Operands implements OperationInterface{
    
    public function calculate(){
        if(count($this->operands) === 0){
            throw new NoOperandException;
        }
        
        return(array_reduce(array_filter($this->operands), function($a, $b){
            if($a !== null && $b !== null)
                return $a / $b;
            return $b;
        }, null));
    }
}

?>