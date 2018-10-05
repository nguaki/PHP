<?php
require_once '../core/init.php';

class DB{
	private static $_instance1 = null; 
	
	private $_pdo,
			$_query,
			$_error = false,
			$_results,
			$_count = 0;
			
	private function __construct()
	{
		try   
		{
			$this->_pdo = new PDO( 'mysql:host=' . Config::get('mysql/host') . ';
			                       dbname=' . Config::get('mysql/db'), 
			                       Config::get('mysql/username'), 
			                       Config::get('mysql/password') );
			//$this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		}
		catch( PDOException $e )
		{
			die( $e->getMessage());
		}
	}
	public static function getInstance()
	{
		if( !isset( self::$_instance1 ) )
		{
			self::$_instance1 = new DB();
		}
		return self::$_instance1;
	}

	//Preparing and Binding  prevents SQL injection.
	//
	//Parameters:
	//  $sql : e.g. insert into users () values (?,?,?)
	//  $params: associative array of column name and its values.
	//
	//OUTPUT:
	//  *this  : if everything is ok
	//  false  : oops, something is not ok
	//
	public function query( $sql, $params = array() )
	{
		$this->_error = false;
		
		if( $this->_query = $this->_pdo->prepare($sql))
		{
			$x = 1;
			if( count( $params ) )
			{
				foreach( $params as $param )
				{
					$this->_query->bindValue( $x, $param );
					$x++;
				}
			}
			if( $this->_query->execute())
			{ 
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
	
	// Prepares SQL statement for query().
	// e.g.  SELECT * FROM users where email = ?
	//       
	//
	// $action: SELECT *, DELETE, UPDATE, INSERT
	// $table: name of the table
	// $where: Indexed array of 3.
	//         Comprised of (column_name, equal operator, value)
	//         e.g.  ('email', '=', 'aaa@yahoo.com')
	//
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
			
				echo "SQL = $sql <br>";
				
				//If there is an error, error() returns true.
				//We want error() to return false which means DB operation was as
				//success.
				if( !$this->query( $sql, array($value))->error() )
				{
					return $this;
				}
			}
			return false;
		}
	}
	
	public function get( $table, $where )
	{
		return $this->action( 'SELECT *', $table, $where );
	}
			
			
	public function delete( $table, $where )
	{
		echo "Hello from delete<br>";
		return $this->action( 'DELETE *', $table, $where );
	}		
	
	public function update( $table, $email, $fields = array() )
	{
		$set = '';
		$x = 1;
		
		
		foreach( $fields as $name => $value )
		{
			$set .= "{$name} = ?";
			if( $x < count($fields))
			{
				$set .= ', ';
			}
			$x++;
		}
		$sql = "UPDATE {$table} SET {$set} WHERE user_email = '" . $email . "'";
		echo $sql . "<br>";
		if( !$this->query( $sql, $fields)->error())
		{	
			return true;
		}
		return false;
	
	}
	
	public function error()
	{
		return $this->_error;
	}
	
	public function results()
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
	
	//input param:
	//  $table  -  name of the table
	//  $fields -  associative array where key is the column name
	//             and the value is the value of column.
	public function insert( $table, $fields = array() )
	{
		if( count($fields))
		{
			$keys = array_keys($fields);
			$values = null;
			$x = 1;
			
			//$values will create a string looks like
			//"?, ?, ?"".
			//Number of ? is how many columns to be assigned.
			//foreach( $fields as $field )
			foreach( $fields as $key=>$value )
			{
				$values     .= '?';
				if( $x < count( $fields ) )
				{
					$values .= ',  ';
				}
				$x++;
			}
			
			$x = 1;
			$act_values = NULL;
			foreach( $fields as $key=>$value )
			{
				if($key == "user_name" or $key == "user_email" or $key == "user_pass")
				{
					$act_values .= "'" . $value . "',";
				}
				else
				{
					$act_values .= $value;
				}
			}
		    
			//Pacakage SQL statement for prepare stage.
			$sql = "INSERT INTO {$table} (`" . implode( '`, `' ,$keys) . "` ) VALUES ({$values})";
			//$sql = "INSERT INTO users (`" . implode( '`, `' ,$keys) . "` ) VALUES ({$act_values})";
	
			echo "$sql <br>";
			var_dump($fields);
			//die();
			//Now send the SQL along with the associative array.
			$empty_array = array();
			//if( !$this->query( $sql, $empty_array)->error())
			if( !$this->query( $sql, $fields)->error())
			{	
				return true;
			}
		}
		return false;
	}
	
}
?>