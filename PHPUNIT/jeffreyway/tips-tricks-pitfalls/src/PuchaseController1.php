<?php namespace Acme;

use Acme\Billing\StripeBilling;

class PurchaseController1{

    public function buy(){
        $chargeInfo = ['scissor' => 5];
       
        //Oct 24, 2018
        //Logically, it makes a perfect sense.
        //Need a way to pay.
        //The problem with this is that it is not good
        //to test in isolation.
        //PHPUnit is trying to test buy() method and this method
        //is instantiating a new object.
        $stripe = new StripeBilling;  
        $result = $stripe->charge($chargeInfo);
        
        var_dump($result);
    }
}