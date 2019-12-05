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

function carregarComentarios($conn, $IDjogo)
{
    $sql = "SELECT c.cod_cliente, cli.nome_cliente, c.cod_produto, c.cod_comentario, c.titulo_comentario,c.comentario,c.avaliacao,c.data_comentario
    FROM comentario c inner join cliente cli ON c.cod_cliente = cli.cod_cliente WHERE c.excluido = 0 AND c.cod_produto = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $IDjogo);
    $stmt->execute();

    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

    $stmt->close();
    return $result;
}

function deletarComentario($conn, $codComentario)
{
    $sql = "UPDATE comentario SET excluido = 1 WHERE cod_comentario = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $codComentario);

    $result = $stmt->execute() ? true : false;
    $stmt->close();

    return $result;
}


/*calcular a nota media do jogo */
function calculaNotaMedia($dados){
  $somaNota = 0;
  $totalAvaliacao = 0;

  foreach ($dados as $nota){
    if($nota['avaliacao']){
      $somaNota +=  $nota['avaliacao'];
      $totalAvaliacao ++;
    }
  }
  $media = ($somaNota) ? $somaNota / $totalAvaliacao : 0 ;

  return array ('TotalAvaliacao'=> $totalAvaliacao, 'notaMedia' => round($media,1));
}

