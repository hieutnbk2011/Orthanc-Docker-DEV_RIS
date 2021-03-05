<?php
ini_set("error_log", realpath(dirname(__FILE__)) . "/auth.log");

// namespace App\Models;
use ReallySimpleJWT\Build;
use ReallySimpleJWT\Secret;
use ReallySimpleJWT\Helper\Validator;
use ReallySimpleJWT\Encoders\EncodeHS256;
use ReallySimpleJWT\Token;
use ReallySimpleJWT\Parse;
use ReallySimpleJWT\Jwt;
use ReallySimpleJWT\Decode;

//use ReallySimpleJWT;

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__.'/vendor/autoload.php';


class AuthServer  {  // extends Something

    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    
    {
        

    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var string$secret = 'Hello&MikeFooBar123';
     */
    private static $debug = true;
    public static $samplesecret = "Hello&MikeFooBar123";
    public static $sampletoken = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJPcnRoYW5jIFBBQ1MiLCJzdWIiOiJWaWV3ZXIgVG9rZW4iLCJpYXQiOjE2MTQ3OTY1NDAsInVpZCI6MSwiZXhwIjoxNjE0Nzk2ODQwLCJkYXRhIjoidGVzdCJ9.27Y6A-Ka6jdpt1zU14LTF284klVMz_FEfF_SUnvTuD0";
    protected static $secret = "Hello&MikeFooBar123";
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected static $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public static function logVariable($var) {
	
		if (gettype($var) == "array" || gettype($var) == "object") {
		
			ob_start();
			echo json_encode($var, JSON_PRETTY_PRINT);
			$output = ob_get_clean();
			
		}
		else {
		$output = $var;
		}
		if (self::$debug) error_log($output);
	
	}
    
    public static function ValidateTokenString($token) {
    
        $jwt = new Jwt($token, self::$secret);
        error_log("Valid:  " . (Token::validate($token, self::$secret))?"Valid":"Not Valid");
    
    }
    
    public static function get_ObjectFromString($JWTString) {
    
        return new Jwt($JWTString, self::$secret);
    
    }
    
    public static function ParseTokenObject($jwt) {
    
    	$parse = new Parse($jwt, new Decode());
		$parsed = $parse->parse();
		self::logVariable($parsed->getHeader());
		self::logVariable($parsed->getPayload());
    
    }
    
    public static function Set_JWT_SITE_COOKIE($user_id, $user_name) {
    
		$myip = $_SERVER['REMOTE_ADDR']; // https://stackoverflow.com/questions/3003145/how-to-get-the-client-ip-address-in-php
		$data = array("user_id" => $user_id, "user_name" => $user_name, "mrn" => "mrn",  "orthanc_uuid" => "orthanc_uuid", "StudyInstanceUID" => "StudyInstanceUID", "IPaddress" => $myip);
		$payload = [
		
		'iss' => 'Orthanc PACS',
		'sub' => 'Viewer Token',
		'iat' => time(),
		'uid' => 1,
		'exp' => time() + 60 * 5,
		'data' => $data
		
		];
		
        return Token::customPayload($payload, $secret);
    }
    
    public static function Set_JWT_VIEWER_COOKIE($user_id, $user_name) {
    
		$myip = $_SERVER['REMOTE_ADDR']; // https://stackoverflow.com/questions/3003145/how-to-get-the-client-ip-address-in-php
		$data = array("user_id" => $user_id, "user_name" => $user_name, "mrn" => "mrn",  "orthanc_uuid" => "orthanc_uuid", "StudyInstanceUID" => "StudyInstanceUID", "IPaddress" => $myip);
		$payload = [
		
		'iss' => 'Orthanc PACS',
		'sub' => 'Viewer Token',
		'iat' => time(),
		'uid' => 1,
		'exp' => time() + 60 * 5,
		'data' => $data
		
		];
        return Token::customPayload($payload, $secret);
    
    }
    
    public static function TestValid() {
    
        self::logVariable(self::ValidateTokenString(self::$sampletoken));
    
    }

}
// AuthServer::logVariable($_REQUEST);
//header('HTTP/1.1 401 Unauthorized'); 



$valid = AuthServer::ValidateTokenString(AuthServer::$sampletoken);
$object = AuthServer::get_ObjectFromString(AuthServer::$sampletoken);
$parsed = AuthServer::ParseTokenObject($object);
AuthServer::logVariable($valid);
AuthServer::logVariable($parsed);
header("HTTP/1.1 200 OK");

?>
