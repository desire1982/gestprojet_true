<?php
//Script de connexion à la base
//Definisssion des variables de connexion à la base de données

define('HOST', 'localhost'); // Database host name ex. localhost
define('USER', 'root'); // Database user. ex. root ( if your on local server)
define('PASSWORD', ''); // Database user password  (if password is not set for user then keep it empty )
define('DATABASE', 'gestprojet'); // Database name
define('CHARSET', 'utf8');

//$DB_host = "localhost";
//$DB_user = "root";
//$DB_pass = "";
//$DB_name = "gestprojet";

function DB()
{
    static $connexion;
    if ($connexion === null) {
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => FALSE,
        );
        $dsn ='mysql:host='.HOST.';dbname='.DATABASE.';charset='.CHARSET;
        $connexion = new PDO($dsn, USER, PASSWORD, $opt);
    }
    return $connexion;
	
}
 

?>