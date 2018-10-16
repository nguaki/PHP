<?php

class CalcTest extends \PHPUnit_Framework_TestCase
{
    
    public function test_set_multiple_operations123(){
        $Addition1 = new \App\Calculator\Addition;
        $Addition1->setOperands([10,5]);
        
        $Addition2 = new \App\Calculator\Addition;
        $Addition2->setOperands([20,10]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperations([$Addition1, $Addition2]);

        $this->assertCount(2, $calculator->getOperations());
    }
    
    public function test_one_operation(){
        $Addition = new \App\Calculator\Addition;
        
        $Addition->setOperands([10,5]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperation($Addition);

        $this->assertCount(1, $calculator->getOperations());
    }
    public function test_ignore_weird_operations(){
        $Addition1 = new \App\Calculator\Addition;
        $Addition1->setOperands([10,5]);
        
        $Addition2 = new \App\Calculator\Addition;
        $Addition2->setOperands([20,10]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperations([$Addition1, $Addition2, 'weirdoperation1', 'weirdoperation2']);

        $this->assertCount(2, $calculator->getOperations());
    }
    public function test_one_calculate(){
        $Addition1 = new \App\Calculator\Addition;
        $Addition1->setOperands([10,5]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperation($Addition1);

        $this->assertEquals(15, $calculator->calculate());
    }
    public function test_multiple_calculate(){
        $Addition1 = new \App\Calculator\Addition;
        $Addition1->setOperands([10,5]);
        $Division = new \App\Calculator\Division;
        $Division->setOperands([10,5]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperations([$Addition1,$Division]);

        $this->assertInternalType('array', $calculator->calculate());
        $this->assertEquals(15, $calculator->calculate()[0]);
        $this->assertEquals(2, $calculator->calculate()[1]);
    }
  }