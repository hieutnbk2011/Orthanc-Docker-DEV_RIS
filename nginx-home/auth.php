<?php
ini_set("error_log", realpath(dirname(__FILE__)) . "/auth.log");
include  "classes/DatabaseFactory.php";
DatabaseFactory::logVariable("Hit The auth.php page");

class ProxyController

{
    /**
     * Construct this object by extending the basic Controller class
     */
    private static $debug = true; 
    private static $throwerror = false;
    private static $passthrough = true;
    public function __construct()
    {

    }
    
    public static function logVariable($var) {

		if (gettype($var) == "array" || gettype($var) == "object") {
			ob_start();
			echo json_encode($var, JSON_PRETTY_PRINT);
			$output = ob_get_clean();
			
		}
		else {
		$output = $var;
		}
		$output = json_encode(array("NGINX_AUTH" => $var), JSON_PRETTY_PRINT);
		if (self::$debug) error_log($output);
	
	}


/*

    "NGINX_AUTH": {
        "USER": "www-data",
        "HOME": "\/var\/www",
        "HTTP_CONTENT_TYPE": "application\/x-www-form-urlencoded",
        "HTTP_ACCEPT_ENCODING": "gzip",
        "HTTP_ORIGIN": "https:\/\/local.medical.ky",
        "HTTP_TOKEN": "wxwzisme",
        "HTTP_AUTHORIZATION": "Bearer CURLTOKEN",
        "HTTP_ACCEPT": "*\/*",
        "HTTP_CONNECTION": "close",
        "HTTP_HOST": "devpacs.medical.ky:8000",
        "HTTP_ORIG_IP": "66.253.168.233",
        "HTTP_X_ORIGINAL_URI": "\/api\/studies\/page",
        "REDIRECT_STATUS": "200",
        "SERVER_NAME": "",
        "SERVER_PORT": "8000",
        "SERVER_ADDR": "199.192.30.238",
        "REMOTE_PORT": "37202",
        "REMOTE_ADDR": "199.192.30.238",
        "SERVER_SOFTWARE": "nginx\/1.18.0",
        "GATEWAY_INTERFACE": "CGI\/1.1",
        "HTTPS": "on",
        "REQUEST_SCHEME": "https",
        "SERVER_PROTOCOL": "HTTP\/1.0",
        "DOCUMENT_ROOT": "\/home\/sscotti\/AUTH\/auth",
        "DOCUMENT_" while reading response header from upstream, client: 199.192.30.238, server: , request: "GET /aut
2020/12/06 18:49:13 [error] 70651#70651: *13350 connect() failed (111: Connection refused) while connecting to upstream, client: 66.253.168.233, server: , request: "POST /api/studies/page HTTP/1.1", upstream: "http://[::1]:8042/studies/page", host: "devpacs.medical.ky:8000"

*/

    public static function auth()

    {
		self::logVariable($_SERVER);
		
		if (self::$passthrough == true) {
			header("HTTP/1.1 200 OK");
			exit();
		}
		if (self::$throwerror == true) {
			header("HTTP/1.1 401 Unauthorized");
			exit();
		}

		else if (($_SERVER['HTTP_AUTHORIZATION'] == "Bearer AJAXDEV" || $_SERVER['HTTP_AUTHORIZATION'] == "Bearer CURLTOKEN") && $_SERVER['HTTP_TOKEN'] == 'wxwzisme') {
		
			self::logVariable("Passed Auth Headers");
			header("HTTP/1.1 200 OK");
			self::logVariable('SUCCESS!: APIurl/CURL');
		}
		else {
		
			header("HTTP/1.1 401 Unauthorized");

		}

    }
    
}
ProxyController::auth();
?>
