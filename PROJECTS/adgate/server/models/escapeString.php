<?php
class escapeString{
	private $mysqli;
	private $arrayString;
	private $escapeStrings;

	function __construct($mysqli, $arrayString) {
		$this->mysqli = $mysqli;
		$this->arrayString = $arrayString;
		for( $i=0; $i<count($this->arrayString); $i++ ) {
			$this->escapeStrings[$i] = $this->mysqli->real_escape_string($this->arrayString[$i]);	
		}
	}

	function getEscapedStrings(){
		return $this->escapeStrings;
	}
}




?>