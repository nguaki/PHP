<?php
    require_once 'init.php';

    class InputTest extends \PHPUnit_Framework_TestCase
    {
        public function test_empty_input_post_exists()
        {
            $this->assertEquals( false, Input::exists());
        }
        public function test_empty_input_get_exists()
        {
            $this->assertEquals( false, Input::exists('get'));
        }
        public function test_non_empty_input_post_exists()
        {
            $_POST['email'] = 'abc@yahoo.com';
            $this->assertEquals( true, Input::exists('post'));
        }
        public function test_non_empty_input_get_exists()
        {
            $_GET['email'] = 'abc@yahoo.com';
            $this->assertEquals( true, Input::exists('get'));
        }
        public function test_input_get_returns_correctly()
        {
            $_GET['email'] = 'abc@yahoo.com';
            $this->assertEquals( 'abc@yahoo.com', Input::get('email'));
        }
        public function test_input_post_returns_correctly()
        {
            $_POST['email'] = 'abc@yahoo.com';
            $this->assertEquals( 'abc@yahoo.com', Input::get('email'));
        }
        public function test_input_post_returns_empty_correctly()
        {
            $this->assertEquals( '', Input::get('email'));
        }
    }
?>