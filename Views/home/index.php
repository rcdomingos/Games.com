<?php

include_once '../../config.php';

require SITE_PATH .'/Controllers/c_home.php';
$data_slide = 0;
$titlePage = "Sua Loja de Games on-line";
// print_r($itensCarrosel);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet"
    href="<?php echo SITE_URL ?>/css/bootstrap.min.css">
  <link rel="stylesheet"
    href="<?php echo SITE_URL ?>/css/styles.css">
  <title>
    Games.com | <?php echo $titlePage ;?>
  </title>
</head>

<body>
  <!-- menu do site -->
  <?php include SITE_PATH.'/includes/menu.php';?>
  <!--conteudo da pagina -->
  <section class="destaques">
    <div id="carroselDestaques" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carroselDestaques" data-slide-to="0" class="active"></li>
        <?php foreach ($itensCarrosel as $itemLista) {
    $data_slide++ ?>
        <li data-target="#carroselDestaques"
          data-slide-to="<?php echo $data_slide?>"></li>
        <?php
}; ?>
      </ol>
      <div class="carousel-inner">
        <!-- item padrão do site -->
        <div class="carousel-item active">
          <img class="d-block w-100"
            src="<?php echo SITE_URL ?>/images/produtos/destaque.png"
            alt="Primeiro Slide">
          <div class="carousel-caption d-none d-md-block">
            <h5>Destaques</h5>
            <p>Os melhores jogos você encotra na Games.com</p>
          </div>
        </div>
        <!-- itens de produtos -->
        <?php foreach ($itensCarrosel as $itemLista) { ?>
        <div class="carousel-item">
          <img class="d-block  w-100 img-fluid"
            src="<?php echo SITE_URL ?>/images/produtos/<?php echo $itemLista['banner_img']?>"
            alt="Imagem: <?php echo $itemLista['nome_prod']?>">
          <div class="carousel-caption d-none d-md-block">
            <h5><?php echo $itemLista['nome_prod']?>
            </h5>
            <p><?php echo $itemLista['descricao_prod']?>
            </p>
            <a href="<?php echo SITE_URL ?>/Views/produtos/detalhe.php?jogo=<?php echo $itemLista['cod_produto']?>"
              class="btn btn-outline-dark">Confira</a>
          </div>
        </div>

        <?php }; ?>

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
          <div class="card-deck mt-2">
            <?php foreach ($listaSugestao as $itemSugestao) { ?>

            <div class="card text-center border-0 card-jogo">
              <div class="card-header border-0 bg-transparent">
                <h5 class="card-title text-uppercase">
                  <?php echo $itemSugestao['nome_prod'] ." - " . $itemSugestao['nome_categoria']  ?>
                </h5>
              </div>
              <img class="card-img-top px-3 img-cover"
                src="<?php echo SITE_URL  ?>/images/produtos/<?php echo $itemSugestao['cover_img']?>"
                alt="Cover: <?php echo $itemSugestao['nome_prod']?>">
              <div class="card-body">
                <p class="card-text">Jogo de <?php echo $itemSugestao['nome_genero']?>
                </p>
                <p class="card-text mt-n3"><small class="text-muted">Por Apenas</small></p>
                <p class="card-text h2 font-weight-bold"><small>R$ </small><?php echo $itemSugestao['valor_un']?>
                </p>
              </div>
              <div class="card-footer border-0 bg-transparent">
                <a href="<?php echo SITE_URL ?>/Views/produtos/detalhe.php?jogo=<?php echo $itemSugestao['cod_produto']?>"
                  class="btn btn-dark btn-block btn-comprar">Comprar</a>
              </div>
            </div>

            <?php }; ?>

          </div>
        </div>
      </div>
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
          <div class="card-deck mt-2">

            <!-- listando os itens da promoção -->
            <?php foreach ($listaPromocoes as $itemPromocao) { ?>
            <div class="card text-center border-0 card-jogo">
              <div class="card-header border-0 bg-transparent">
                <h5 class="card-title text-uppercase">
                  <?php echo $itemPromocao['nome_prod'] ." - " . $itemPromocao['nome_categoria']  ?>
                </h5>
              </div>
              <img class="card-img-top px-3 img-cover"
                src="<?php echo SITE_URL  ?>/images/produtos/<?php echo $itemPromocao['cover_img']?>"
                alt="Cover: <?php echo $itemPromocao['nome_prod']?>">
              <div class="card-body">
                <p class="card-text">Jogo de <?php echo $itemPromocao['nome_genero']?>
                </p>
                <p class="card-text mt-n3"><small class="text-muted">De</small></p>
                <p class="card-text mt-n4 "><small>R$ </small> <?php echo $itemPromocao['valor_un']?>
                </p>
                <p class="card-text"><small class="text-muted">Por Apenas</small></p>
                <p class="card-text h2 mt-n3 font-weight-bold "><small>R$
                  </small><?php echo $itemPromocao['valor_promocao']?>
                </p>
              </div>
              <div class="card-footer border-0 bg-transparent">
                <a href="<?php echo SITE_URL  ?>/Views/produtos/detalhe.php?jogo=<?php echo $itemSugestao['cod_produto']?>"
                  class="btn btn-dark btn-block btn-comprar">Comprar</a>
              </div>
            </div>

            <?php }; ?>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- footer site -->
  <?php include SITE_PATH .'/includes/footer.php';?>
  <!-- script bootstrap -->
  <script src="<?php echo SITE_URL ?>/js/jquery-3.4.1.min.js">
  </script>
  <script src="<?php echo SITE_URL ?>/js/bootstrap.min.js">
  </script>
</body>

</html>