<?php

//Obtain temperature in Fah or Cel.
class Weather
{
    private $_Fah,
            $_Cel,
            $_Kel,
            $_json,
            $_data;
            
            
    public function __construct($url){
            
            $this->_json = file_get_contents($url);
            
            $this->_data=json_decode($this->_json,true);
            
            $this->_Kel=$this->_data['main']['temp'];
            
            $this->_Cel=$this->_Kel-273.15;
            
            //Get current Temperature in Fahrenhite
            $this->_Fah=((($this->_Kel*9)/5)-459.67);
    }
    
    public function getFahrenheit(){
        return $this->_Fah; 
    }
    
    //Get current Temperature in Celsius
    public function getCel() {
        return $this->_Cel;
    }
};