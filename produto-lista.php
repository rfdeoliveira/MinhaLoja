<?php

require_once('cabecalho.php');
require_once('banco-produto.php');

?>

  <table class="table table-striped table-bordered">
    <?php foreach (listaProdutos($conexao) as $produto) : ?>
      <tr>
        <td><?= $produto->nome ?></td>
        <td><?= $produto->preco ?></td>
        <td><?= $produto->precoComDesconto(0.1) ?></td>
        <td><?= substr($produto->descricao, 0, 40) ?></td>
        <td><?= $produto->categoria->nome ?></td>
        <td>
          <a class="btn btn-primary" href="produto-altera-formulario.php?id=<?= $produto->id ?>">
            Alterar
          </a>
        </td>
        <td>
          <form action="remove-produto.php" method="post">
            <input type="hidden" name="id" value="<?= $produto->id ?>">
            <button class="btn btn-danger">Remover</button>
          </form>
        </td>
      </tr>
    <?php endforeach ?>
  </table>

<?php require_once('rodape.php') ?>
