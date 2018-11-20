<?php

namespace App\Calculator;

abstract class Operands{
    protected $operands;
    
    public function setOperands( array $operands ){
        $this->operands = $operands;
    }
}

?>