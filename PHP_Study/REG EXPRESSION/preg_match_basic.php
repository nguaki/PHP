<?php
if( preg_match("/PHP/", "PHP") )      # Match for an unbound literal
{
	echo "Match";   #  <====
}
else
{
	echo "No Match";
}

echo "<br>";

if( preg_match("/^PHP/", "PHP") )      # Match literal at start of string
{
	echo "Match";  #  <====
}
else
{
	echo "No Match";
}

echo "<br>";

if( preg_match("/^PHP/", "aaaPHP") )      # Match literal at start of string
{
	echo "Match";
}
else
{
	echo "No Match";     #  <====   The string doesn't start with PHP.
}
echo "<br>";

if( preg_match("/PHP$/", "PHPaaa") )     # Match literal at end of string
{
	echo "Match";
}
else
{
	echo "No Match";     #  <====   The string doesn't start with PHP.
}
echo "<br>";

if( preg_match("/^PHP$/", "aPHPb") )     # Match for exact string content
{
	echo "Match";
}
else
{
	echo "No Match";     #  <====   The string doesn't start with PHP  nor end with PHP.
}
echo "<br>";

if( preg_match("/^$/", ""))
{
	echo "Match";
}
else
{
	echo "No Match";     
}
    
?>