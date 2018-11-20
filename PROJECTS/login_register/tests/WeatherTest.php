<?php
    //require_once dirname(__FILE__) . '/../classes/Config.php';
    require_once 'init.php';

    class WeatherTest extends \PHPUnit_Framework_TestCase
    {
        public function test_object_is_instantiated()
        {
            $url= Config::get('weather/url') . 'Kansas City' . ","  . 'USA'  . "&appid="  . Config::get('weather/api_id');

            $weather = new Weather($url);
            
            $this->assertInstanceOf( 'Weather', $weather);
            $this->assertNotEmpty( $weather->getCel());
            $this->assertNotEmpty( $weather->getFahrenheit());
            
        }
    }
?>