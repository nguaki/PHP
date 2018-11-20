<?php

class TranslateTest extends \PHPUnit_Framework_TestCase
{
    public function test_instantiation()
    {   
        $item = new \App\Translate('');
        
        $this->assertInstanceOf( \App\Translate::class, $item);
    }
    
    public function test_dbo_schema_insertion()
    {   
        $item = new \App\Translate('SELECT * FROM `database`.`table`');
        $item->toSQL_Srvr_query();
        $this->assertEquals( 'SELECT * FROM `database`.`dbo`.`table`', $item->getQ());
    }
    
    public function test_convert_limit1()
    {   
        $item = new \App\Translate('SELECT * FROM `database`.`table` LIMIT 3');
        $item->toSQL_Srvr_query();
        $this->assertEquals( 1, count($item->get_limit()));
        $this->assertEquals( array(3), $item->get_limit());
        $this->assertEquals( 'SELECT * FROM `database`.`dbo`.`table` OFFSET 0 ROWS RETURN NEXT 3 ROWS ONLY', $item->getQ());
    }
    
    public function test_convert_limit2()
    {   
        $item = new \App\Translate('SELECT * FROM `database`.`table` LIMIT 3,5');
        $item->toSQL_Srvr_query();
        $this->assertEquals( 1, count($item->get_limit()));
        $this->assertEquals( array('3,5'), $item->get_limit());
        $this->assertEquals( 'SELECT * FROM `database`.`dbo`.`table` OFFSET 3 ROWS RETURN NEXT 5 ROWS ONLY', $item->getQ());
    }
    public function test_convert_limit3()
    {   
        $item = new \App\Translate('SELECT * FROM `database`.`table` LIMIT 10,11');
        $item->toSQL_Srvr_query();
        $this->assertEquals( 1, count($item->get_limit()));
        $this->assertEquals( array('10,11'), $item->get_limit());
        $this->assertEquals( 'SELECT * FROM `database`.`dbo`.`table` OFFSET 10 ROWS RETURN NEXT 11 ROWS ONLY', $item->getQ());
    }
    /**
        $this->assertEquals($item->count(),3);
        
        $this->assertCount(3, $item->get());
        $this->assertEquals($item->get()[0],"one");
        $this->assertEquals($item->get()[1],"two");
        $this->assertEquals($item->get()[2],"three");
        
        $this->assertInstanceOf(IteratorAggregate::class,$item);
    
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
    */
}
?>