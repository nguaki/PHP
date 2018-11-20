<?php
    //require_once dirname(__FILE__) . '/../classes/Config.php';
    require_once 'init.php';

    class SessionTest extends \PHPUnit_Framework_TestCase
    {
        public function test_isset_session_returns_true_correctly()
        {
            $_SESSION['token'] = 'aaadsfa2343gdag';
            $this->assertEquals( true, Session::exists('token'));
        }
        public function test_isset_session_returns_false_correctly()
        {
            if (isset($_SESSION['token'])) unset($_SESSION['token']);
            $this->assertEquals( false, Session::exists('token'));
        }
        public function test_session_variables_are_correctly_stored()
        {
            $this->assertEquals( 'aassddff11223344gg', Session::put('token', 'aassddff11223344gg'));
        }
        public function test_session_variables_returns_correctly()
        {
            $_SESSION['token'] = 'aaadsfa2343gdag';
            $this->assertEquals( 'aaadsfa2343gdag', Session::get('token'));
        }
        public function test_session_variables_delete_works_properly()
        {
            $_SESSION['token'] = 'aaadsfa2343gdag';
            Session::delete('token');
            $this->assertEquals( false, Session::exists('token'));
        }
        public function test_toggle_on_flash_of_session_variable()
        {
            //Stores a new message
            $this->assertEquals( 'success', Session::flash('abc', 'success'));
            //Flashes a new message
            $this->assertEquals( 'success', Session::flash('abc', 'success'));
            //Deletes the session variablthe session variable.
            $this->assertEquals( false, Session::exists('abc'));
        }
    }
?>