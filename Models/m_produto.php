<?php
/*********************************************************
 * MODEL PRODUTO - FUNÇÕES USADAS NA PARTE DE PRODUTOS
 * DESENV - Reginaldo,Renata,Thais
 *********************************************************/

/**FUNÇÃO PARA CARREGAR OS DETALHES DO PRODUTO */
function listarProduto($produto, $conn)
{
    $sql = "SELECT  p.cod_produto, p.nome_prod, p.descricao_prod, p.cover_img,p.banner_img, p.valor_un, p.data_lancamento,  
  p.promocao,p.valor_promocao,p.estoque,g.nome_genero, c.nome_categoria FROM produto p INNER JOIN genero g 
  ON p.cod_genero = g.cod_genero INNER JOIN categoria c ON p.cod_categoria = c.cod_categoria
  WHERE p.cod_produto = ?";

    $stmt = $conn->prepare($sql) ;
    $stmt->bind_param("i", $produto);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    return $result;
}

function carregarJogos($conn)
{
    $sql = "SELECT  p.cod_produto, p.nome_prod, p.descricao_prod, p.cover_img, p.valor_un, g.nome_genero, c.nome_categoria
    FROM produto p INNER JOIN genero g ON p.cod_genero = g.cod_genero INNER JOIN categoria c ON p.cod_categoria = c.cod_categoria ";

    $stmt = $conn->prepare($sql) ;
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $result;
}


function pesquisarJogo($conn, $jogoPesquisa)
{
    $jogoPesquisa = "%". $jogoPesquisa. "%";
    $sql = "SELECT  p.cod_produto, p.nome_prod, p.descricao_prod, p.cover_img, p.valor_un, g.nome_genero, c.nome_categoria
    FROM produto p INNER JOIN genero g ON p.cod_genero = g.cod_genero INNER JOIN categoria c ON p.cod_categoria = c.cod_categoria 
    WHERE p.nome_prod LIKE ? ";

    $stmt = $conn->prepare($sql) ;
    $stmt->bind_param("s", $jogoPesquisa);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    // $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    return $result;
}
