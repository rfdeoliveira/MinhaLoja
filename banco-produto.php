<?php

require_once('class/Produto.php');
require_once('class/Categoria.php');
require_once('conecta.php');

function listaProdutos($conexao)
{
    $produtos = [];
    $query = "select p.*, c.nome as categoria_nome from produtos p join categorias c on c.id = p.categoria_id";
    $resultado = mysqli_query($conexao, $query);
    while ($produto_array = mysqli_fetch_assoc($resultado)) {
        $categoria = new Categoria();
        $categoria->setId($produto_array['categoria_id']);
        $categoria->setNome($produto_array['categoria_nome']);

        $produto = new Produto();
        $produto->setId($produto_array['id']);
        $produto->setNome($produto_array['nome']);
        $produto->setPreco($produto_array['preco']);
        $produto->setDescricao($produto_array['descricao']);
        $produto->setCategoria($categoria);
        $produto->setUsado($produto_array['usado']);

        array_push($produtos, $produto);
    }

    return $produtos;
}

function buscaProduto($conexao, $id)
{
    $id = mysqli_escape_string($conexao, $id);

    $query = "select * from produtos where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    $produto_array = mysqli_fetch_assoc($resultado);

    $categoria = new Categoria();
    $categoria->setId($produto_array['categoria_id']);

    $produto = new Produto();
    $produto->setId($produto_array['id']);
    $produto->setNome($produto_array['nome']);
    $produto->setPreco($produto_array['preco']);
    $produto->setDescricao($produto_array['descricao']);
    $produto->setCategoria($categoria);
    $produto->setUsado($produto_array['usado']);

    return $produto;
}

function insereProduto($conexao, Produto $produto)
{
    $nome = mysqli_escape_string($conexao, $produto->getNome());
    $preco = mysqli_escape_string($conexao, $produto->getPreco());
    $descricao = mysqli_escape_string($conexao, $produto->getDescricao());
    $categoria_id = mysqli_escape_string($conexao, $produto->getCategoria()->getId());
    $usado = mysqli_escape_string($conexao, $produto->isUsado());

    $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, {$usado})";
    return mysqli_query($conexao, $query);
}

function alteraProduto($conexao, Produto $produto)
{
    $id = mysqli_escape_string($conexao, $produto->getId());
    $nome = mysqli_escape_string($conexao, $produto->getNome());
    $preco = mysqli_escape_string($conexao, $produto->getPreco());
    $descricao = mysqli_escape_string($conexao, $produto->getDescricao());
    $categoria_id = mysqli_escape_string($conexao, $produto->getCategoria()->getId());
    $usado = mysqli_escape_string($conexao, $produto->isUsado());

    $query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id = {$categoria_id} , usado = {$usado} where id = {$id}";
    return mysqli_query($conexao, $query);
}


function removeProduto($conexao, $id)
{
    $query = "delete from produtos where id = {$id}";
    return mysqli_query($conexao, $query);
}
