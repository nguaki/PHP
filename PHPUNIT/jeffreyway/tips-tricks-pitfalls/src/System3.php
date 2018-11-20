<?php namespace acme3;
//Oct 23, 2018
//Scenario: time() is a system function.
//          This file has a namespace acme.
//          
//          From outside, if it calls (acme/System1)->go();
//          since time() function exists in this namespace,
//          the local time() function has the precedence over
//          global time().
//
//          Not sure how this would test a system function.

class System3{

	public function go(){
		return time();
	}
}

?>