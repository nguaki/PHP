<?php
    //calculate API call interval in milli sec since that is the 
    //javascript setinterval() time unit.
    
	class APICallInterval{
	
		public static function getInMillisec(){
			$unit_time = Config::get('weather/unit_time');
			$refresh_rate = Config::get('weather/refresh_rate');
			
			switch($unit_time)
			{
	 		   case 'min':
   		    	        $total_milli_sec = $refresh_rate * 60000;  
	   		         break;
	    		case 'sec': 
      		 	        $total_milli_sec = $refresh_rate * 1000;  
	      		      break;
	    		default:
	     		       //set to 1 minute default.
       			        $total_milli_sec =  60000;  
			} 
			return $total_milli_sec;
		}
	}	
		
?>