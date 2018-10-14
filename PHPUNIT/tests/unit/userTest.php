<?php  

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function test_get_first_name()
    {   
        $user = new \App\Models\User;
        
        $user->setFirstName("xyz");
        
        $this->assertTrue($user->getFirstName() == "xyz" );
        
        //Same asserting using different command.
        $this->assertEquals($user->getFirstName(), "xyz" );
    }
    
    public function test_get_last_name()
    {   
        $user = new \App\Models\User;
        
        $user->setLastName("xyz");
        
        $this->assertTrue($user->getLastName() == "xyz" );
        
        //Same asserting using different command.
        $this->assertEquals($user->getLastName(), "xyz" );
    }
    
    public function test_full_name()
    {   
        $user = new \App\Models\User;
        
        $user->setFirstName("xyz");
        $user->setLastName("xyz");
        
        $this->assertTrue($user->getFullName() == $user->first_name . ' ' . $user->last_name );
        
        //Same asserting using different command.
        $this->assertEquals($user->getFullName(), $user->first_name . ' ' . $user->last_name );
        
    }
    
    public function test_trimmed_name()
    {   
        $user = new \App\Models\User;
        
        $user->setFirstName("    xyz  ");
        $user->setLastName("   xyz    ");
        
        $this->assertTrue($user->getFullName() == $user->first_name . ' ' . $user->last_name );
        
        //Same asserting using different command.
        $this->assertEquals($user->getFullName(), $user->first_name . ' ' . $user->last_name );
    }
    public function test_email()
    {   
        $user = new \App\Models\User;
        
        $user->setEmail("xyz@yahoo.com");
        
        $this->assertTrue($user->getEmail() == "xyz@yahoo.com" );
        
    }     
   
   /** @test */ 
    public function xyz_test_full_info()
    {   
        $user = new \App\Models\User;
        
        $user->setFirstName("    xyz  ");
        $user->setLastName("   xyz    ");
        $user->setEmail("xyz@yahoo.com");
        
        $full_info = $user->getFullInfo();
        
        $this->assertArrayHasKey('full_name', $full_info);
        $this->assertArrayHasKey('email', $full_info);
        
        $this->assertTrue($full_info['full_name'] == "xyz xyz");
        $this->assertTrue($full_info['email'] == "xyz@yahoo.com");
    }     
}