<?php
include('logica-usuario.php');
include("cabecalho.php");
include("conecta.php");
include("banco-categoria.php");
include("banco-produto.php");

$categorias = listaCategorias($conexao);
$produto = buscaProduto($conexao, $_GET['id']);

$usado = $produto['usado'] ? 'checked="checked"' : '';
?>
  <h1>Formulário de produto</h1>
  <form action="altera-produto.php" method="post">
    <input type="hidden" name="id" value="<?=$produto['id']?>">
    <table class="table">
    <?php include('produto-formulario-base.php') ?>
      <tr>
        <td><button class="btn btn-primary">Alterar</button></td>
      </tr>
    </table>
  </form>
<?php include("rodape.php"); ?>
