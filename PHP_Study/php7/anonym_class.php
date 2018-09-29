<?php

$xyz = new class{
    public function foo(){
        return "foo";
    }
};

var_dump($xyz, $xyz->foo());
        


?>