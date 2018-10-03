<?php
$string = "find me*";

/*The below statement spits out an warning message. */
/*OUTPUT
Warning: preg_match(): Compilation failed: nothing to repeat at offset 0 in C:\xampp\htdocs\xampp\my_exercises\regular expressions\meta_characters.php on line 4

WRONG ANSWER
not Found */
if( preg_match( '/*/', $string ))
{
	echo "Found";
}
else
{
	echo "not Found";

}
/*
OUTPUT
Found
*/
if( preg_match( '/\*/', $string ))  //Must escape the star character since it is one of 19 meta characters.
	echo "Found";
}
else
{
	echo "not Found";
}
?>