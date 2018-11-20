<?php
    //require_once dirname(__FILE__) . '/../classes/Config.php';
    require_once 'init.php';
    class HashTest extends \PHPUnit_Framework_TestCase
    {
        public function test_password_hash_is_generated()
        {
            $this->assertNotEmpty( Hash::generate_pw_hash('abcdefgh'));
        }
        public function test_password_hash_generated_matches_with_login()
        {
            $this->assertEquals( true, Hash::verify_pw_hash('abcdefgh', "$2y$10$3VJpblmzt6PmNaJ5iAAWSerxcqyzXlTxMnjTENVzqMg8dcoznUCrS"));
        }
        public function test_password_hash_is_generated_based_on_uniq_id()
        {
            $this->assertNotEmpty( Hash::unique());
        }
  }
?>