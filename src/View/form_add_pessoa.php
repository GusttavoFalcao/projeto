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
    <form action="../controller/Pessoa.php?operation=insert" method="POST">
      <legend class="text-center font-bold text-blue-900 font-sans">Registro para a vacinação da COVID-19</legend>
      <hr class=" border-blue-900">
      <section class="columns-2 border-blue-900 text-center justify-between" style="margin: 15px 0">
        <article>
          <label for="nome">Nome</label>
          <input type="nome" name="nome" id="nome" class="border border-blue-900" style="width: 14vw;" required placeholder="">
        </article>
        <article>
          <label for="cpf">Número de identificação(CPF)</label>
          <input type="text" name="cpf" id="cpf" class="border border-blue-900" style="width: 14vw;" required placeholder="xxx.xxx.xxx-xx">
        </article>
      </section>
      <section class="mx-4 mt-4 columns-2 border-blue-900 text-center justify-between">
        <article>
          <label for="date">Data de nascimento</label>
          <input type="date" id="date" name="date" class="border border-blue-900" required placeholder="xx/xx/xxxx">
        </article>
        <article>
          <label for="masc">Gênero</label>
          <input type="radio" name="genero" value="Masculino" checked required placeholder="xx">
          Masculino
          <input type="radio" name="genero" value="Feminino" required placeholder="xx">
          feminino
        </article>
      </section>
      <section class="mx-4 mt-4 columns-2 border-blue-900 text-center justify-between">
        <article>
          <label for="email">E-mail</label>
          <input type="email" id="email" name="email" class="border border-blue-900" style="width: 14vw;" required placeholder="">
        </article>
        <article>
          <label for="telefone">Telefone</label>
          <input type="tel" id="telefone" name="telefone" class="telefone border border-blue-900" required placeholder="(xx) xxxxx-xxxx" style="width: 14vw;">
        </article>
      </section>
      <section class="columns-2 text-center justify-between" style="margin: 10px 0 ">
        <article>
          <label for="plano">plano de saúde: </label>
          <input type="text" id="plano" name="plano" class="border border-blue-900" required placeholder="">
        </article>
        <article>
          <label for="identificacao">Número de identificação do plano: </label>
          <input type="text" id="identificacao" name="identificacao" class="border border-blue-900" required placeholder="">
        </article>
      </section>
      <article class="flex justify-center ">
        <button type="submit" class="p-4 text-white bg-blue-900 rounded mr-10">Cadastrar</button>
      </article>
  </fieldset>
  </form>
</body>

</html>