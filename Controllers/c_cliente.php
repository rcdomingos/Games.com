<?php
include_once '../config.php';
$conn = require SITE_PATH . '/Models/conexao.php';


include SITE_PATH. '/Models/m_cliente.php';

/* Cadastrar o usuario no banco */
if (isset($_POST['cadastrar'])) {
    $data = [];
    foreach ($_POST as $key => $value) {
        if ($key != "cadastrar") {
            if ($key == "senha") {
                $data[$key] = password_hash($value, PASSWORD_DEFAULT);
            } else {
                $data[$key] = utf8_decode($value);
            }
        }
    }

    if (cadastrarUsuario($data, $conn)) {
        header("location:". SITE_URL . "/Views/Clientes/retorno.php");
    } else {
        echo "Erro para Cadastrar o Usuario ";
    }
}

  // print_r($data);
  // cadastrarUsuario($data, $conn);


/* Verificar se o usuario existe no banco para poder acessar o sistema */
if (isset($_POST['acessar'])) {
    $usuario = validarUsuario($_POST['email'], $_POST['senha'], $conn);
    // var_dump($usuario);
    if ($usuario) {
        session_start();
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['nome_cliente'] = $usuario['nome_cliente'];
        $_SESSION['cod_cliente'] = $usuario['cod_cliente'];
        header("location:". SITE_URL . "/Views/home/index.php");
    } else {
        header("location:". SITE_URL . "/Views/Clientes/loginCliente.php");
    }
}

if (isset($_GET['sair'])) {
    session_start();
    session_destroy();
    header("location:" . SITE_URL . "/Views/home/index.php");
}


$conn->close();