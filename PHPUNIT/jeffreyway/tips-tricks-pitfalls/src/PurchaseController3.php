<?php namespace Acme;

use Acme\Billing\StripeBilling;

class PurchaseController3{

    //DEPEndency injection.
    //StripeBilling class and this object are decoupled.
    //This setup allows for Mock object to be sent 
    public function __construct(StripeBilling $stripe)
    { 
        $this->_stripe = $stripe;
    }
    
    public function buy(){
        $chargeInfo = ['scissor' => 5];
       
        $result = $this->_stripe->charge($chargeInfo);
        
        var_dump($result);
    }
}