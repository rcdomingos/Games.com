<?php
/*remover o warning do include e da session**/
if (!defined('SITE_URL')) {
  include_once '../config.php';
}

$conn = require SITE_PATH . '/Models/conexao.php';

include SITE_PATH . '/Models/m_favorito.php';

date_default_timezone_set('UTC');

/*adicionar o jogo como favorito*/
if (isset($_GET['add_favorito_jogo'])) {
  $cod_produto = $_GET['add_favorito_jogo'];
  $cod_ciente = $_GET['idcliente'];
  $data_inclusao = date('Y-m-d');

  $dados = array('cod_produto' => $cod_produto, 'cod_ciente' => $cod_ciente, 'data_inclusao' => $data_inclusao);
  if ($cod_ciente) {
    if (cadastrarJogoFavorito($conn, $dados)) {
      header("location:" . SITE_URL . "/Views/produtos/detalhe.php?jogo=$cod_produto");
      exit;
    } else {
      $msgErro = "Ocorreu um erro para adcionar o jogo como favorito, tente novamente";
      header("location:" . SITE_URL . "/Views/home/PaginaErro.php?erro=$msgErro");
    }
  } else {
    $msgErro = "É necessario estar logado no site para poder adicionar o jogo como favorito, entre com sua conta";
    header("location:" . SITE_URL . "/Views/home/PaginaErro.php?erro=$msgErro");
  }
}


/*verificar se o jogo ja foi adicionado nos favoritos */
if (isset($clienteLogado) and $clienteLogado) {
  $jogoNosFavorito = consultarJogoFavorito($conn, $DetalheProduto, $clienteLogado);
}


/*remove o jogo do favoritos */
if (isset($_GET['rm_favorito_jogo'])) {
  $cod_produto = $_GET['rm_favorito_jogo'];
  $cod_ciente = $_GET['idcliente'];

  $dados = array('cod_produto' => $cod_produto, 'cod_ciente' => $cod_ciente);

  if ($cod_ciente) {
    if (removerJogoFavorito($conn, $dados)) {
      header("location:" . SITE_URL . "/Views/produtos/detalhe.php?jogo=$cod_produto");
      exit;
    } else {
      $msgErro = "Ocorreu um erro para remover o jogo dos seus favorito, tente novamente";
      header("location:" . SITE_URL . "/Views/home/PaginaErro.php?erro=$msgErro");
    }
  } else {
    $msgErro = "É necessario estar logado no site para poder remover o jogo como favorito, entre com sua conta";
    header("location:" . SITE_URL . "/Views/home/PaginaErro.php?erro=$msgErro");
  }

}

if (isset($listaJogosFavoritos) and ($clienteFavorito)) {
  $listaJogosFavoritos = listarTodosFavoritos($conn, $clienteFavorito);
}