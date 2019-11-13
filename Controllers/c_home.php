<?php
$conf = include $_SERVER['DOCUMENT_ROOT'] . '/Games.com/config.php';
$conn = require $conf['path'] . '/Models/conexao.php';

// var_dump($conn);
/**funçoes usadas na home */
include $conf['path'] . '/Models/m_home.php';

/**itens do carrosel */
$itensCarrosel = carregarDestaques($conn);
// print_r($itensCarrosel);

/**itens de sugestão */
$listaSugestao = carregarSugestoes($conn);
// print_r($itensSugestao);

/**Itens na promoção */
$listaPromocoes = carregarPromocoes($conn);
// print_r($listaPromocoes);