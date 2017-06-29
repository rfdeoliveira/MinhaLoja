<?php

require_once('cabecalho.php');
require_once('banco-produto.php');
require_once('logica-usuario.php');

$categoria = new Categoria();
$categoria->setId($_POST["categoria_id"]);

$id = $_POST["id"];
$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria = $categoria;

if (array_key_exists('usado', $_POST)) {
    $usado = 'true';
} else {
    $usado = 'false';
}

$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
$produto->setId($id);

if (alteraProduto($conexao, $produto)) {
?>
  <p class="text-success">O produto <?= $produto->getNome() ?>, <?= $produto->getPreco() ?> foi alterado.</p>
<?php
} else {
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">O produto não foi alterado: <?= $msg ?></p>
<?php
}
?>
<?php require_once('rodape.php') ?>
