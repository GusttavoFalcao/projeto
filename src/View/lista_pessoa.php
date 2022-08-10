<?php
session_start();
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
    <title>Lista de produtos</title>
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
          <a href="form_add_pessoa.php">Novo cadastro</a>
        </li>
      </ul>
    </nav>
  </header>
    <main class="flex flex-col justify-center  p-4 m-10 border-2 border-blue-900">
        <table class="table">
            <thead class="text-blue-900 border-2 border-blue-900">
                <th class="border-2 border-blue-900 h-5">Nome</th>
                <th class="border-2 border-blue-900 h-5">Cpf</th>
                <th class="border-2 border-blue-900 h-5">E-mail</th>
                <th class="border-2 border-blue-900 h-5">Data de nascimento</th>
                <th class="border-2 border-blue-900 h-5">Plano de saúde</th>
                <th class="border-2 border-blue-900 h-5">Gênero</th>
                <th class="border-2 border-blue-900 h-5">Telefone</th>
                <th class="border-2 border-blue-900 h-5">Número do plano</th> 
            </thead>
            <tbody>
                <?php
                foreach ($_SESSION['lista_pessoa'] as $pessoa) :
                ?>
                    <tr class="border-2 border-blue-900 text-center">
                        <td class="border-2 border-blue-900 h-5">
                            <?= $pessoa['nome'] ?>
                           
                        </td class="border-2 border-blue-900 h-5">
                        <td>
                            <?= $pessoa['cpf'] ?>
                        </td>
                        <td class="border-2 border-blue-900 h-5">
                            <?= $pessoa['email'] ?>
                        </td>
                        <td class="border-2 border-blue-900 h-5">
                            <?= $pessoa['data_nascimento'] ?>
                        </td>
                        <td class="border-2 border-blue-900 h-5">
                            <?= $pessoa['plano_de_saude'] ?>
                        </td>
                        <td class="border-2 border-blue-900 h-5">
                            <?= $pessoa['genero'] ?>
                        </td>
                        <td class="border-2 border-blue-900 h-5">
                            <?= $pessoa['telefone'] ?>
                        </td>
                        <td class="border-2 border-blue-900 h-5">
                            <?= $pessoa['numero_plano'] ?>
                        </td>
                        <td class="border-2 border-blue-900 h-5 to-blue-900">
                            <a href="../Controller/Pessoa.php?operation=find&cpf=<?= $pessoa["cpf"] ?>">Editar |</a>
                            <a href="../Controller/Pessoa.php?operation=delete&cpf=<?= $pessoa["cpf"] ?>">Deletar</a>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>

    </main>
</body>

</html>