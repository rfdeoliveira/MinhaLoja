<?php
include("conecta.php");
include("banco-usuario.php");
include("logica-usuario.php");

$usuario = buscaUsuario(
    $conexao,
    $_POST["email"],
    $_POST["senha"]
);

if ($usuario == null) {
    $_SESSION['danger'] = "Usuário ou senha inválida!";
    header("Location: index.php");
} else {
    logarUsuario($usuario['email']);
    $_SESSION['success'] = "Logado com sucesso!";
    header("Location: index.php");
}
die;
