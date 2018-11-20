<?php
    require_once 'init.php';

    class CookieTest extends \PHPUnit_Framework_TestCase
    {
        public function test_cookie_set_is_correct_false()
        {
            $this->assertEquals( false, Cookie::exists('email'));
        }
        public function test_cookie_set_is_correct_true()
        {
            //Causes error.
            //setcookie( 'email', 'jcc@yahoo.com', time() + 60, '/' );
            $_COOKIE['email'] = 'jcc@yahoo.com';
            $this->assertEquals( true, Cookie::exists('email'));
            unset($_COOKIE['email']);
        }
        public function test_cookie_returns_correct_value()
        {
            $_COOKIE['email'] = 'jcc@yahoo.com';
            $this->assertEquals( 'jcc@yahoo.com', Cookie::get('email'));
            unset($_COOKIE['email']);
        }
        public function test_cookie_returns_false_when_value_is_not_set()
        {
            $this->assertEquals( false, Cookie::get('email'));
        }
        
        //The followign is needed to removed the 'message already sent error'
        /**
         * @runInSeparateProcess
         */
        public function test_cookie_is_set_correctly()
        {
            //getting error message: Cannot modify header information - headers already sent by
            $this->assertEquals( true, Cookie::put('email', 'jcc@yahoo.com', 3600));
            //$this->assertEquals( true, Cookie::exists('email'));
            //$this->assertEquals( 'jcc@yahoo.com', Cookie::get('email'));
        }
        //The followign is needed to removed the 'message already sent error'
        /**
         * @runInSeparateProcess
         */
        public function test_cookie_is_delete_correctly()
        {
            //getting error message: Cannot modify header information - headers already sent by
            $this->assertEquals( true, Cookie::delete('email'));
            //$this->assertEquals( true, Cookie::exists('email'));
            //$this->assertEquals( 'jcc@yahoo.com', Cookie::get('email'));
        }

    }
?>