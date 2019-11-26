<?php
include_once '../config.php';

$conn = require SITE_PATH . '/Models/conexao.php';

// var_dump($conn);
/**funçoes usadas na home */
include SITE_PATH . '/Models/m_home.php';

if (isset($data_slide)) {
    /**itens do carrosel */
    $itensCarrosel = carregarDestaques($conn);
    // print_r($itensCarrosel);

    /**itens de sugestão */
    $listaSugestao = carregarSugestoes($conn);
    // print_r($itensSugestao);

    /**Itens na promoção */
    $listaPromocoes = carregarPromocoes($conn);
    // print_r($listaPromocoes);
}