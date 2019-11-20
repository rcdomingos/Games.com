<?php


/**função para criar os itens na variavel Session */
function addItemCarrinho($codProduto, $qtdProduto)
{
    session_start();
    if (!isset($_SESSION['cod_carrinho'])) {
        $_SESSION['cod_carrinho'] = rand(1, 99999);
    };

    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'][] = array( 'cod_produto' => $codProduto, 'quantidade' => $qtdProduto);
        return true;
    } else {
        foreach ($_SESSION['carrinho'] as $key => $value) {
            if ($value['cod_produto'] == $codProduto) {
                $_SESSION['carrinho'][$key]['quantidade'] = $value['quantidade'] + $qtdProduto;
                return true;
            }
        }
        $_SESSION['carrinho'][] = array( 'cod_produto' => $codProduto, 'quantidade' => $qtdProduto);
        return true;
    }
    return false;
}


/** Pegar as informações dos itens na base */
function listarProdutoCarrinho($produto, $conn)
{
    $sql = "SELECT p.cod_produto, p.nome_prod,  p.cover_img,p.estoque,g.nome_genero, c.nome_categoria, IF(p.promocao = 1, p.valor_promocao,p.valor_un) AS valor_prod
  FROM produto p INNER JOIN genero g ON p.cod_genero = g.cod_genero  INNER JOIN categoria c ON p.cod_categoria = c.cod_categoria
  WHERE p.cod_produto =  ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $produto);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    return $result;
}