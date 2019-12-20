<?php

namespace App\Repository;

require_once "Repository.php";

class PessoaRepository extends \Repository{
       
    public static function findAll(){        
        $statement = self::getDb()->prepare("SELECT * FROM pessoa");
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_CLASS);
    }
    
    public static function findOneOrFail($obj){
        if (!$obj instanceof \App\Entity\Pessoa) {
            return false;
        } 
    }    

    public static function insert($obj){ 
        if (!$obj instanceof \App\Entity\Pessoa) {
            return false;
        }            

        $statement = self::getDb()->prepare("INSERT INTO pessoa VALUES(?,?)");        
        return $statement->execute([$obj->getId(), $obj->getNome()]);       
    }

    public static function delete($obj){
        if (!$obj instanceof \App\Entity\Pessoa) {
            return false;
        } 

        $statement = self::$db->prepare("DELETE FROM pessoa WHERE id = ?");        
        return $statement->execute([$obj->getId()]);
    }

    public static function update($obj){
        if (!$obj instanceof \App\Entity\Pessoa) {
            return false;
        } 
    }
}