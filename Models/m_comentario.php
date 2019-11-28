<?php

function cadastrarComentario($conn, $dados)
{
    $valores = $dados;

    $sql = "INSERT INTO comentario (cod_cliente,cod_produto,titulo_comentario,comentario,avaliacao,data_comentario) 
  VALUES(?,?,?,?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iissis", $valores['cod_cliente'], $valores['cod_produto'], $valores['titulo_comentario'], $valores['comentario'], $valores['avaliacao'], $valores['data_comentario']);
    $result = $stmt->execute() ? true : false;
    $stmt->close();

    return $result;
}
