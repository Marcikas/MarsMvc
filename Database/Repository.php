<?php

abstract class Repository {    
    protected static $db;
    
    protected function getDb(){
        return self::$db = \App\Config\Database::getInstance();
    }

    abstract static function findOneOrFail($obj);
    abstract static function insert($obj);
    abstract static function delete($obj);
    abstract static function update($obj);
}