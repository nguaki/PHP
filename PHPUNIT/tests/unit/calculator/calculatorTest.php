<?php

class CalcTest extends \PHPUnit_Framework_TestCase
{
    public function test_addition()
    {   
        $Addition = new \App\Calculator\Addition;
        
        $Addition->setOperands([10,5]);
        
        $this->assertEquals($Addition->calculate(), 15 );
    }
    public function test_exception_thrown()
    {   
       //The order of these statements make difference on the results.
       //Need this line first.
       $this->expectException(\App\Calculator\Exception\NoOperandException::class);
        $Addition = new \App\Calculator\Addition;
        
       $Addition->calculate();
       
    }
    public function test_division()
    {   
        $Division = new \App\Calculator\Division;
        
        $Division->setOperands([10,5]);
        
        $this->assertEquals($Division->calculate(), 2 );
    }
    public function test_removes_all_zeroes_before_dividing()
    {   
        $Division = new \App\Calculator\Division;
        
        $Division->setOperands([10,0,0,0,5]);
        
        $this->assertEquals($Division->calculate(), 2 );
    }
    public function test_division_exception_thrown()
    {   
       //The order of these statements make difference on the results.
       //Need this line first.
       $this->expectException(\App\Calculator\Exception\NoOperandException::class);
        $Division = new \App\Calculator\Division;
        
       $Division->calculate();
       
    }
}