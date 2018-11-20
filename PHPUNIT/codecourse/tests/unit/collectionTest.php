<?php

class CollectionTest extends \PHPUnit_Framework_TestCase
{
    public function test_empty_collection()
    {   
        $item = new \App\Support\Collection;
        
        $this->assertEmpty($item->get());
    }
    
    public function test_count()
    {   
        $item = new \App\Support\Collection( [ "one", "two", "three" ]);
        
        $this->assertEquals($item->count(),3);
    }
    
    public function test_return_what_was_set()
    {   
        $item = new \App\Support\Collection( [ "one", "two", "three" ]);
        
        $this->assertCount(3, $item->get());
        $this->assertEquals($item->get()[0],"one");
        $this->assertEquals($item->get()[1],"two");
        $this->assertEquals($item->get()[2],"three");
    }
    
    //IteratorAggregate is a new feature to PHP 7.1.
    //It allows the class to be an iterator itself.
    //Need an example.
    public function test_iterator_aggregate()
    {
        $item = new \App\Support\Collection( [ "one", "two", "three" ]);
        
        $this->assertInstanceOf(IteratorAggregate::class,$item);
    }
    
    public function test_items_are_iterable()
    {
        $collection = new \App\Support\Collection( [ "one", "two", "three" ]);
        
        $list = [];
        
        foreach($collection as $item){
            $list[] = $item;
        }
        var_dump($list);
        $this->assertEquals(3, count($list));
    }
   
    public function test_merge()
    {
        $collection1 = new \App\Support\Collection( [ "one", "two", "three" ]);
        $collection2 = new \App\Support\Collection( [ "four", "five", "six" ]);
        
        $collection1->merge($collection2);
        
        $this->assertCount(6, $collection1->get());
        $this->assertEquals(6, $collection1->count());
        
    }
    
    public function test_add()
    {
        $collection1 = new \App\Support\Collection( [ "one", "two", "three" ]);
        
        $collection1->add(["three", "four", "five"]);
        
        $this->assertCount(6, $collection1->get());
        $this->assertEquals(6, $collection1->count());
        
    } 
    public function test_toJSON()
    {
        $collection1 = new \App\Support\Collection( [ 
                                                      ["username" => "Billy"], 
                                                      ["username" =>"Jack" ]
                                                    ] );
        
        $this->assertInternalType('string', $collection1->toJSON());
        $this->assertEquals('[{"username":"Billy"},{"username":"Jack"}]', $collection1->toJSON());
        
    } 
    public function test_toJSON_from_objects_of_this_class()
    {
        $collection1 = new \App\Support\Collection( [ 
                                                      ["username" => "Billy"], 
                                                      ["username" =>"Jack" ]
                                                    ] );
        
        $encoded = json_encode($collection1);
        
        $this->assertInternalType('string', $encoded);
        $this->assertEquals('[{"username":"Billy"},{"username":"Jack"}]', $encoded);
        
    } 
}
?>
}
?>