Oct 15, 2018

2 critical files for this to run: composer.json and phpunit.xml

(1)composer.json main responsibility is autoloading classes.
My guess is that is has somewhere in the script spl_autoload_register(PATH) where
PATH is indicated by the APP key.

After creating composer.json, this command was executed.

composer dump-autoload -o
	
(2)phpunit.xml configuration tells about coloration, verbosity. 
All tests must have test file name convention of xxxTest.php.
It also tells where the test files are located.

#File structure is very critical.
      /vendor/composer
      
(3)All test functions must start with the word "test_" otherwise, the test functions will
   be ignored.
