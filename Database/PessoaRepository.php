<?php

namespace App\Repository;

/**
 * Classe responsável por executar as regras de negócio da tabela 'pessoa'
 */
class PessoaRepository extends Repository
{
    /**
     * Busca todos os registros da tabela 'pessoa'
     *
     * @return void
     * @author Victor Marciano
     */
    public static function findAll()
    {
        $statement = self::getDb()->prepare("SELECT * FROM pessoa");
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_CLASS);
    }
    
    /**
     * Undocumented function
     *
     * @param [type] $obj
     * @return void
     * @author Victor Marciano
     */
    public static function findOneOrFail($obj)
    {
        if (!$obj instanceof \App\Entity\Pessoa) {
            return false;
        }
    }

    /**
     * Undocumented function
     *
     * @param [type] $obj
     * @author Victor Marciano
     */
    public static function insert($obj)
    {
        if (!$obj instanceof \App\Entity\Pessoa) {
            return false;
        }

        $statement = self::getDb()->prepare("INSERT INTO pessoa VALUES(?,?)");
        return $statement->execute([$obj->getId(), $obj->getNome()]);
    }

    public static function delete($obj)
    {
        if (!$obj instanceof \App\Entity\Pessoa) {
            return false;
        }

        $statement = self::$db->prepare("DELETE FROM pessoa WHERE id = ?");
        return $statement->execute([$obj->getId()]);
    }

    public static function update($obj)
    {
        if (!$obj instanceof \App\Entity\Pessoa) {
            return false;
        }
    }
}
