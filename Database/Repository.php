<?php

namespace App\Repository;

abstract class Repository
{
    protected static $db;
    
    protected function getDb()
    {
        return self::$db = \App\Config\Database::getInstance();
    }

    abstract protected static function findOneOrFail($obj);
    abstract protected static function insert($obj);
    abstract protected static function delete($obj);
    abstract protected static function update($obj);
}
