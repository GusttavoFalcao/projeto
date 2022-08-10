<?php

namespace APP\Controller;

require_once '../../vendor/autoload.php';

use APP\Model\DAO\PessoaDAO;
use APP\Utils\Redirect;
use APP\Model\Pessoa;
use PDOException;
use APP\Model\Validacao;

if (empty($_GET['operation'])) {
    Redirect::redirect(message: 'Nenhuma operação foi informada!!!', type: 'error');
}

switch ($_GET['operation']) {
    case 'insert':
        insertPessoa();
        break;
    case 'list':
        listPessoa();
        break;
    case 'delete':
        deletePessoa();
        break;
    case 'find':
        findPessoa();
        break;
    case 'edit':
        editPessoa();
        break;
    default:
        Redirect::redirect(message: 'Operação informada é inválida!!!', type: 'error');
}


function insertPessoa()
{
    
    if (empty($_POST)) {
        Redirect::redirect(
            type: 'error',
            message: 'Requisição inválida!!!'
        );
    }
    $pessoaNome = $_POST["nome"];
    $pessoaCpf = $_POST["cpf"];
    $pessoaNascimento = $_POST["date"];
    $pessoaEmail = $_POST["email"];
    $pessoaPlano = $_POST["plano"];
    $pessoaTelefone = $_POST["telefone"];
    $pessoaGenero = $_POST["genero"];
    $pessoaNumeroPlano = $_POST["identificacao"];

    $error = array();
    
    if (!Validacao::validarNome($pessoaNome)) {
        array_push($error, 'O nome deve conter ao menos 5 caracteres entre letras e números!!!');
    }

    if (!Validacao::validarEmail($pessoaEmail)) {
        array_push($error, 'O email não pode ficar vazio!!!');
    }

    if (!Validacao::validarPlano($pessoaPlano)) {
        array_push($error, 'O plano de saúde não pode ficar vazio!!!');
    }

    if (!Validacao::validarCpf($pessoaCpf)) {
        array_push($error, 'O CPF tem 14 caracteres com suas pontuções!!!');
    }

    if (!Validacao::validarTelefone($pessoaTelefone)) {
        array_push($error, 'O telefone tem 15 caracteres com suas pontuções!!!');
    }

    if (!Validacao::validarNumero($pessoaNumeroPlano)) {
        array_push($error, 'O número do plano de saúde não pode ficar vazio!!!');
    }



    if ($error) {
        Redirect::redirect(
            message: $error,
            type: 'warning'
        );
    } else {
        $pessoa = new Pessoa(
            nome: $pessoaNome,
            cpf: $pessoaCpf,
            data_nascimento: $pessoaNascimento,
            email: $pessoaEmail,
            plano_de_saude: $pessoaPlano,
            genero: $pessoaGenero,
            numero_plano: $pessoaNumeroPlano,
            telefone: $pessoaTelefone,
        );
    
        $dao = new PessoaDAO();
        try {
            $result = $dao ->findCpf($pessoaCpf);
            if($result){
                Redirect::redirect(
                    message: 'Cpf já cadastrado!!!',
                    type: 'error'
                );
            }

            $result = $dao->insert($pessoa);
            
            if ($result)
                Redirect::redirect(
                    message: 'cadastrado com sucesso!!!'
                );
            else
                Redirect::redirect(
                    message: 'Não foi possível cadastrar!!!',
                    type: 'error'
                );
        } catch (PDOException $e) {
            echo $e->getMessage();
            //Redirect::redirect(message: 'Lamento, houve um erro inesperado na execução do sistema!!!', type: 'error');
        }
    }
}




function listPessoa()
{
    $dao = new PessoaDAO();
    try {
        $pessoa = $dao->findAll();
    } catch (PDOException $e) {
        Redirect::redirect(message: 'Lamento, houve um erro inesperado na execução do sistema!!!', type: 'error');
    }
    session_start();
    if ($pessoa) {
        $_SESSION['lista_pessoa'] = $pessoa;
        header("location:../View/lista_pessoa.php");
    } else {
        Redirect::redirect(message: ['Não existem cadastrados no sistema!!!'], type: 'warning');
    }
}

function deletePessoa()
{
    $cpf = $_GET['cpf'];
    $dao = new PessoaDAO();
    try {
        $result = $dao->delete($cpf);
        if ($result) {
            Redirect::redirect(message: 'Cadastro removido com sucesso!!!');
        } else {
            Redirect::redirect(message: ['Não foi possível remover o cadastro!!!'], type: 'warning');
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        //Redirect::redirect(message: 'Lamento, houve um erro inesperado na execução do sistema!!!', type: 'error');
    }
}


function findPessoa()
{
    $cpf = $_GET['cpf'];
    $dao = new PessoaDAO();
    $data = $dao->findOne($cpf);
    if ($data) {
        session_start();
        $_SESSION['form_edit_pessoa'] = $data;
        header('location:../View/form_edit_pessoa.php');
    } else {
        Redirect::redirect(message: 'Cadastro não localizado em nossa base de dados!!!');
    }
}

function editPessoa()
{
    if (empty($_POST)) {
        Redirect::redirect(
            type: 'error',
            message: 'Requisição inválida!!!'
        );
    }

    $pessoaNome = $_POST["nome"];
    $pessoaEmail = $_POST["email"];
    $pessoaTelefone = $_POST["telefone"];
    $pessoaCpf = $_POST["cpf"];


    $error = array();

    if ($error) {
        Redirect::redirect(message: $error, type: 'warning');
    } else {
        $pessoa = new Pessoa(
            email: $pessoaEmail,
            nome: $pessoaNome,
            telefone: $pessoaTelefone,
            cpf: $pessoaCpf,
        );
        $dao = new PessoaDAO();
        $result = $dao->update($pessoa);
        if ($result) {
            Redirect::redirect(message: 'Cadastro atualizado com sucesso!!!');
        } else {
            Redirect::redirect(message: ['Não foi possível atualizar o cadastro!!!'], type: 'warning');
        }
    }
}
