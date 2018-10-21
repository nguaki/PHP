<?php
    //require_once dirname(__FILE__) . '/../classes/Config.php';
    require_once 'init.php';

    class ConfigTest extends \PHPUnit_Framework_TestCase
    {
        public function test_config_data_is_read_correctly()
        {
            $this->assertEquals( 'min', Config::get('weather/unit_time'));
            $this->assertEquals( 1, Config::get('weather/refresh_rate'));
            $this->assertEquals( 'kansas city', Config::get('weather/city'));
        }
    }
?>