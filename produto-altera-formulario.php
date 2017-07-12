<?php

require_once('cabecalho.php');
require_once('logica-usuario.php');

$categoriaDao = new CategoriaDao($conexao);
$categorias = $categoriaDao->listaCategorias();

$produtoDao = new ProdutoDao($conexao);
$produto = $produtoDao->buscaProduto($_GET['id']);

$usado = $produto->isUsado() ? 'checked="checked"' : '';
?>
  <h1>Formulário de produto</h1>
  <form action="altera-produto.php" method="post">
    <input type="hidden" name="id" value="<?= $produto->getId() ?>">
    <table class="table">
    <?php require_once('produto-formulario-base.php') ?>
      <tr>
        <td><button class="btn btn-primary">Alterar</button></td>
      </tr>
    </table>
  </form>
<?php require_once('rodape.php') ?>
