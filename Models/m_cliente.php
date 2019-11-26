<?php

/**FUNÇÃO PARA VALIDAR O USUARIO NO BANCO */
function validarUsuario($user, $pass, $conn)
{
    $sql = 'SELECT cod_usuario, nome_usuario, telefone, cpf, email, senha  from usuario where email = ? ';
    $stmt = $conn->prepare($sql) ;
    $stmt->bind_param("s", $user);
    $stmt->execute();

    $result = $stmt->get_result()->fetch_assoc();

    $stmt->close();

     return password_verify($pass, $result['senha']) ?  $result : false;
//    return $result;
    // return current($resultAcesso);
}


/**FUNÇÃO PARA CADASTRAR O USUARIO NO BANCO */
function cadastrarUsuario($dados, $conn)
{
  $valores = $dados;

  $sqlValida = 'SELECT email from usuario where email = ? ';
  $stmt = $conn->prepare($sqlValida) ;
  $stmt->bind_param("s", $valores['email']);
  $stmt->execute();

  $resultValida = $stmt->get_result()->num_rows;

  $stmt->close();
   
  if(!$resultValida){
    $sql = 'INSERT INTO usuario (nome_usuario, telefone, cpf, email, senha) values(?,?,?,?,?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $valores['nome_usuario'], $valores['telefone'], $valores['cpf'], $valores['email'], $valores['senha']);
    // $stmt->execute();
    $result = $stmt->execute() ? true : false;
    $stmt->close();

    return $result;
   }else{
    echo "Usuario ja existe!";
  }
}