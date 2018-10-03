<?php

require 'Helper.php';
require 'Validator.php';
require 'User.php';

# Provides rule  sets for each type of entry.
# I guess if there is a way to take the advantage of OO design, this may be it.
# If we want to extend one more data entry, we can extend this rule set accordingly.
# Example: An entry of Social Security.

// e.g. lets say  $rules = array( "email"=>"required|email", 
//                                "password"=>"required|min:8", 
//                                "socialsecurity"=>"required|min:9"
//
//      we can accomodate this by adding ValidateSocialSecurity() in Validator class.
//      Although, doing this is in procedural isn't impossible,  this is a clever way of making this extendable.

$rules = array(
				"email"=>"required|email",    //email is required.  But what is email?
                "password"=>"required|min:8"  //password is require with minimum lenght of 8.
              );
              
$datas    = array(
					array( 
						"email"=>"sahfkashf@gmail.com", 
						"password"=>"178899098"
					),
					array( 
						"email"=>"sahfkashfgmail.com", 
						"password"=>"178899098"
					),
					array( 
						"email"=>"", 
						"password"=>"178899098"
					),
					array( 
						"email"=>"sahfkashf@gmail.com", 
						"password"=>"7889909"
					)
				);

#An object to validate?  Sounds weird.
$validator = new Validator();

#Note that the method Validate is publc.
#The other methods that Validate() invoke are private.

for( $index = 0, $size = count($datas); $index < $size; $index++ )
{
	echo 'data=';
	print_r($datas[$index]);
	echo '<br>';
	
	if( $validator->Validate( $datas[$index], $rules ))
	{
		#Sounds weird but instantiating an object to store values.
		$AUser = new User();
	
		#Note that these methods SetMail() and SetPassword() are public methods.
		$AUser->SetEmail( $datas[$index]['email']);  // It is setting private members.
		$AUser->SetPassword( GetHash($datas[$index]['password']));
		//var_dump( $AUser );
		echo '<h1>' . $AUser->GetEmail() . '</h1><br>';
		echo '<h1>' . $AUser->GetPassword() . '</h1><br>';
	}
	else
	{
		$Errors =  $validator->getErrors();
	
		var_dump($Errors);
		foreach( $Errors as $Error )
		{
			foreach( $Error as $key=>$value)
			{
				echo '<h2>' . $key . ':' . $value . '</h2><br>';
			}
		}	
		/*
 array(3) { [0] => array(1) { 'email' => string(34) "sahfkashfgmail.com is not an email" } 
            [1] => array(1) { 'email' => string(33) "emailneeds to have non-null value" } 
            [2] => array(1) { 'password' => string(42) "passwordneeds to have at least 8in length." } }	  	   
            */
		//count() and sizeof() is not working php.
		/*
		for( $index=0, $size = sizeof($Errors); $index < $size; $index++ )
		{
			foreach( $Errors[$index] as $key=>$value )
				echo "$key ............ $value </br>";
		}
		*/
		echo '---------------------------------------------------------<br>';
		
		//$size = count($Errors);
		//echo 'size = ' . $size . '</br>';
		//$Error = $Errors[$size-1];
	
	    //var_dump($Error);
	    //foreach( $Error as $key=>$value)
		//{
		//	echo '<h2>' . $key . ':' . $value . '</h2><br>';
		//}	
		//
	}
}
?>