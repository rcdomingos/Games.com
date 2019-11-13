<?php

/**FUNÇÃO PARA CARREGAR OS ITENS DO CARROSEL */
function carregarDestaques($conn)
{
    $sql = "SELECT cod_produto, nome_prod, descricao_prod, cover_img, banner_img FROM produto  WHERE destaque = 1 ORDER BY rand() LIMIT 4";
    $stmt = $conn->prepare($sql) ;
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $result;
}

/**FUNÇÃO PARA CARREGAR OS INTES DE SUGESTÃO DA HOME */
function carregarSugestoes($conn)
{
    $sql = "SELECT  p.cod_produto, p.nome_prod, p.descricao_prod, p.cover_img, p.precounitario, g.nome_genero, c.nome_categoria
      FROM produto p INNER JOIN genero g ON p.cod_genero = g.cod_genero INNER JOIN categoria c ON p.cod_categotia = c.cod_categoria
      WHERE p.estoque > 0 AND promocao = 0 ORDER BY rand() LIMIT 4 ";

    $stmt = $conn->prepare($sql) ;
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $result;
}

/**FUNÇÃO PARA CARREGAR OS INTES DE SUGESTÃO DA HOME */
function carregarPromocoes($conn)
{
    $sql = "SELECT  p.cod_produto, p.nome_prod, p.descricao_prod, p.cover_img, p.precounitario, p.precopromocao, g.nome_genero, c.nome_categoria
    FROM produto p INNER JOIN genero g ON p.cod_genero = g.cod_genero INNER JOIN categoria c ON p.cod_categotia = c.cod_categoria 
    WHERE p.estoque > 0 AND promocao = 1 ORDER BY rand() LIMIT 4 ";

    $stmt = $conn->prepare($sql) ;
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $result;
}
