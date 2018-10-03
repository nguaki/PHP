<?php
/*
Here the var_dump() and print_r().
The difference between (object) typecast and no (object) typecast.
(object) has type of stdClass
(non-object) has type of string(2).  2 probably implies to 2 associative array pairing.

(object)public is declared for key .
(non-object)No public declaration for key.

Also note that var_dump() gives more info that print_r().

object form
var_dump() ==> /home/ubuntu/workspace/PHP_Study/OOP/PHP OOP/Interface/JsonRepository.php:17: class stdClass#3 (2) { public $title => string(16) "A Very Good Book" public $body => string(8) "Jane Doe" } 
print_r()  ==> stdClass Object ( [title] => A Very Good Book [body] => Jane Doe ) 
non-object form
/home/ubuntu/workspace/PHP_Study/OOP/PHP OOP/Interface/JsonRepository.php:23: array(2) { 'title' => string(16) "A Very Good Book" 'body' => string(8) "Jane Doe" } 
Array ( [title] => A Very Good Book [body] => Jane Doe ) 
object form
/home/ubuntu/workspace/PHP_Study/OOP/PHP OOP/Interface/JsonRepository.php:17: class stdClass#4 (2) { public $title => string(16) "An Academic Book" public $body => string(9) "Ann Smith" } 
stdClass Object ( [title] => An Academic Book [body] => Ann Smith ) 
non-object form
/home/ubuntu/workspace/PHP_Study/OOP/PHP OOP/Interface/JsonRepository.php:23: array(2) { 'title' => string(16) "An Academic Book" 'body' => string(9) "Ann Smith" } 
Array ( [title] => An Academic Book [body] => Ann Smith ) 
object form
/home/ubuntu/workspace/PHP_Study/OOP/PHP OOP/Interface/JsonRepository.php:17: class stdClass#5 (2) { public $title => string(18) "Some Fluff Fiction" public $body => string(11) "Jimbo Jones" } 
stdClass Object ( [title] => Some Fluff Fiction [body] => Jimbo Jones ) 
non-object form
/home/ubuntu/workspace/PHP_Study/OOP/PHP OOP/Interface/JsonRepository.php:23: array(2) { 'title' => string(18) "Some Fluff Fiction" 'body' => string(11) "Jimbo Jones" } 
Array ( [title] => Some Fluff Fiction [body] => Jimbo Jones ) 
*/
	include_once 'RepositoryInterface.php';
	//use stdClass;
	
	class JsonRepository implements RepositoryInterface
	{
		protected $posts = array();
		
		public function __construct()
		{
			$posts = json_decode( file_get_contents( dirname(__FILE__) . '/books.json'), true );
			foreach( $posts as $key => $post )
			{
				$this->posts[$key] = (object)$post;
				
				echo 'object form<br>';
				var_dump((object)$post);
				echo '<br>';
				print_r((object)$post);
				echo '<br>';
				
				echo 'non-object form<br>';
				var_dump($post);
				echo '<br>';
				print_r($post);
				echo '<br>';
				#$key is numeric 1,2,3
				#echo "JSON" . $key . '<br>';
			}
		}
		
		public function All()
		{
			return $this->posts;
		}
		
		public function Find($id)
		{
			# This below line is actually a compact code.
			# It's really ( In pseudocode, if $this->posts[$id] exists then return this else return array() ).
			# 
			//return isset($this->posts[$id]) ? $this->posts[$id] : array();
			//return isset($this->posts[$id]) ? $this->posts[$id] : new stdClass;
			return isset($this->posts[$id]) ? $this->posts[$id] : "Not found";  // not sure what new stdClass is doing here.
		}
	}
?>