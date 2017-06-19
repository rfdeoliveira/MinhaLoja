<?php

session_start();

function logarUsuario($email)
{
    session_regenerate_id(true);

    $_SESSION['usuario_logado'] = $email;
}

function logout()
{
    session_destroy();
    session_start();
}

function usuarioLogado()
{
    return $_SESSION['usuario_logado'];
}

function usuarioEstaLogado()
{
    return isset($_SESSION['usuario_logado']);
}

function verificaUsuario()
{
    if (! usuarioEstaLogado()) {
        $_SESSION['danger'] = "Você não tem acesso a esta funcionalidade!";
        header("Location: index.php");
        die;
    }
}
