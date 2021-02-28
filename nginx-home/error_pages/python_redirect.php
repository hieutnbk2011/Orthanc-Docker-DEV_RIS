<?php

class Redirect {

    public $OrthancServerStatus;
    private $data;
    private static $Authorization = 'Bearer CURLTOKEN';
    private static $Token = 'wxwzisme';
    private $CheckOrigin = true;
    private static $Origin = 'https://myris.medical.ky';
    private $OrthancURL;
    private $curlerror;
    private $curl_error_text;
    private $result;
    private $userprofileJWT;

    public function __construct() {
        $this->data = new stdClass();
    	$this->data->body = json_decode(file_get_contents('php://input'));
    	$this->data->headers = getallheaders();
    	
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
	
	public function getData() {
	
	    return $this->data;
	
	}
}
$me = new Redirect();
?>

<!DOCTYPE html>
<html>
<head>
<title>Orthanc API Call Redirect Demo</title>
<style>
    body {
    width: 100%;
    margin: 0 auto;
    font-family: Tahoma, Verdana, Arial, sans-serif;
    background: black;
    color: white;
    text-align: left;
    }
    h1 {
        text-align:center;
    }
</style>
</head>
<body>
<h1>Orthanc API Call Redirect Demo</h1>
<pre>
<?php echo json_encode($me->getData(), JSON_PRETTY_PRINT); ?>
</pre>
</body>
</html>
