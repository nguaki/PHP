<?php
    require_once '../../classes/Validate.php';

    class ValidateTest extends PHPUnit_Framework_TestCase
    {
        public function testValidateEmail()
        {
            $this->assertTrue( true == Validate::checkEmail('xyz@yahoo.com') );
            $this->assertTrue( false == Validate::checkEmail('xyz@yahoo') );
        }
        public function testValidateUserName()
        {
            $this->assertTrue( true == Validate::checkUserName('xyz') );
            $this->assertTrue( false == Validate::checkEmail('xyz 1ahoo') );
        }
    }
?>