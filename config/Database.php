<?php

namespace App\Config;

class Database {
    
    private static $db;
    private static $dbData = 'mysql:host=localhost;dbname=estudoPhp';
    private static $user = 'root';
    private static $password = 'marciano';

    public function __construct(){
        
    }
    
    public static function getInstance(){
        if(!isset(self::$db)){
            self::$db = new \PDO(self::$dbData, self::$user, self::$password);
        }

        return self::$db;
    }
}
