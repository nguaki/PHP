<?php
    //require_once dirname(__FILE__) . '/../classes/Config.php';
    require_once 'init.php';

    class APICallIntervalTest extends \PHPUnit_Framework_TestCase{
    
        public function test_calculation_is_correct_in_unit_time_equal_to_min(){
            $this->assertEquals( 60000, APICallInterval::getInMillisec());
        }
        public function test_calculation_is_correct_in_unit_time_equal_to_default(){
            $GLOBALS['config']['weather']['unit_time'] = 'hour';
            $this->assertEquals( 60000, APICallInterval::getInMillisec());
        }
        public function test_calculation_is_correct_in_unit_time_equal_to_second(){
            $GLOBALS['config']['weather']['unit_time'] = 'sec';
            $this->assertEquals( 1000, APICallInterval::getInMillisec());
        }
        public function test_calculation_is_correct_in_unit_time_with_diff_refresh_rate(){
            $GLOBALS['config']['weather']['refresh_rate'] = 2;
            $this->assertEquals( 120000, APICallInterval::getInMillisec());
        }
    }
?>
