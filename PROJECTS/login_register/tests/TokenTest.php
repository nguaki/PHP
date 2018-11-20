<?php
    //require_once dirname(__FILE__) . '/../classes/Config.php';
    require_once 'init.php';

    class TokenTest extends \PHPUnit_Framework_TestCase
    {
        public function test_token_data_is_generated()
        {
            $this->assertNotEmpty( Token::generate());
        }
        public function test_token_data_returns_correctly()
        {
            $_SESSION['token'] = '1234567890';
            $this->assertEquals( '1234567890', Token::get());
        }
        public function test_token_check_is_true_work_properly()
        {
            $_SESSION['token'] = '1234567890';
            $this->assertEquals( true, Token::check('1234567890'));
        }
        public function test_token_check_is_false_work_properly()
        {
            $_SESSION['token'] = '1234567890';
            $this->assertEquals( false, Token::check('0000000000'));
        }
    }
?>