<?php

/*remover o warning do include e da session**/
if (!defined('SITE_URL')) {
  include_once '../../config.php';
}

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$titlePage = 'Sua Loja de Games on-line';
$data_slide = 0;
require SITE_PATH . '/Controllers/c_home.php';
// print_r($itensCarrosel);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo SITE_URL ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo SITE_URL ?>/css/styles.css">
  <link rel="icon" href="<?php echo SITE_URL ?>/favicon.ico" type="image/x-icon">
  <title>
    Games.com | <?php echo $titlePage; ?>
  </title>
</head>

<body>
<!-- menu do site -->
<?php include SITE_PATH . '/includes/menu.php'; ?>
<!--conteudo da pagina -->
<section class="destaques">
  <div id="carroselDestaques" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carroselDestaques" data-slide-to="0" class="active"></li>
      <?php
      foreach ($itensCarrosel as $itemLista) {
        $data_slide++ ?>
        <li data-target="#carroselDestaques" data-slide-to="<?php echo $data_slide ?>"></li>
        <?php
      } ?>
    </ol>
    <div id="listaItensCarrosel" class="carousel-inner">
      <!-- item padrão do site -->
      <div class="carousel-item active"
           style="background-image: url('<?php echo SITE_URL ?>/images/bannerSiteGames.jpg');">
        <!-- <img class="d-block w-100" src="<?php echo SITE_URL ?>/images/bannerSiteGames.jpg"
          alt="Primeiro Slide"> -->
        <div class="carousel-caption d-none d-md-block texto-carrosel">
          <h5 class="ft-laranja">Fazendo seu Jogo Melhor</h5>
          <p>Os melhores jogos você encotra na Games.com</p>
        </div>
      </div>
      <!-- itens de produtos -->
      <?php foreach ($itensCarrosel as $itemLista) { ?>
        <div class="carousel-item"
             style="background-image: url('<?php echo SITE_URL ?>/images/produtos/<?php echo $itemLista['banner_img'] ?>');">
          <div class="carousel-caption d-md-block texto-carrosel">
            <h5 class="ft-laranja"><?php echo $itemLista['nome_prod'] ?>
            </h5>
            <p><?php echo $itemLista['descricao_prod'] ?>
            </p>
            <a href="<?php echo SITE_URL ?>/Views/produtos/detalhe.php?jogo=<?php echo $itemLista['cod_produto'] ?>"
               class="btn btn-outline-light">Confira</a>
          </div>
        </div>

      <?php } ?>

    </div>
    <!-- controle do carrosel  -->
    <a class="carousel-control-prev" href="#carroselDestaques" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carroselDestaques" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Próximo</span>
    </a>
  </div>
</section>

<!-- section de Destaques -->
<section>
  <div class="container mt-5">
    <div class="row">
      <div class="col">
        <div class="tt-header-wrap">
          <div class="tt-header">
            <h2>Sugestões</h2>
            <p>Confira as nossas sugestões dos jogos que estão bombando no momento:</p>
          </div>
        </div>
      </div>
    </div>

    <?php if ($listaSugestao) { ?>
      <div class="row justify-content-center">
        <?php foreach ($listaSugestao as $itemSugestao) { ?>
          <div class="col-sm-3 col-10 mt-2">
            <a href="<?php echo SITE_URL ?>/Views/produtos/detalhe.php?jogo=<?php echo $itemSugestao['cod_produto'] ?>"
               class="linkCardsGames">
              <div class="card text-center border-0 card-jogo">
                <div class="card-header border-0 bg-transparent">
                  <h5 class="card-title text-uppercase">
                    <?php echo $itemSugestao['nome_prod'] ?>
                  </h5>
                  <p class="mt-n3"><?php echo $itemSugestao['nome_categoria'] ?>
                  </p>
                </div>
                <img class="card-img-top px-4 img-cover"
                     src="<?php echo SITE_URL ?>/images/produtos/<?php echo $itemSugestao['cover_img'] ?>"
                     alt="Cover: <?php echo $itemSugestao['nome_prod'] ?>">
                <div class="card-body">
                  <p class="card-text">Jogo de <?php echo $itemSugestao['nome_genero'] ?>
                  </p>
                  <p class="card-text mt-n3"><small class="text-muted">Por Apenas</small></p>
                  <p class="card-text h2 font-weight-bold"><small>R$
                    </small><?php echo number_format($itemSugestao['valor_un'], 2, ',', '.') ?>
                  </p>
                </div>
                <div class="card-footer border-0 bg-transparent">
                  <a
                    href="<?php echo SITE_URL ?>/Controllers/c_pedido.php?addProduto=<?php echo $itemSugestao['cod_produto'] ?>"
                    class="btn btn-dark btn-block btn-comprar">Comprar</a>
                </div>
              </div>
            </a>
          </div>
        <?php } ?>
      </div>

    <?php } else {
      /**Carregar a pagina de erro quando não tiver produto cadastrado */
      include SITE_PATH . '/includes/erroCarregarProduto.php';
    } ?>

  </div>
</section>

<!-- section com informções do site -->
<section>
  <div class="jumbotron jumbotron-fluid bk-escuro mt-5">
    <div class="container ">
      <h2 class="display-4 ft-laranja">Os melhores Jogos</h2>
      <p class="lead ft-branca">Na Games.com você encontra os últimos lançamentos, clássicos para o seu Playstation,
        Xbox ou Nintendo!</p>
    </div>
  </div>
</section>

<!-- Section das promoções do site -->
<section>
  <div class="container mt-5">
    <div class="row">
      <div class="col">
        <div class="tt-header-wrap">
          <div class="tt-header">
            <h2>Promoções</h2>
            <p>Quer um jogo novo mas esta sem grana? Não tem problema, temos algumas promoções para você:</p>
          </div>
        </div>
      </div>
    </div>
    <?php if ($listaPromocoes) { ?>
      <div class="row justify-content-center">
        <!-- listando os itens da promoção -->
        <?php foreach ($listaPromocoes as $itemPromocao) { ?>
          <div class="col-sm-3 col-10 mt-2">
            <a href="<?php echo SITE_URL ?>/Views/produtos/detalhe.php?jogo=<?php echo $itemPromocao['cod_produto'] ?>"
               class="linkCardsGames">
              <div class="card text-center border-0 card-jogo">
                <div class="card-header border-0 bg-transparent">
                  <h5 class="card-title text-uppercase">
                    <?php echo $itemPromocao['nome_prod'] ?>
                  </h5>
                  <p class="mt-n3"><?php echo $itemPromocao['nome_categoria'] ?>
                  </p>
                </div>
                <img class="card-img-top px-4 img-cover"
                     src="<?php echo SITE_URL ?>/images/produtos/<?php echo $itemPromocao['cover_img'] ?>"
                     alt="Cover: <?php echo $itemPromocao['nome_prod'] ?>">
                <div class="card-body">
                  <p class="card-text">Jogo de <?php echo $itemPromocao['nome_genero'] ?>
                  </p>
                  <p class="card-text mt-n3"><small class="text-muted">De</small></p>
                  <p class="card-text mt-n4 "><small>R$ </small>
                    <?php echo number_format($itemPromocao['valor_un'], 2, ',', '.') ?>
                  </p>
                  <p class="card-text"><small class="text-muted">Por Apenas</small></p>
                  <p class="card-text h2 mt-n3 font-weight-bold "><small>R$
                    </small><?php echo number_format($itemPromocao['valor_promocao'], 2, ',', '.') ?>
                  </p>
                </div>
                <div class="card-footer border-0 bg-transparent">
                  <a
                    href="<?php echo SITE_URL ?>/Controllers/c_pedido.php?addProduto=<?php echo $itemPromocao['cod_produto'] ?>"
                    class="btn btn-dark btn-block btn-comprar">Comprar</a>
                </div>
              </div>
            </a>
          </div>
        <?php } ?>
      </div>
    <?php } else {
      /**Carregar a pagina de erro quando não tiver produto cadastrado */
      include SITE_PATH . '/includes/erroCarregarProduto.php';
    } ?>
  </div>
</section>

<!-- section com link para lançamentos -->
<section>
  <div class="jumbotron jumbotron-fluid bk-escuro mt-5">
    <div class="container ">
      <div class="col">
        <h2 class="display-4 ft-laranja">Lançamentos</h2>
        <p class="lead ft-branca">Não perca nada, Fique de olho em todos os lançamentos dos jogos mais aguardados do
          momento</p>
        <a href="<?php echo SITE_URL ?>/Views/home/jogosLancamentos.php"
           class="mx-auto btn btn-dark btn-comprar">Conferir</a>
      </div>
    </div>
  </div>
</section>

<!-- footer site -->
<?php include SITE_PATH . '/includes/footer.php'; ?>
<!-- script bootstrap -->
<script src="<?php echo SITE_URL ?>/js/jquery-3.4.1.min.js">
</script>
<script src="<?php echo SITE_URL ?>/js/bootstrap.min.js">
</script>

</body>

</html>