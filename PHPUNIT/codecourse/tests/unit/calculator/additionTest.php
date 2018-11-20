<?php
class AdditionTest extends \PHPUnit_Framework_TestCase
{
    public function test_addition()
    {   
        $Addition = new \App\Calculator\Addition;
        
        $Addition->setOperands([10,5]);
        
        $this->assertEquals($Addition->calculate(), 15 );
    }
    public function test_addition_no_operands_exception_thrown()
    {   
       //The order of these statements make difference on the results.
       //Need this line first.
       $this->expectException(\App\Calculator\Exception\NoOperandException::class);
        $Addition = new \App\Calculator\Addition;
        
       $Addition->calculate();
       
    }
 
}

?>