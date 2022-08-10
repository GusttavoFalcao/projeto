<?php

namespace APP\Model;

use PDO;

class Conexao
{
    private static PDO $conexao;

    private function __construct()
    {
    }

    public static function getConexao():PDO
    {
        if(empty(self::$conexao)){
            self::$conexao = new PDO(DNS,USER,PASSWORD);
        }
        return self::$conexao;
    }
}