<?php

require_once('banco-categoria.php');
require_once('logica-usuario.php');
require_once('cabecalho.php');
require_once('class/Produto.php');

verificaUsuario();

$categorias = listaCategorias($conexao);

$categoria = new Categoria();
$categoria->id = 1;

$produto = new Produto();
$produto->nome = '';
$produto->descricao = '';
$produto->preco = '';
$produto->categoria = $categoria;
$produto->usado = false;
?>
  <h1>Formulário de produto</h1>
  <form action="adiciona-produto.php" method="post">
    <table class="table">
    <?php require_once('produto-formulario-base.php') ?>
      <tr>
        <td><button class="btn btn-primary">Cadastrar</button></td>
      </tr>
  </form>
<?php require_once('rodape.php') ?>
