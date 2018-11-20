<?php namespace Acme;

use Acme\Billing\StripeBilling;

class PurchaseController2{

    //DEPEndency injection.
    //StripeBilling class and this object are decoupled.
    public function __construct__ (StripeBilling $stripe){
        $this->_stripe = $stripe;
    }
    
    public function buy(){
        $chargeInfo = ['scissor' => 5];
       
        $result = $this->stripe->charge($chargeInfo);
        
        var_dump($result);
    }
}