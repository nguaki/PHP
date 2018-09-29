<?php


//Generates a singleton DB connection.
class Database {
	private $_connection;
	
	//It is important that this is private.  Only this class
	//has control over this variable.
	private static $_instance;
	
	//It is important to have this method as static.
	//This is only way to get one instance.
	public static function getInstance() {
	
		if (!self::$_instance) {
			//Note that there is parenthesis with self();
			error_log("**** creating a new instance");
			self::$_instance = new self();
		} else {
			error_log("**** Using existing instance")  ;
		}
		return self::$_instance;
	}

	public function __construct() {
		require_once "DB_config.php";
		
		$this->_connection =  new mysqli( $DB_config['hostname'], 
										  $DB_config['username'], 
										  $DB_config['password'],
										  $DB_config['db_name'],
										  $DB_config['port']);

		if (mysqli_connect_error()) {
			trigger_error('Failed to connectto MySQL:', mysqli_connect_error() );
		}
	}

	//In case this object is cloned, no action is required.
	private function __clone() {}
	
	public function getConnection() {
		return $this->_connection;
	}
}	

?>
	