<?php
namespace APP\Model;

class pessoa
{
    
    private string $nome;
    private string $data_nascimento;
    private string $email;
    private string $plano_de_saude;
    private string $cpf;
    private string $genero;
    private string $telefone;
    private string $numero_plano;

    public function __construct(
        string $nome,
        string $email,
        string $telefone,
        string $cpf  = "",
        string $data_nascimento = "",
        string $plano_de_saude  = "",
        string $genero  = "",
        string $numero_plano  = "",
    ){
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->data_nascimento = $data_nascimento;
        $this->plano_de_saude = $plano_de_saude;
        $this->genero = $genero;
        $this->telefone = $telefone;
        $this->numero_plano = $numero_plano;
    }
    public function __get($attribute)
    {
        return $this->$attribute;
    }
}