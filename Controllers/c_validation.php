<?php

/**Validar se o usuario esta logado para permitir acesso as paginas */
$conf = include $_SERVER['DOCUMENT_ROOT'] . '/Games.com/config.php';
session_start();
if (! isset($_SESSION['cod_usuario'])) {
    header("location:$conf[url]/Views/Clientes");
    session_destroy();
    exit;
}