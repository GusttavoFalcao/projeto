<?php
session_start();
$pessoa = $_SESSION['form_edit_pessoa'];
if (empty($_SESSION['login'])) {
    header("location:../../index.html");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="imagens/png" href="../icone.png" />

</head>

<body>
    <header class="bg-blue-900 text-white">
        <nav>
            <ul class="flex">
                <li>
                    <a href="../View/painel_inicial.php">Home/</a>
                </li>
                <li>
                    <a href="../Controller/pessoa.php?operation=list">Listar Cadastros</a>
                </li>
            </ul>
        </nav>
    </header>
    <fieldset class="flex flex-col justify-center p-4 m-10 border-2 border-blue-900">
   
        <form action="../controller/Pessoa.php?operation=edit" method="POST">
        <input type="hidden" name="cpf" value="<?= $pessoa['cpf'] ?>">
    
        <legend class="text-center font-bold text-blue-900 font-sans">Registro para a vacinação da COVID-19</legend>
            <hr class=" border-blue-900">
            <section class="columns-3 border-blue-900 text-center justify-between" style="margin: 15px 0">
                <article>
                    <label for="nome">Nome</label>
                    <input type="nome" name="nome" id="nome" class="border border-blue-900" style="width: 14vw;" value="<?= $pessoa['nome'] ?>">
                </article>
                <article>
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" class="border border-blue-900" style="width: 14vw;" value="<?= $pessoa['email'] ?>">
                </article>
                <article>
                    <label for="telefone">Telefone</label>
                    <input type="tel" id="telefone" name="telefone" class="telefone border border-blue-900" required placeholder="(xx) xxxxx-xxxx" style="width: 14vw;" value="<?= $pessoa['telefone'] ?>">
                </article>
            </section>
            <section>
                <article class="flex justify-center mt-3">
                    <button type="submit" class="p-3 text-white bg-blue-900 rounded">Salvar</button>
                </article>
            </section>
    </fieldset>
    </form>
</body>

</html>