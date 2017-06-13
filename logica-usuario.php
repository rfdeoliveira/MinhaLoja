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
        header("Location: index.php?falhaDeSeguranca=1");
        die;
    }
}
