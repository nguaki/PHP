<?php

function ValidatePassword( $APassword )
{
	global $error, $errorindex;
	
	$Flag = true;
	
	//$APassword = $data['password'];
	
	if( strlen($APassword) > 0 )
	{
		if( strlen($APassword) < 8)
		{
			$Flag = false;
			$error[$errorindex++]['password'] = "Password should be at least 8 characters.";
			//echo "password should be at least 8 characters. <br\>";
		}
	}
	else
	{
		$Flag = false;
		$error[$errorindex++]['password'] = "password data is empty.";
		echo "password data is empty. <br\>";
	}	
	return $Flag;
}	
	

function ValidateEmail( $AnEmail )
{
	global $error, $errorindex;
	
	$Flag = true;
	
	//$AnEmail = $data['email'];
	
	if( strlen($AnEmail) > 0 )
	{
		if( !filter_var($AnEmail, FILTER_VALIDATE_EMAIL ))
		{
			$Flag = false;
			$error[$errorindex]['email'] = "email is invalid ";
			//echo "email is invalid <br\>";
		}
	}
	else
	{
		$Flag = false;
		$error[$errorindex]['email'] = "email is empty ";
		//echo "email data is empty. <br\>";
	}	
	return $Flag;
}
/*******
function ValidateData( $key, $value )
{
	global $rules, $error;
	
	if( $key == 'email' )
	{
		$EmailStatus =  true;
		$rule = $rules['email'];
		if ( strstr( $rule, "required" ) )
		{
			$EmailStatus = ValidateEmail();
		}
		else
		{
			$error[$errorindex]['email'][] = "Email data is not necessary.";
		}
	}	
	elseif( $key == 'password' )
	{
		$PasswordStatus =  true;
		$rule = $rules['password'];
		if ( strstr( $rule, "required" ) )
		{
			$PasswordStatus = ValidatePassword();
		}
		else
		{
			$error['password'][] = "Password data is not necessary.";
		}
	
	if( $EmailStatus == true && $PasswordStatus  == true )
		return true;
	else	
		return false;
}
********/
?>