<?php

// https://book.orthanc-server.com/users/rest-cheatsheet.html?highlight=shutdown%20rest%20api
ini_set("error_log", realpath(dirname(__FILE__)) . "/admincurl.log");
include (realpath(dirname(__FILE__)) . "/classes/DatabaseFactory.php");

Class NGINXAdmin {

    public $OrthancServerStatus;
    public $data;
    private static $Authorization = 'Bearer CURLTOKEN';
    private static $Token = 'wxwzisme';
    private $CheckOrigin = true;
    private static $Origin = 'https://myris.medical.ky';
    private $OrthancURL;
    private $curlerror;
    private $curl_error_text;
    private $result;
    private  $userprofileJWT;

    public function __construct() {
    
    	$this->data = json_decode(file_get_contents('php://input'));
    	$this->OrthancURL = $this->data->api_url;
    	
    }
    
    private function processCURLResults(&$ch) {

		$this->result = curl_exec($ch);
		$this->responsecode =  curl_getinfo($ch,CURLINFO_HTTP_CODE);
		if (curl_errno($ch) || curl_getinfo($ch,CURLINFO_HTTP_CODE) != "200") {
			$this->curlerror = true;
			$this->curl_error_text = "Status:  " . curl_getinfo($ch,CURLINFO_HTTP_CODE) . ', Error: ' . curl_error($ch);
			curl_close($ch);
			return $this->result;
		}
		else {

			$this->curlerror = false;
			$this->curl_error_text = "No Errors";
			curl_close($ch);
			return $this->result;
		}

	}
    
    public function executeCURL($CURLOPT_URL) {

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->OrthancURL . $CURLOPT_URL);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch,CURLOPT_ENCODING , "gzip");
		DatabaseFactory::logVariable("executeCURL:  " . $this->OrthancURL . $CURLOPT_URL);
		$headers = array();
		//$headers[] = 'Content-Type: application/x-www-form-urlencoded';
		$headers[] = 'Authorization:' . self::$Authorization;
		$headers[] = 'Token:' . self::$Token;
		$headers[] = 'Origin:' . self::$Origin;
		//$headers[] = 'Accept-Encoding:gzip';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		return $this->processCURLResults($ch);

	}
	
	public function executeCURLPOST($url) {

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->OrthancURL . $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		// curl_setopt($ch, CURLOPT_POSTFIELDS, $JSONQuery);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		//curl_setopt($ch,CURLOPT_ENCODING , "gzip");
		//Debugbar::error("OrthancModel->executeCURLPOSTJSON:  " . $this->OrthancURL . $url);
		//Debugbar::error("OrthancModel->executeCURLPOSTJSON_Args:  " . $JSONQuery);
		$headers = array();
		$headers[] = 'Authorization:' . self::$Authorization;
		$headers[] = 'Token:' . self::$Token;
		$headers[] = 'Origin:' . self::$Origin;
		//$headers[] = 'userprofileJWT:' . json_encode(self::$userprofileJWT);
		//$headers[] = 'Accept-Encoding:gzip';
		// $headers[] = 'Content-Type: application/json';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		return $this->processCURLResults($ch);
	}
    
	private function getallheaders() {
	
		$headers = [];
		foreach ($_SERVER as $name => $value) {
			if (substr($name, 0, 5) == 'HTTP_') {
				$headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
			}
		}
		return $headers;
	}
    
    public function check_if_process_is_running($process) {
    
    	// /usr/local/bin/pidof for OS X
    	exec("/usr/local/bin/pidof  " . $process,$response);
		if ($response) {
			 return $response;
		}
		else {
			 return "NOTRUNNING";
		}
	}
	
	public function executeScript($script) {
	
	    exec($script,$response);
		if ($response) {
			 return $response;
		}
		else {
			 return "NO RESULT";
		}
	
	}
	
	public function LaunchBackgroundProcess($command){
	
		// Run command Asynchroniously (in a separate thread)
		if(PHP_OS=='WINNT' || PHP_OS=='WIN32' || PHP_OS=='Windows'){
		// Windows
		$command = 'start "" '. $command;
		} 
		else {
		// Linux/UNIX
		$command = $command .' /dev/null &';
		}
		$handle = popen($command, 'r');
		if($handle!==false){
		pclose($handle);
		return "TRUE";
		} 
		else {
		return "FALSE";
		}
	}
	
	public function isAuthorized() {
	    return true;
		$headers = $this->getallheaders();
		DatabaseFactory::logVariable($headers);
		return (isset($headers['Authorization']) && $headers['Authorization'] == $this->Authorization && isset($headers['Token'])  && $headers['Token'] == $this->Token && ($this->CheckOrigin == false || (isset($headers['Origin']) && $headers['Origin'] == $this->Origin)));
		
	}
}

$me = new NGINXAdmin();

if ($me->isAuthorized()) {

    DatabaseFactory::logVariable($me->data);
    // $me-data->api_url;
    $results = new stdClass();
    switch ($me->data->method) {

        case "StopServer":

                $me->executeCURLPOST("tools/shutdown");
                $results->status = "Shutdown Signal Sent";
//             $results = [];
//             $pids = $me->check_if_process_is_running($me->data->Process);
//             foreach ($pids as $pid) {
//                 $results[] = json_encode($me->executeScript("kill -15 " . $pid));
//             }
//             echo json_encode($results);
            break;
        case "StartServer":
//             echo json_encode($me->LaunchBackgroundProcess("/Users/sscotti/Desktop/orthancAndPluginsOSX.stable/startOrthanc.command"));

            break;
        case "PHPINFO":
            echo '<h3>NGINX SERVER INFO for ADMIN</h3>';
            phpinfo();
            break;

        default:
        //code to be executed if n is different from all labels;
            break;
    }
    echo json_encode($results);
}
else {
header("HTTP/1.1 401 Unauthorized");
header('Location:  /errors/401.html');
exit();
}

/*
[01-Sep-2020 18:01:40 UTC] {
    "Content-Type": "application\/x-www-form-urlencoded",
    "Content-Length": "15",
    "Command": "ServerStatus",
    "Origin": "https:\/\/www.sias.dev",
    "Token": "wxwzisme",
    "Authorization": "Bearer CURLTOKEN",
    "Accept": "*\/*",
    "Host": "sias.dev:8000"
}
[01-Sep-2020 18:01:40 UTC] {
    "test": "test"
}
*/
?>