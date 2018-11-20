<?php namespace acme3;

//since the source code and this test script has the same 
//namespace, this function will be called from the source.
//This is called stub.
function time()
{
	return 'stub';
}

//Note that backslash is needed other wise php will look for
//acme\PHPUnit_Framework_TestCase.
class System3Test extends \PHPUnit_Framework_TestCase{

	public function test_if_stubs_works(){
	
		$this->assertEquals( 'stub', (new System3)->go() );
	}
}
?>