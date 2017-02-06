<?php
function listaProdutos($conexao)
{
    $produtos = [];
    $query = "select * from produtos";
    $resultado = mysqli_query($conexao, $query);
    while ($produto = mysqli_fetch_assoc($resultado)) {
        array_push($produtos, $produto);
    }

    return $produtos;
}

function insereProduto($conexao, $nome, $preco, $descricao)
{
    $query = "insert into produtos (nome, preco, descricao) values ('{$nome}', {$preco}, '{$descricao}')";
    return mysqli_query($conexao, $query);
}

function removeProduto($conexao, $id)
{
    $query = "delete from produtos where id = {$id}";
    return mysqli_query($conexao, $query);
}
