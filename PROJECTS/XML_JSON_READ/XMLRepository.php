<?php
/*
Notice that $key starts with zero/
How did that happend? Since there is no key value with XML.
$key = 0
before decode $post = 
/home/ubuntu/workspace/PHP_Study/OOP/PHP OOP/Interface/XMLRepository.php:27: class SimpleXMLElement#7 (2) { public $title => string(10) "How to PHP" public $body => string(9) "James Che" } 
after decode:$post = 
/home/ubuntu/workspace/PHP_Study/OOP/PHP OOP/Interface/XMLRepository.php:34: class stdClass#10 (2) { public $title => string(10) "How to PHP" public $body => string(9) "James Che" } 
$key = 1
before decode $post = 
/home/ubuntu/workspace/PHP_Study/OOP/PHP OOP/Interface/XMLRepository.php:27: class SimpleXMLElement#8 (2) { public $title => string(5) "Bible" public $body => string(11) "Holy Spirit" } 
after decode:$post = 
/home/ubuntu/workspace/PHP_Study/OOP/PHP OOP/Interface/XMLRepository.php:34: class stdClass#11 (2) { public $title => string(5) "Bible" public $body => string(11) "Holy Spirit" } 
$key = 2
before decode $post = 
/home/ubuntu/workspace/PHP_Study/OOP/PHP OOP/Interface/XMLRepository.php:27: class SimpleXMLElement#9 (2) { public $title => string(22) "How to play basketball" public $body => string(14) "By Matthew Che" } 
after decode:$post = 
/home/ubuntu/workspace/PHP_Study/OOP/PHP OOP/Interface/XMLRepository.php:34: class stdClass#12 (2) { public $title => string(22) "How to play basketball" public $body => string(14) "By Matthew Che" } 
*/
	include_once 'RepositoryInterface.php';
	//use stdClass;   // From stackflow.com,  it is an empty class, not a base class.
					// Accordingly, there is no case of base class in PHP.
					// There is an warning message: No effect to this file.
					// Very vague message.
	
	class XMLRepository implements RepositoryInterface
	{
		private $posts = array();
		
		//Opens a XML file.
		//Assigns values to $posts variable. 
		public function __construct()
		{
			$xml = simplexml_load_file( dirname(__FILE__) . '/books.xml');
			
			// Locates <channel>
			//                  <item>
			$posts = $xml->xpath('channel/item');  
			//var_dump ( $posts );
			
			foreach( $posts as $key => $post )
			{
				echo "\$key = $key" . "<br/>";	// Prints out a number
				echo "before decode \$post = " . "<br/>";   // Prints out empty lines.  why?
				var_dump( $post );  // $post is an object.
			    echo '<br/>';
			    
				// json_encode() converts an array in JSON format.
				// json_decode() converts JSON format into a PHP std object.
				
				//There is no real need to encode and decode.
				//$post = json_decode(json_encode($post));
				
				echo "after decode:\$post = " . "<br/>";   // Prints out empty lines.  why?
				var_dump( $post );  // $post is an object.
			    echo '<br/>';

				//$post->body = $post->description;
				//var_dump( $post );  // $post is an object.
				//echo "after reassignment:\$post = " . "<br/>";   // Prints out empty lines.  why?
				//var_dump( $post );  // $post is an object.
				//unset($post->description);        // destroys this variable. Why destroy? there is no need
				                                  // for description.  It is captured.
				$this->posts[$key+1] = $post;  // I don't see any numbers in the file.  
				
				//(object) typecast is not needed.
				//$this->posts[$key+1] = (object)$post;  // I don't see any numbers in the file.  
								// Where did this number come from?  The key is automatic index generator.
								// Why +1?   I guess the xml counter starts with 1, not zero.
			}
		}
		
		public function All()
		{
			//var_dump( $this );
			return $this->posts;
		}
		
		public function Find($id)
		{
			# This below line is actually a compact code.
			# It's really ( In pseudocode, if $this->posts[$id] exists then return this else return array() ).
			# 
			//return isset($this->posts[$id]) ? $this->posts[$id] : new stdClass;  // not sure what new stdClass is doing here.
			return isset($this->posts[$id]) ? $this->posts[$id] : "no found";  // not sure what new stdClass is doing here.
		}
	}
?>