<?php

require_once('cabecalho.php');

$produtoDao = new ProdutoDao($conexao);

?>
  <table class="table table-striped table-bordered">
    <?php foreach ($produtoDao->listaProdutos() as $produto) : ?>
      <tr>
        <td><?= $produto->getNome() ?></td>
        <td><?= $produto->getPreco() ?></td>
        <td><?= $produto->precoComDesconto(0.1) ?></td>
        <td><?= substr($produto->getDescricao(), 0, 40) ?></td>
        <td><?= $produto->getCategoria()->getNome() ?></td>
        <td>
          <a class="btn btn-primary" href="produto-altera-formulario.php?id=<?= $produto->getId() ?>">
            Alterar
          </a>
        </td>
        <td>
          <form action="remove-produto.php" method="post">
            <input type="hidden" name="id" value="<?= $produto->getId() ?>">
            <button class="btn btn-danger">Remover</button>
          </form>
        </td>
      </tr>
    <?php endforeach ?>
  </table>

<?php require_once('rodape.php') ?>
