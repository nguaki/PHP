<?php
    //require_once dirname(__FILE__) . '/../classes/Config.php';
    require_once 'init.php';

    class InputRulesTest extends \PHPUnit_Framework_TestCase
    {
        public function test_email_is_empty()
        {
            $Input = new InputRules();
        }
    }
?>