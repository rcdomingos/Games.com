<?php

function validarUsuario($user, $pass, $conn)
{
  $sql = 'SELECT cod_usuario, nome_usuario, logim, senha  from usuario where logim = ? ';
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $user);
  $stmt->execute();

  $result = $stmt->get_result()->fetch_assoc();
  $stmt->close();
  return password_verify($pass, $result['senha']) ?  $result : false;
}

function cadastrarUsuario($dados, $conn)
{
  $valores = $dados;
  $sqlValida = 'SELECT logim from usuario where logim = ? ';
  $stmt = $conn->prepare($sqlValida);
  $stmt->bind_param("s", $valores['logim']);
  $stmt->execute();

  $resultValida = $stmt->get_result()->num_rows;
  $stmt->close();

  if (!$resultValida) {
    $sql = 'INSERT INTO usuario (nome_usuario, telefone, cpf, email, logim, senha) values(?,?,?,?,?,?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $valores['nome_usuario'], $valores['telefone'], $valores['cpf'], $valores['email'], $valores['logim'], $valores['senha']);

    $result = $stmt->execute() ? true : false;
    $stmt->close();

    return $result;
  } else {
    echo "Usuario ja existe ...";
  }
}

/* FUNÇÃO PARA LISTAR CATEGORIA  ||  THAIS M */
function listarusuarios($conn)
{
  $sql = 'SELECT cod_usuario, nome_usuario, logim FROM usuario';
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stmt->close();
  return $result;
  // print_r($result);
}

/* ALTERAR USUARIO NO BANCO */
function alterarusuario($dados, $conn)
{
  print_r($dados);
  $sql = 'UPDATE usuario SET logim = ?, senha = ?  WHERE cod_usuario = ?';
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssi", $dados['logim'], $dados['senha'], $dados['cod_usuario']);
  $result = $stmt->execute() ? true : false;
  $stmt->close();
  return $result;
}

function deletarusuario($conn, $id_usuario)
{
  $sql = "DELETE usuario WHERE cod_usuario = ? ";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id_usuario);

  $result = $stmt->execute() ? true : false;
  $stmt->close();

  return $result;
}
