<?php
namespace APP\Model;
class validacao
{
    public static function validarNome(string $nome):bool
    {
        return mb_strlen($nome) > 4;
    }

    public static function validarEmail(string $email):bool
    {
        return mb_strlen($email) > 0;
    }

    public static function validarPlano(string $plano_de_saude):bool
    {
        return mb_strlen($plano_de_saude) > 0;
    }
    
    public static function validarCpf(string $cpf):bool
    {
        return mb_strlen($cpf) == 14;
    }

    public static function validarTelefone(string $telefone):bool
    {
        return mb_strlen($telefone) == 15;
    }

    public static function validarNumero(string $numero_plano):bool
    {
        return mb_strlen($numero_plano) > 0;
    }
}