<?php 

if(!defined('___CONFIG___')) {
    exit('You do not have a config file');
}

class DB {

    protected static $con;

    private function __construct() {

        try {
            self::$con = new PDO( 'mysql:charset=utf8mb4;host=localhost;port=3306;dbname=login_course', 'Steven_Pz1','DBpass');
            self::$con ->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$con ->setAttribute( PDO::ATTR_PERSISTENT, false);

        } catch (PDOException $e) {
            echo  "Could not connect to database. $e";
            exit;
        }
    }

public static function getConnection() {

    //if this instance was not been started, start it.
    if(!self::$con) {
        new DB();
    }

    //Return the writeable db connection 
    return self::$con;
}
}



?>