<?php

class Validator
{
	private $error = array();
	
	
	//Here's a sample data array that is passing into this function.
	//$data = array( "email"=>"sahfkashf@gmail.com", "password"=>"178899098");
	//$rules = array("email"=>"required|email", "password"=>"required|min:8" );
	public function Validate( array $data, array $rules )
	{
		echo 'array data = ';
		var_dump($data);
		$ValidFlag= true;
		
		//e.g. $key = email, password    $ruleset = required|email, required|min:8
		foreach( $rules as $key=>$ruleset )
		{
			$rules = explode( '|', $ruleset );
			
			//e.g.  $rule[0]=required  $email[1]=email
			foreach( $rules as $rule )
			{
				// look for : character.
				//e.g. min:8
				$pos = strpos( $rule, ':' );
				
				// if : character is found in a rule.
				//This is confusing.  $pos should return a numerical value.
				//So compare numerical value, not a boolean.
				//If $pos == 0, it is still found.
				//To be more clear, if position is not found, $pos should be a negative number.
				//This is hard to remember.
				if( $pos !== false )
				{
					//e.g. $rule = min  $parameter = 8
					$parameter = substr( $rule, $pos + 1 );
					$rule = substr( $rule, 0, $pos );
				}
				else
					$parameter = '';
					
				// This is smart way of figuring out the method name.
				//e.g. $MethodName = ValidateRequired, ValidateEmail, ValidateMin
				$MethodName = 'Validate' . ucfirst( $rule );  
				echo "MethodName = ". $MethodName ."<br/>";
				
				$data1 = isset( $data[$key] ) ? $data[$key] : NULL;  // e.g. validate $data[email], $date[password]
				echo "data1 = "	. $data1 . '<br/>';
				# Never had to do this in C programming.
				if( method_exists($this, $MethodName) )  
				{
					//Note: All the methods are private. So $this-> operation makes  a sense.
					//Note: There must be $ sign in front of MethodName.  Otherwise, it will 
					//Note: have a fatal error.
					//Note: Other method names are private.
					//Note: Other negative side of this cool stuff is that all the arguments
					//Note: must be the same in order for this to work.
					//Note: Is it worth it?
					$ValidFlag = $this->$MethodName( $key, $data1, $parameter );  // e.g. ( "email",  "sahfkashf@gmail.com", "" ) ( "password",  "7430174qr", "8" )
					
					#if these private methods return false, don't need to do anythng further.
					#Just return false.
					if ($ValidFlag == false)  return false;
					
				}
				else
				{
					$this->error[][$key] = $MethodName . "doesn't exist";
					$ValidFlag = false;
				}
			}
		}
		return $ValidFlag;
	}
	
	//no ValidatePassword()?  In this case, there the password check is done in ValidateMin().
	
	//This checks if appropriate data is available.  Checking the validity of the data comes later.
	private function ValidateRequired( $key, $value, $parameter )
	{
		$flag = true;
		
		if( ( strlen($value) == 0 ) || $value == NULL )
		{
			$this->error[][$key] = $key . "needs to have non-null value";
			$flag = false;
		}
		return $flag;
	}
	
	
	private function ValidateMin( $key, $value, $parameter )
	{
		$flag = true;
		
		if( strlen( $value ) < $parameter )
		{
			$this->error[][$key] = $key . "needs to have at least " . $parameter . "in length.";
			$flag = false;
		}
		return $flag;
	}
	
	private function ValidateEmail( $key, $value, $parameter )
	{
		$flag = true;
		
		echo "test this email = " . $value . '<br/>';
		
		if( !filter_var($value, FILTER_VALIDATE_EMAIL ) )
		{
			echo "Inside <br/>";
			$this->error[][$key] = $value . " is not an email";;
			$flag = false;
		}
		
		return $flag;	
	}
	
	public function GetErrors()
	{
		return $this->error;
	}
}

?>