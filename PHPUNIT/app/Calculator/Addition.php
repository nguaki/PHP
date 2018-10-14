<?php

namespace App\Calculator;
use App\Calculator\OperationInterface;
use App\Calculator\Operands;
use App\Calculator\Exception\NoOperandException;

class Addition extends Operands implements OperationInterface{
    
    public function calculate(){
        if(count($this->operands) === 0){
            throw new NoOperandException;
        }
        return array_sum( $this->operands );
    }
}

?>