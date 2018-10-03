<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/Config.php';


//Instantiate one connection per session.
//DB connection is expensive, so reduce to one connection
//per seesion.
//This is from singleton design pattern.

class Database
{
     
	static $_instance = null;
     private $_PDO;
     public $_query;
     public $_results;
     public $_count;
     public $_error;
     
     //Encapsulation with private is make important so that 
     //this class gets instantiated only once from the other
     //member function.
     private function  __construct()
     {
          try
          {
               //Retrieve DB configuration data.
          	$this->_PDO = new PDO('mysql:host=' . Config::get('mysql/host') . ';
	                             port='       . Config::get('mysql/port') . ';
	                             dbname='     . Config::get('mysql/db'),
	                                            Config::get('mysql/username'),
                                                 Config::get('mysql/password') ); 
                                       
               //$this->_PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
               $connStatus = $this->_PDO->getAttribute(PDO::ATTR_CONNECTION_STATUS);
               $driverName =  $this->_PDO->getAttribute(PDO::ATTR_DRIVER_NAME);
               echo "Connected successfully (Connection:" .$connStatus->host_info." Driver:" . $driverName .")";

          }
          catch(PDOException $e)
          {
               echo $e->getMessage();
          }
     }
     
    	public static function getInstance()
	{
		if( !isset( self::$_instance ) )
		{
			self::$_instance = new Database();
		}
		return self::$_instance;
	}
	
	//Since _PDO is a private, the only way is to query is from
	//its member functions.
	//prepare() and bind() statements prevents SQL injection.
	public function query( $sql, $params = array() )
	{
		$this->error = false;
		
		if( $this->_query = $this->_PDO->prepare($sql))
		{
			//echo 'Success';
			$x = 1;
			if( count( $params ) )
			{
				foreach( $params as $param )
				{
					$this->_query->bindvalue( $x, $param );
					$x++;
				}
			}
			
			if( $this->_query->execute())
			{
				//Returns as objects.
				$this->_results = $this->_query->fetchAll( PDO::FETCH_OBJ );
				$this->_count = $this->_query->rowCount();
			}
			else
			{
				$this->_error = true;
			}
		}
		return $this;
	}
	
	public function error()
	{
		return $this->_error;
	}
	
	public function getResults()
	{
		return $this->_results;
	}
	
	public function first()
	{
		return $this->results()[0];
	}
	public function count()
	{
		return $this->_count;
	}	
	
	private function action($action, $table, $where = array())
	{
		if( count($where) === 3 )
		{
			$operators = array( '=', '>', '<', '>=', '<=' );
			$field = $where[0];
			$operator = $where[1];
			$value = $where[2];
			
			if( in_array( $operator, $operators ) )
			{
				$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
				echo 'sql = ' . $sql . "<br>";
				if( !$this->query( $sql, array($value))->error() )
				{
					return $this;
				}
			}
			return false;
		}
	}
	
	public function update( $sql )
	{
		$this->_PDO->query($sql);
	}
	public function get( $table, $where )
	{
		return $this->action( 'SELECT *', $table, $where );
	}

}

?>