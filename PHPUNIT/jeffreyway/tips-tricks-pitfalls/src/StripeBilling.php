<?php namespace Acme\Billing;

class StripeBilling{

    public function charge(array $chargeInfo)
    {
        $s = 'Charging with stripe for ';
        foreach($chargeInfo as $product => $price )
            $s .= $product . ':$' . $price; 
        
        return $s;
    }
}