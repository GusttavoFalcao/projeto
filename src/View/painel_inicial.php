<?php
session_start();
if (empty($_SESSION['login'])) {
  header("location:../../index.html");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Health center</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="icon" type="imagens/png" href="../icone.png" />
</head>

<body>
  <header class="bg-blue-900 text-white">
    <nav>
      <ul class="flex">
        <li>
          <a href="form_add_pessoa.php">Novo cadastro/</a>
        </li>
        <li>
          <a href="../Controller/pessoa.php?operation=list">Listar Cadastros</a>
        </li>
      </ul>
    </nav>
  </header>
</body>