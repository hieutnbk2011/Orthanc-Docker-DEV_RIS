<?php
ini_set("error_log", realpath(dirname(__FILE__)) . "/admincurl.log");
include (realpath(dirname(__FILE__)) . "/classes/DatabaseFactory.php");

Class NGINXAdmin {

    public $OrthancServerStatus;
    public $data;
    private $Authorization = 'Bearer CURLTOKEN';
    private $Token = 'wxwzisme';
    private $CheckOrigin = true;
    private $Origin = 'https://myris.medical.ky';

    public function __construct() {
    
    	$this->data = json_decode(file_get_contents('php://input'));
    	
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
switch ($me->data->method) {

case "ServerStatus":
	echo json_encode($me->check_if_process_is_running($me->data->Process));
	break;
case "StopServer":
	$results = [];
	$pids = $me->check_if_process_is_running($me->data->Process);
	foreach ($pids as $pid) {
		$results[] = json_encode($me->executeScript("kill -15 " . $pid));
	}
	echo json_encode($results);
	break;
case "StartServer":
	echo json_encode($me->LaunchBackgroundProcess("/Users/sscotti/Desktop/orthancAndPluginsOSX.stable/startOrthanc.command"));
	break;
case "PHPINFO":
	echo '<h3>NGINX SERVER INFO for ADMIN</h3>';
	phpinfo();
	break;

default:
//code to be executed if n is different from all labels;
	break;
}
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