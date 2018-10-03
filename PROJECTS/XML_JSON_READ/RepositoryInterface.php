<?php
########
#November 14, 2014
#The class becomes interface when all the methods are pure virtual.
#Pure virtual methods do not carry any bodies.  It only has heading.
#The purpose of skeleton class is to create a situation where 
#the "decoupling of classed from code" can be possible.
#E.g. is reading Json file vs. XML file.
#The code simply can switch reading of these two files via
#changing the interface name.
########
interface RepositoryInterface
{
	#
	# Return all posts as an array of all objects.
	#
	public function All();
	
	#
	# Return a single post
	#
	public function Find($id);

}
?>