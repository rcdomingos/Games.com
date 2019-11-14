<?php
$conf = include $_SERVER['DOCUMENT_ROOT'] . '/Games.com/config.php';
$conn = require $conf['path'] . '/Models/conexao.php';

// var_dump($conn);
/**funçoes usadas nos produtos*/
include $conf['path'] . '/Models/m_produto.php';


/**Verificar se foi selecionado o produto para mostrar */
if (isset($DetalheProduto)) {
    if ($DetalheProduto) {
        $infoProduto = listarProduto($DetalheProduto, $conn);
    } else {
        header("location:$conf[url]/Views/home/index.php");
    }
}