<?php

namespace APP\Model\DAO;

use APP\Model\Conexao;
use PDO;

class PessoaDAO implements DAO
{
    public function insert($object)
    {
        $conexao = Conexao::getConexao();
        $stmt = $conexao->prepare('INSERT INTO pessoa VALUES(?, ? , ?, ?, ?, ?, ?, ?);');
        $stmt->bindParam(1, $object->nome);
        $stmt->bindParam(2, $object->cpf);
        $stmt->bindParam(3, $object->email);
        $stmt->bindParam(4, $object->data_nascimento);
        $stmt->bindParam(5, $object->plano_de_saude);
        $stmt->bindParam(6, $object->genero);
        $stmt->bindParam(7, $object->telefone);
        $stmt->bindParam(8, $object->numero_plano);
       
        return $stmt->execute();
    }

    public function findCpf($cpf)
    {
        $conexao = Conexao::getConexao();
        $rs = $conexao->query("select cpf from pessoa where cpf='$cpf'");
        return $rs->fetchAll(PDO::FETCH_ASSOC); 
    }
   
    public function findAll()
    {
        $conexao = Conexao::getConexao();
        $rs = $conexao->query('select * from pessoa');
        return $rs->fetchAll(PDO::FETCH_ASSOC); 
    }
    public function update($object)
    {
        $conexao = Conexao::getConexao();
        $stmt = $conexao->prepare('UPDATE pessoa SET nome=?, email=?, telefone=? WHERE cpf=?;');
        $stmt->bindParam(1, $object->nome);
        $stmt->bindParam(2, $object->email);
        $stmt->bindParam(3, $object->telefone);
        $stmt->bindParam(4, $object->cpf);
        return $stmt->execute();
    }
    public function findOne($cpf)
    {
        $conexao = Conexao::getConexao();
        $rs = $conexao->query("select * from pessoa where cpf = '$cpf'");
        return $rs->fetch(PDO::FETCH_ASSOC);
    }
    public function delete($cpf)
    {
        $conexao = Conexao::getConexao();
        $stmt = $conexao->prepare('delete from pessoa where cpf = ?');
        $stmt->bindParam(1, $cpf);
        return $stmt->execute();
    }
}
