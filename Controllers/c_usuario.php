<?php
/*remover o warning do include e da session**/
if (!defined('SITE_URL')) {
  include_once '../config.php';
}

$conn = require SITE_PATH . '/Models/conexao.php';

include SITE_PATH . '/Models/m_usuario.php';

/* VERIFICA SE USUARIO EXISTE NO BANCO PARA ACESSAR O SISTEMA DE ADM  || THAIS M.*/
if (isset($_POST['acessar-usuario'])) {
  $usuario = validarUsuario($_POST['logim'], $_POST['senha'], $conn);
  if ($usuario) {
    session_start();
    $_SESSION['nome_usuario'] = $usuario['nome_usuario'];
    $_SESSION['logim'] = $usuario['logim'];
    $_SESSION['cod_usuario'] = $usuario['cod_usuario'];
    header("location:" . SITE_URL . "/Views/adm/adm-index.php");
  } else {
    header("location:" . SITE_URL . "/Views/adm/index.php");
  }
}

/* CADASTRA O USUARIO NO BANCO || THAIS M. */
if (isset($_POST['cadastrar-usuario'])) {
  $data = [];
  foreach ($_POST as $key => $value) {
    if ($key != "cadastrar-usuario") {
      if ($key == "senha") {
        $data[$key] = password_hash($value, PASSWORD_DEFAULT);
      } else {
        $data[$key] = utf8_decode($value);
      }
    }
  }
  // var_dump($data);
  if (cadastrarUsuario($data, $conn)) {
    header("location:" . SITE_URL . "/Views/adm/sucess.php");
  } else {
    echo 'Erro para cadastrar. Tente novamente ' . '<a href="../Views/adm/create.php">Click aqui</a>';
  }
}

/* LISTAR USUARIOS DO ADM */
if (isset($listarusuarios)) {
  $listarusuarios = listarusuarios($conn);
}

/* CADASTRA O USUARIO NO BANCO || THAIS M. */
if (isset($_POST['alterar-usuario'])) {
  $dados = [];
  foreach ($_POST as $key => $value) {
    if ($key != "alterar-usuario") {
      if ($key == "senha") {
        $dados[$key] = password_hash($value, PASSWORD_DEFAULT);
      } else {
        $dados[$key] = utf8_decode($value);
      }
    }
  }
  // var_dump($dados);
  if (alterarusuario($dados, $conn)) {
    // session_destroy();
    header("location:" . SITE_URL . "/Views/adm/usuarios.php");
  } else {
    echo 'Erro para cadastrar. Tente novamente ' . '<a href="../Views/adm/alter-usuario.php">Click aqui</a>';
  }
}
