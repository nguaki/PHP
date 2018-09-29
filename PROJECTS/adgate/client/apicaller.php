<?php
class ApiCaller
{
    //some variables for the object
    private $_app_id;
    private $_app_key;
    private $_api_url;
     
    //construct an ApiCaller object, taking an
    //APP ID, APP KEY and API URL parameter
    public function __construct($app_id, $app_key, $api_url)
    {
        $this->_app_id = $app_id;
        $this->_app_key = $app_key;
        $this->_api_url = $api_url;
    }
     
    //send the request to the API server
    //also encrypts the request, then checks
    //if the results are valid
    public function sendRequest($request_params)
    {
        //encrypt the request parameters
        //Note that json_encode() returns a string.
        //Note that base64_encode() returns a string.
        $enc_request = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->_app_key, json_encode($request_params), MCRYPT_MODE_ECB));
         
        //create the params array, which will
        //be the POST parameters
        $params = array();
        $params['enc_request'] = $enc_request;
        $params['app_id'] = $this->_app_id;
		
        var_dump($params);
		//initialize and setup the curl handler
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->_api_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       
        //execute the request
        //Note that $result will be a JSON string.
        $result = curl_exec($ch);
         
        //
        //echo 'result=' . $result;
        //Note that $result is now an object of STDCLASS.
        $result = json_decode($result);
				
        //check if we're able to json_decode the result correctly
		if( $result == false || isset($result->success) == false ) {
            throw new Exception('Request was not correct');
        }
         
        //if there was an error in the request, throw an exception
        if( isset($result->success) == false ) {
            throw new Exception($result->errormsg);
        }
         
        if( isset($result->errormsg) && $result->errormsg){
             $_SESSION['error'] = $result->errormsg;
        } else {
            $_SESSION['error'] = NULL;
        }
        
        return $result->data;
        
        /*****
        //if everything went great, return the data
        if ( isset($result->data) && $result->data ) {
            $_SESSION['error'] = NULL;
            error_log("success return from server");
            error_log("data:" . $result->data);
            return $result->data;
        } else {
            error_log("no data");
            $_SESSION['error'] = $result->errormsg;
            return false;
        }
        ****/
        
    }
}