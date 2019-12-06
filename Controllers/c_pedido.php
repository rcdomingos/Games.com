<?php
/*remover o warning do include e da session**/
if (!defined('SITE_URL')) {
  include_once '../config.php';
}

$conn = require SITE_PATH . '/Models/conexao.php';

/**funçoes usadas nos produtos*/
include SITE_PATH . '/Models/m_pedido.php';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

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
if (isset($itensCarrinho) && isset($_SESSION['carrinho'])) {
  foreach ($_SESSION['carrinho'] as $key => $itvalue) {
    $itensCarrinho[] = listarProdutoCarrinho($itvalue['cod_produto'], $conn) + ['quantidade' => $itvalue['quantidade']];
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

/**Finalizar o pedido de compra */
if (isset($_GET['finalizar'])) {
  if (isset($_SESSION['cod_cliente'])) {
    if (finalizarPedido($_GET['finalizar'], $_GET['total'], $conn)) {
      header("location:" . SITE_URL . "/Views/pedidos/pedidoFinalizado.php");
      exit;
    } else {
      echo "ERRO: Ocorreu um erro para finalizar o Pedido";
    }
  } else {
    header("location:" . SITE_URL . "/Views/Clientes/loginCliente.php");
    exit;
  }
}

/**Finalizar o pedido de compra */
if (isset($PedidoCriado)) {
  $PedidoCriado = listarPedidoAberto($_SESSION['cod_carrinho'], $_SESSION['cod_cliente'], $conn);
  unset($_SESSION['carrinho']);
  unset($_SESSION['cod_carrinho']);
}


/*Listar os itens em meus pedidos*/
if (isset($listaMeuspedidos)) {
  $listaMeuspedidos = listarTodosPedidosCliente($conn, $cod_cliente);
  if ($listaMeuspedidos) {
    foreach ($listaMeuspedidos as $key => $pedido) {
      if ($pedido['cod_pedido']) {
        $ListaItensMeusPedidos[$pedido['cod_pedido']] = listarTodosItensDoPedidos($conn, $pedido['cod_pedido']);
      }
    }
  }
}