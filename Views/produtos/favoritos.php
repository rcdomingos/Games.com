<?php
/*remover o warning do include e da session**/
if (!defined('SITE_URL')) {
  include_once '../../config.php';
}

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['cod_cliente'])) {
  header("location:" . SITE_URL . "/Views/Clientes/loginCliente.php");
  exit;
}

$titlePage = "Meus Favoritos";

$listaJogosFavoritos = array();
$clienteFavorito = isset($_SESSION['cod_cliente']) ? $_SESSION['cod_cliente'] : false;
require SITE_PATH . '/Controllers/c_favorito.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo SITE_URL ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo SITE_URL ?>/css/styles.css">

  <title>
    Games.com | <?php echo $titlePage; ?>
  </title>
</head>

<body>
<!-- menu do site -->
<?php include SITE_PATH . '/includes/menu.php'; ?>

<!--conteudo da pagina -->
<main class="min-h-60 mx-4">
  <section>
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="tt-header-wrap">
            <div class="tt-header">
              <h1>Favoritos</h1>
              <p>Adicione seu jogo como favorito para não perder aquela promoção</p>
            </div>
          </div>
        </div>
      </div>
      <?php if ($listaJogosFavoritos) { ?>
        <div class="row justify-content-center px-4">
          <?php foreach ($listaJogosFavoritos as $itemFavorito) { ?>

            <div class="col-sm-6 col-md-4 col-12 mt-2 lista-favoritos">
              <div class="card text-center border-0 card-jogo">
                <div class="card-header border-0 bg-transparent">
                  <div class="text-right ico-favoritos">
                    <a class="link-none text-right ft-laranja"
                       href="<?php echo SITE_URL ?>/Controllers/c_favorito.php?idcliente=<?php echo $clienteFavorito ?>&rm_favorito_jogo=<?php echo $itemFavorito['cod_produto'] ?>">
                      <span class="ft-laranja">Remover dos Favoritos</span>
                      <img src="<?php echo SITE_URL ?>/images/icones/remover-favorito.svg"
                           alt="Remover dos Favoritos" title="Remover dos Favoritos"></a>
                  </div>
                </div>
                <a class="linkCardsGames"
                   href="<?php echo SITE_URL ?>/Views/produtos/detalhe.php?jogo=<?php echo $itemFavorito['cod_produto'] ?>">
                  <img class=" img-favorito mx-auto"
                       src="<?php echo SITE_URL ?>/images/produtos/<?php echo $itemFavorito['cover_img'] ?>"
                       alt="Cover: ">
                  <div class="card-body">
                    <h5 class="card-title text-uppercase mt-n2">
                      <?php echo $itemFavorito['nome_prod'] . " " . $itemFavorito['nome_categoria'] ?>
                    </h5>
                    <p class="card-text"><small class="text-muted">Adicionado na lista
                        em </small><?php echo date("d-m-Y", strtotime($itemFavorito['data_inclusao'])) ?></p>
                    <p class="card-text mt-n3"><small class="text-muted">Valor Atual
                        R$ </small><?php echo $itemFavorito['valor_prod'] ?></p>
                  </div>
                </a>
              </div>
            </div>
          <?php } ?>
        </div>
      <?php } else {
        /**Carregar a pagina de erro quando não tiver produto cadastrado */
        include SITE_PATH . '/includes/erroCarregarProduto.php';
      } ?>

    </div>
  </section>
</main>

<!-- footer site -->
<?php include SITE_PATH . '/includes/footer.php'; ?>
</body>

</html>