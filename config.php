<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'postgres');
// define('DB_PASSWORD', 'qweasdzxc');
// define('DB_NAME', 'test');
// define('P_PORT', '5432');
 
// // /* Attempt to connect to MySQL database */


 
// /* Attempt to connect to MySQL database */
// try{
//     $pdo = new PDO("pgsql:host=" . DB_SERVER . ";port=" . P_PORT . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
//     // Set the PDO error mode to exception
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch(PDOException $e){
//     die("ERROR: Could not connect. " . $e->getMessage());
// }


// class DB {

//     protected static $instance;

//     protected function __construct() {}

//     public static function getInstance() {

//         if(empty(self::$instance)) {

//             $db_info = array(
//                 "db_host" => "localhost",
//                 "db_port" => "5432",
//                 "db_user" => "postgres",
//                 "db_pass" => "qweasdzxc",
//                 "db_name" => "test",
//                 "db_charset" => "UTF-8");

//             try {
//                 self::$instance = new PDO("mysql:host=".$db_info['db_host'].';port='.$db_info['db_port'].';dbname='.$db_info['db_name'], $db_info['db_user'], $db_info['db_pass']);
//                 self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);  
//                 self::$instance->query('SET NAMES utf8');
//                 self::$instance->query('SET CHARACTER SET utf8');

//             } catch(PDOException $error) {
//                 echo $error->getMessage();
//             }

//         }

//         return self::$instance;
//     }

//     public static function setCharsetEncoding() {
//         if (self::$instance == null) {
//             self::connect();
//         }

//         self::$instance->exec(
//             "SET NAMES 'utf8';
//             SET character_set_connection=utf8;
//             SET character_set_client=utf8;
//             SET character_set_results=utf8");
//     }
// }

// $pdo = DB::getInstance();
// //DB::setCharsetEncoding();
// 
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'postgres');
define('DB_PASSWORD', 'qweasdzxc');
define('DB_NAME', 'test');
define('P_PORT', '5432');

class DB {
   
protected static $instance;
protected function __construct() {
if(empty(self::$instance)) {
        try {
            self::$instance = new PDO("pgsql:host=" . DB_SERVER . ";port=" . P_PORT . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        } catch(PDOException $error) {
            echo $error->getMessage();
        }
    }

}
public static function getInstance() {
    if(empty(self::$instance)) {
        try {
            new DB();
            //var_dump(self::$instance);
        } catch(PDOException $error) {
            echo $error->getMessage();
        }
    }
    //var_dump(self::$instance);
    return self::$instance;
}

private function __clone() {
    // Stopping Clonning of Object
}
 public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }
    
}

$pdo = DB::getInstance();
