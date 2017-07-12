<?php

class ProdutoDao
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function listaProdutos()
    {
        $produtos = [];
        $query = "select p.*, c.nome as categoria_nome from produtos p join categorias c on c.id = p.categoria_id";
        $resultado = mysqli_query($this->conexao, $query);
        while ($produto_array = mysqli_fetch_assoc($resultado)) {
            $categoria = new Categoria();
            $categoria->setId($produto_array['categoria_id']);
            $categoria->setNome($produto_array['categoria_nome']);

            $id = $produto_array['id'];
            $nome = $produto_array['nome'];
            $preco = $produto_array['preco'];
            $descricao = $produto_array['descricao'];
            $usado = $produto_array['usado'];

            $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
            $produto->setId($id);

            array_push($produtos, $produto);
        }

        return $produtos;
    }

    public function buscaProduto($id)
    {
        $id = mysqli_escape_string($this->conexao, $id);

        $query = "select * from produtos where id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        $produto_array = mysqli_fetch_assoc($resultado);

        $categoria = new Categoria();
        $categoria->setId($produto_array['categoria_id']);

        $id = $produto_array['id'];
        $nome = $produto_array['nome'];
        $preco = $produto_array['preco'];
        $descricao = $produto_array['descricao'];
        $usado = $produto_array['usado'];

        $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
        $produto->setId($id);

        return $produto;
    }

    public function insereProduto(Produto $produto)
    {
        $nome = mysqli_escape_string($this->conexao, $produto->getNome());
        $preco = mysqli_escape_string($this->conexao, $produto->getPreco());
        $descricao = mysqli_escape_string($this->conexao, $produto->getDescricao());
        $categoria_id = mysqli_escape_string($this->conexao, $produto->getCategoria()->getId());
        $usado = mysqli_escape_string($this->conexao, $produto->isUsado());

        $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, {$usado})";
        return mysqli_query($this->conexao, $query);
    }

    public function alteraProduto(Produto $produto)
    {
        $id = mysqli_escape_string($this->conexao, $produto->getId());
        $nome = mysqli_escape_string($this->conexao, $produto->getNome());
        $preco = mysqli_escape_string($this->conexao, $produto->getPreco());
        $descricao = mysqli_escape_string($this->conexao, $produto->getDescricao());
        $categoria_id = mysqli_escape_string($this->conexao, $produto->getCategoria()->getId());
        $usado = mysqli_escape_string($this->conexao, $produto->isUsado());

        $query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id = {$categoria_id} , usado = {$usado} where id = {$id}";
        return mysqli_query($this->conexao, $query);
    }

    public function removeProduto($id)
    {
        $query = "delete from produtos where id = {$id}";
        return mysqli_query($this->conexao, $query);
    }
}
