<?php
/*******************************************
 * MODEL HOME - FUNÇÕES USADAS NOS PEDIDOS
 * DESENV - Reginaldo,Renata,Thais
 *******************************************/

/**função para criar os itens na variavel Session */
function addItemCarrinho($codProduto, $qtdProduto)
{
    $Data = new DateTime();
    $carrinho= $Data->format('dmy') . rand(1, 99999) ;
    
    session_start();
    if (!isset($_SESSION['cod_carrinho'])) {
        $_SESSION['cod_carrinho'] = ($_SESSION['cod_cliente'])? "0-". $carrinho : $_SESSION['cod_cliente']."-".  $carrinho;
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


/**Finalizar o pedido do cliente e inserir os dados no banco  */
function finalizarPedido($carrinho, $valorTotal, $conn)
{
    $DtAtual = new DateTime();
    $DtEntrega = clone $DtAtual;
    $DtEntrega->modify('+15 day');
  
    session_start();
    if (isset($_SESSION['cod_cliente'])) {
        $cod_cliente = $_SESSION['cod_cliente'];
        $data_pedido = $DtAtual->format('Y-m-d');
        $data_entrega = $DtEntrega->format('Y-m-d');
        $valor_pedido = $valorTotal;
        $cod_carrinho = $carrinho;

        $cod_pedido = criarPedido($cod_cliente, $data_pedido, $data_entrega, $valor_pedido, $cod_carrinho, $conn);

        if ($cod_pedido) {
            foreach ($_SESSION['carrinho'] as $key => $cart) {
                $pedItem[] = criarPedidoitens($cod_pedido['cod_pedido'], $cart['cod_produto'], $cart['quantidade'], $conn);
                ajustarSaldoEstoque($cart['cod_produto'], $cart['quantidade'], $conn);
            }
            if (count($_SESSION['carrinho']) > count($pedItem)) {
                echo "ERRO: Ocorreu algum erro para integrar um item";
            } else {
                return true;
            }
        }
    } else {
        return false;
    }
}


/**função para criar o pedido no banco */
function criarPedido($cod_cliente, $data_pedido, $data_entrega, $valor_pedido, $cod_carrinho, $conn)
{
    $sql = "INSERT INTO pedido (cod_cliente, data_pedido , data_entrega, valor_pedido, cod_carrinho ) VALUES(?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issds", $cod_cliente, $data_pedido, $data_entrega, $valor_pedido, $cod_carrinho);
    $stmt->execute();

    if ($stmt->affected_rows) {
        $sql = "SELECT cod_pedido FROM pedido WHERE cod_carrinho = ? AND cod_cliente = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $cod_carrinho, $cod_cliente);
        $result = $stmt->execute() ? $stmt->get_result()->fetch_assoc() : false;
        $stmt->close();
        return $result;
    } else {
        $stmt->close();
        return false;
    }
}



/**função para criar os itens do pedido no banco */
function criarPedidoitens($cod_pedido, $cod_produto, $quantidade, $conn)
{
    $sql = "INSERT INTO pedido_item (cod_pedido, cod_produto, quantidade, valor_item) 
    VALUES(?,?,?,(SELECT IF(promocao = 1, valor_promocao, valor_un) AS valor_item FROM produto WHERE cod_produto =?))";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiii", $cod_pedido, $cod_produto, $quantidade, $cod_produto);
    $result = $stmt->execute() ? true : false;
    $stmt->close();

    return $result;
}


/**Função para listar as informações do pedido aberto */
function listarPedidoAberto($cod_carrinho, $cod_cliente, $conn)
{
    $sql = "SELECT p.cod_pedido, p.data_entrega, p.valor_pedido, c.nome_cliente FROM pedido p 
    INNER JOIN  cliente c ON p.cod_cliente = c.cod_cliente  WHERE p.cod_carrinho = ? AND p.cod_cliente = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $cod_carrinho, $cod_cliente);
    $result = $stmt->execute() ? $stmt->get_result()->fetch_assoc() : false;
    $stmt->close();

    return $result;
}


/** Função para ajustar o saldo de estoque */
function ajustarSaldoEstoque($cod_produto, $quantidade, $conn)
{
    // $result->fetch_row()
    $sqlSET = "SET @qdtEstoque := (SELECT estoque FROM produto WHERE cod_produto = ? )";
    $stmt = $conn->prepare($sqlSET);
    $stmt->bind_param("i", $cod_produto);
    $stmt->execute();
    
    $sql = " UPDATE produto SET estoque = (@qdtEstoque - ?) WHERE cod_produto = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $quantidade, $cod_produto);

    $result = $stmt->execute() ? true : false;

    $stmt->close();
      
    return $result;
}