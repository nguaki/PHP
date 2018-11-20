<?php
    //require_once dirname(__FILE__) . '/../classes/Config.php';
    require_once 'init.php';

    class RedirectTest extends \PHPUnit_Framework_TestCase
    {
        public function test_redirection()
        {
            $this->assertEquals( 'min', Redirect::to('www.google.com'));
        }
    }
?>