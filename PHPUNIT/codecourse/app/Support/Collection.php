<?php

namespace App\Support;

//Not sure why use is needed?
use IteratorAggregate;
use ArrayIterator;

//For JSON_ENCODE objects.
use JsonSerializable;

class Collection implements IteratorAggregate, JsonSerializable
{

    private $item = [];
    
    //Default is empty
    public function __construct(array $item = [] )
    {
        $this->item = $item;
    }
    
    public function get(){
        return $this->item;
    }
    
    public function count(){
        return count($this->item);
    }
    
    //function from IteratorAggregate interface that needs to be defined.
    public function getIterator(){
        return new ArrayIterator($this->item);
    }
    
    public function add(array $items) {
        //Merge arrays
        $this->item = array_merge($this->item, $items);
        
    }
    
    public function merge(Collection $collection){
        //Returned merged arrays.
        return $this->add($collection->get());
    }
    
    public function toJson(){
        return json_encode($this->item);
    }
    
    public function JsonSerialize(){
        return $this->item;
    } 
    
    
    
    
    
    
    
}
?>