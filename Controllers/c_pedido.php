<?php

include_once '../config.php';

$conn = require SITE_PATH . '/Models/conexao.php';

/**funçoes usadas nos produtos*/
include SITE_PATH . '/Models/m_pedido.php';


// adicionar o item no carrinho
if (isset($_GET['addProduto'])) {
    $codProduto = $_GET['addProduto'];
    $qtdProduto = 1;

    if (addItemCarrinho($codProduto, $qtdProduto)) {
        header("location:" . SITE_URL . "/Views/pedidos/carrinho.php");
    }
    exit;
}

// listar os itens na pagina carrinho
if (isset($itensCarrinho)) {
    foreach ($_SESSION['carrinho'] as $key => $itvalue) {
        $itensCarrinho[] = listarProdutoCarrinho($itvalue['cod_produto'], $conn) + ['quantidade' => $itvalue['quantidade']] ;
    }
}

//remover os itens do carrinho de compra
if (isset($_GET['remItem'])) {
    foreach ($_SESSION['carrinho'] as $key => $itvalue) {
        if ($itvalue['cod_produto'] == $_GET['remItem']) {
            unset($_SESSION['carrinho'][$key]);
            header("location:" . SITE_URL . "/Views/pedidos/carrinho.php");
            exit;
        }
    }
}


if (isset($_GET['finalizar'])) {
    session_start();
    foreach ($_SESSION['carrinho'] as $key => $itvalue) {
        print_r($itvalue);
        echo $_GET['finalizar'];
        echo "<br>";
    }
}


// session_destroy();