<?php
    //require_once dirname(__FILE__) . '/../classes/Config.php';
    require_once 'init.php';

    class ConfigTest extends \PHPUnit_Framework_TestCase
    {
        public function test_token_data_is_generated()
        {
            $this->assertEquals( 'min', Token::get('weather/unit_time'));
            $this->assertEquals( 1, Config::get('weather/refresh_rate'));
            $this->assertEquals( 'kansas city', Config::get('weather/city'));
        }
    }
?>