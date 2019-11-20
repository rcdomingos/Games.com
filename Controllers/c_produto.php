<?php

include_once '../config.php';


$conn = require SITE_PATH . '/Models/conexao.php';


// var_dump($conn);
/**funçoes usadas nos produtos*/
include SITE_PATH . '/Models/m_produto.php';


/**Verificar se foi selecionado o produto para mostrar */
if (isset($DetalheProduto)) {
    if ($DetalheProduto) {
        $infoProduto = listarProduto($DetalheProduto, $conn);
    } else {
        header("location:" . SITE_URL . "/Views/home/index.php");
    }
}

/**verificar se esta na pagina todos os jogos e se teve pesquisa */
if ($jogoPesquisa) {
    $listaTodosJogos = pesquisarJogo($conn, $jogoPesquisa);
} elseif (isset($listaTodosJogos)) {
    $listaTodosJogos = carregarJogos($conn);
}

/**Listar os jogos da pagina playtation */
if (isset($listaJogosPlaystation)) {
    $listaJogosPlaystation = carregarJogosCategoria($conn, $codCategoria);
}

/**Listar os jogos da pagina xbox */
if (isset($listaJogosXbox)) {
    $listaJogosXbox = carregarJogosCategoria($conn, $codCategoria);
}

/**Listar os jogos da pagina nintendo */
if (isset($listaJogosNintendo)) {
    $listaJogosNintendo = carregarJogosCategoria($conn, $codCategoria);
}

if (isset($itensProdHome)) {
    $itensProdHome = listarprodutos($conn);
}
