<?php
/**
 * Class DatabaseFactory
 *
 * Use it like this:
 * $database = DatabaseFactory::getFactory()->getConnection();
 *
 * That's my personal favourite when creating a database connection.
 * It's a slightly modified version of Jon Raphaelson's excellent answer on StackOverflow:
 * http://stackoverflow.com/questions/130878/global-or-singleton-for-database-connection
 *
 * Full quote from the answer:
 *
 * "Then, in 6 months when your app is super famous and getting dugg and slashdotted and you decide you need more than
 * a single connection, all you have to do is implement some pooling in the getConnection() method. Or if you decide
 * that you want a wrapper that implements SQL logging, you can pass a PDO subclass. Or if you decide you want a new
 * connection on every invocation, you can do do that. It's flexible, instead of rigid."
 *
 * Thanks! Big up, mate!
 */

class DatabaseFactory
{
    private static $factory;
    private $database;
    private static $conn;
    private static $debug = true;
    
    public function __construct()
    
    {

    }

    public static function getFactory()
    {
        if (!self::$factory) {
            self::$factory = new DatabaseFactory();
            self::$conn = self::$factory->getConnection();
        }
        return self::$factory;
    }
    
    private static function Configs($name) {
    
    $values = array (  
    
    	'DB_TYPE' => 'mysql',
    	'DB_HOST' => 'mysql_db',
    	'DB_NAME' => "laravel",
    	'DB_PORT' => '3306',
    	'DB_CHARSET' => 'utf8',
    	'DB_USER' => "root",
    	'DB_PASS' => "root",

    
    );
    return $values[$name];
    
    }

    public function getConnection() {

        if (!$this->database) {

            /**
             * Check DB connection in try/catch block. Also when PDO is not constructed properly,
             * prevent to exposing database host, username and password in plain text as:
             * PDO->__construct('mysql:host=127....', 'root', '12345678', Array)
             * by throwing custom error message    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
             */
            try {
                $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::ATTR_EMULATE_PREPARES => true );  // true doesn't check the prepare statements first
                $this->database = new PDO(
                   self::Configs('DB_TYPE') . ':host=' . self::Configs('DB_HOST') . ';dbname=' .
                   self::Configs('DB_NAME') . ';port=' . self::Configs('DB_PORT') . ';charset=' . self::Configs('DB_CHARSET'),
                   self::Configs('DB_USER'), self::Configs('DB_PASS'), $options
                   );
            } catch (PDOException $e) {

                // Echo custom message. Echo error code gives you some info.
                self::logVariable('Database connection can not be estabilished. Please try again later.');
                echo 'Database connection can not be estabilished. Please try again later.' . '<br>';
                echo 'Error code: ' . var_dump( $e);

                // Stop application :(
                // No connection, reached limit connections etc. so no point to keep it running
                exit;
            }
        }
        return $this->database;
    }

    public static function checkErrors($query, $parameters)  {

        $stmt = self::getFactory()->getConnection()->prepare($query) or die ('["status":{"error":"Prepare Statement Failure","query":"' .$query . '"}]');
        $stmt->execute($parameters) or die('[{"error":"' . $stmt->errorInfo()[2]  . '","query":"' .$query . '","params":' .json_encode($parameters) . '}]');
        return $stmt;

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
		if (self::$debug) error_log($output);
	
	}
    public static function deletetablerowbyKeyValue($table, $key, $value) {

        $query = 'DELETE FROM ' . $table . ' WHERE ' . $key . ' = ?';
        $parameters = [$value];
        $stmt = self::checkErrors($query, $parameters);
        return $stmt->rowCount();
    }

    public static function insertarray($table, $array, $omitarray = null){  // passing in the object or array, table and items to omit,  adding new patient / row in database
		if (gettype($array) != "array") $array = (array)$array;
        $parameters = [];
        foreach($array as $k => $v){
        if  ($omitarray == null || !in_array($k, $omitarray)) {
          $col[] = $k;
          $parameters[] = $v;
          $val[] ="?";
          }
        }
        $query = ('INSERT INTO '. $table.' ('.implode(', ', $col).') VALUES ('.implode(', ', $val).')' );
        $stmt = self::checkErrors($query, $parameters);
        self::logVariable($query);
        return self::$conn->lastInsertId();  // returns the last auto_increment value

        }

    public static function update ($table, $array, $omitarray = null, $WHERE, $WHEREparams)  {

        if (gettype ($array) == "object" ) $array = (array)$array;

        $parameters = [];
        foreach($array as $k => $v){  //iterates through the object name values, skip the MRN so it is never overwritten
        if  ($omitarray == null || !in_array($k, $omitarray)) {
          $parameters [] = $v;
          $fields[] = "" . $k . " = " . "?";
          }
        }
        foreach ($WHEREparams as $param) {
        	$parameters[] = $param;
        }
        $query = 'UPDATE '. $table .' SET '.implode(', ', $fields) . ' ' . $WHERE;
        return self::checkErrors($query, $parameters)->rowCount();

    }


    public static function selectByQuery($query, $parameters) {

        $stmt = self::checkErrors($query, $parameters);
        return $stmt;  // full result as associative array.
    }
    
    public static function postCURL($url, $data) {
    
    	$data = $data + array ("login" => "apiuser", "pass" => "apiuserpass");
		$data_json = json_encode($data);
		$ch = curl_init();
		$headers = array();
		//$headers[] = 'Authorization: Bearer ' . $data['token'];
		$headers[] = 'Content-Type: application/json';
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response  = curl_exec($ch);
		if (curl_errno($ch)) {
		  self::logVariable('Error:' . curl_error($ch));
		}
		curl_close($ch);
		return $response;	
    }

}
?>