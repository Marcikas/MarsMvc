<?php

trait Repository {    
    private static $db;
    
    public function __construct(){
        self::getDb();
    }

    abstract static function findOneOrFail($obj);
    abstract static function insert($obj);
    abstract static function delete($obj);
    abstract static function update($obj);

    public function getDb(){
        self::$db = \App\Config\Database::getInstance();
    }
}