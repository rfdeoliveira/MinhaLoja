<?php

require_once('cabecalho.php');
require_once('banco-categoria.php');
require_once('banco-produto.php');
require_once('logica-usuario.php');

$categorias = listaCategorias($conexao);
$produto = buscaProduto($conexao, $_GET['id']);

$usado = $produto->usado ? 'checked="checked"' : '';
?>
  <h1>Formulário de produto</h1>
  <form action="altera-produto.php" method="post">
    <input type="hidden" name="id" value="<?= $produto->id ?>">
    <table class="table">
    <?php require_once('produto-formulario-base.php') ?>
      <tr>
        <td><button class="btn btn-primary">Alterar</button></td>
      </tr>
    </table>
  </form>
<?php require_once('rodape.php') ?>
