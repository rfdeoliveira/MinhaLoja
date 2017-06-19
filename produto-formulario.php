<?php
include("conecta.php");
include("banco-categoria.php");
include("logica-usuario.php");
include("cabecalho.php");

verificaUsuario();

$categorias = listaCategorias($conexao);

$produto = [
    'nome' => '',
    'descricao' => '',
    'preco' => '',
    'categoria_id' => 1
];

$usado = false;
?>
  <h1>Formulário de produto</h1>
  <form action="adiciona-produto.php" method="post">
    <table class="table">
    <?php include('produto-formulario-base.php') ?>
      <tr>
        <td><button class="btn btn-primary">Cadastrar</button></td>
      </tr>
  </form>
<?php include("rodape.php"); ?>
