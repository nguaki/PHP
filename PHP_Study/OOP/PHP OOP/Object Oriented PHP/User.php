<?php
class User
{
	# I really don't see the impact of these variables being private.
	# It adds unnecessary complexity.
	# As a matter of fact, the whole thing is a waste of time, energy and money.
	private $email;
	private $password;
	
	//function User( $em, $pw )
	//{
	//	$this->email = $em;
	//	$this->password = $pw;
	//}
	
	public function SetEmail( $string )
	{
		//echo "$string <br/>";
		$this->email = $string;
		return $this;
	}
	
	public function GetEmail()
	{
		return $this->email;
	}
	
	public function GetPassword()
	{
		return $this->password;
	}
	
	public function SetPassword( $string )
	{
		echo "$string <br/>";
		$this->password = $string;
		return $this;
	}
}
?>