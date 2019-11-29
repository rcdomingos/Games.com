<?php
$conf = include $_SERVER['DOCUMENT_ROOT'] . '/Games.com/config.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo $conf['url'] ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $conf['url'] ?>/css/styles.css">

  <title>Games.com</title>
</head>

<body>
  <!-- menu do site -->
  <?php include $conf['path'].'/includes/menu.php';?>
  <!--conteudo da pagina -->
  <section class="destaques">
    <div id="carroselDestaques" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carroselDestaques" data-slide-to="0" class="active"></li>
        <li data-target="#carroselDestaques" data-slide-to="1"></li>
        <li data-target="#carroselDestaques" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="<?php echo $conf['url'] ?>/images/produtos/destaque.png" alt="Primeiro Slide">
          <div class="carousel-caption d-none d-md-block">
            <h5>Destaques</h5>
            <p>Os melhores jogos você encotra na Games.com</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block  w-100" src="<?php echo $conf['url'] ?>/images/produtos/destaque.png" alt="Segundo Slide">
        </div>
        <div class="carousel-item">
          <img class="d-block  w-100" src="<?php echo $conf['url'] ?>/images/produtos/destaque.png"
            alt="Terceiro Slide">
        </div>
      </div>
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
          <h2>Destaques</h2>
          <div class="card-deck mt-2">

            <div class="card text-center border-0 card-home">
              <div class="card-header border-0 bg-transparent">
                <h5 class="card-title text-uppercase h4">Grid - PS4</h5>
              </div>
              <img class="card-img-top px-5" src="<?php echo $conf['url'] ?>/images/produtos/grid-ps4.jpg"
                alt="Grid PS4">
              <div class="card-body">
                <p class="card-text">Jogo de Corrida</p>
                <p class="card-text mt-n3"><small class="text-muted">Por Apenas</small></p>
                <p class="card-text h2 font-weight-bold">R$ 129,90</p>
              </div>
              <div class="card-footer border-0 bg-transparent">
                <a href="#" class="btn btn-dark btn-block btn-comprar">Comprar</a>
              </div>
            </div>

            <div class="card text-center border-0 card-home">
              <div class="card-header border-0 bg-transparent">
                <h5 class="card-title text-uppercase h4">Grid - PS4</h5>
              </div>
              <img class="card-img-top px-5" src="<?php echo $conf['url'] ?>/images/produtos/grid-ps4.jpg"
                alt="Grid PS4">
              <div class="card-body">
                <p class="card-text">Jogo de Corrida</p>
                <p class="card-text mt-n3"><small class="text-muted">Por Apenas</small></p>
                <p class="card-text h2 font-weight-bold">R$ 129,90</p>
              </div>
              <div class="card-footer border-0 bg-transparent">
                <a href="#" class="btn btn-dark btn-block btn-comprar">Comprar</a>
              </div>
            </div>

            <div class="card text-center border-0 card-home">
              <div class="card-header border-0 bg-transparent">
                <h5 class="card-title text-uppercase h4">Grid - PS4</h5>
              </div>
              <img class="card-img-top px-5" src="<?php echo $conf['url'] ?>/images/produtos/grid-ps4.jpg"
                alt="Grid PS4">
              <div class="card-body">
                <p class="card-text">Jogo de Corrida</p>
                <p class="card-text mt-n3"><small class="text-muted">Por Apenas</small></p>
                <p class="card-text h2 font-weight-bold">R$ 129,90</p>
              </div>
              <div class="card-footer border-0 bg-transparent">
                <a href="#" class="btn btn-dark btn-block btn-comprar">Comprar</a>
              </div>
            </div>

            <div class="card text-center border-0 card-home">
              <div class="card-header border-0 bg-transparent">
                <h5 class="card-title text-uppercase h4">Grid - PS4</h5>
              </div>
              <img class="card-img-top px-5" src="<?php echo $conf['url'] ?>/images/produtos/grid-ps4.jpg"
                alt="Grid PS4">
              <div class="card-body">
                <p class="card-text">Jogo de Corrida</p>
                <p class="card-text mt-n3"><small class="text-muted">Por Apenas</small></p>
                <p class="card-text h2 font-weight-bold">R$ 129,90</p>
              </div>
              <div class="card-footer border-0 bg-transparent">
                <a href="#" class="btn btn-dark btn-block btn-comprar">Comprar</a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- section com informções do site -->
  <section>
    <div class="jumbotron jumbotron-fluid bk-escuro">
      <div class="container ">
        <h2 class="display-4 ft-laranja">Os melhores Jogos</h2>
        <p class="lead ft-branca">Na Games.com você encontra os últimos lançamentos, clássicos para o seu Playstation,
          Xbox ou
          Nintendo!</p>
      </div>
    </div>

  </section>

  <!-- Section das promoções do site -->
  <section>
    <div class="container mt-5">
      <div class="row">
        <div class="col">
          <h2>Promoções</h2>
          <div class="card-deck mt-2">

            <div class="card text-center border-0 card-home">
              <div class="card-header border-0 bg-transparent">
                <h5 class="card-title text-uppercase h4">Grid - PS4</h5>
              </div>
              <img class="card-img-top px-5" src="<?php echo $conf['url'] ?>/images/produtos/grid-ps4.jpg"
                alt="Grid PS4">
              <div class="card-body">
                <p class="card-text">Jogo de Corrida</p>
                <p class="card-text mt-n3"><small class="text-muted">De</small></p>
                <p class="card-text mt-n4 ">R$ 159,90</p>
                <p class="card-text"><small class="text-muted">Por Apenas</small></p>
                <p class="card-text h2 mt-n3 font-weight-bold ">R$ 129,90</p>
              </div>
              <div class="card-footer border-0 bg-transparent">
                <a href="#" class="btn btn-dark btn-block btn-comprar">Comprar</a>
              </div>
            </div>

            <div class="card text-center border-0 card-home">
              <div class="card-header border-0 bg-transparent">
                <h5 class="card-title text-uppercase h4">Grid - PS4</h5>
              </div>
              <img class="card-img-top px-5" src="<?php echo $conf['url'] ?>/images/produtos/grid-ps4.jpg"
                alt="Grid PS4">
              <div class="card-body">
                <p class="card-text">Jogo de Corrida</p>
                <p class="card-text mt-n3"><small class="text-muted">De</small></p>
                <p class="card-text mt-n4 ">R$ 159,90</p>
                <p class="card-text"><small class="text-muted">Por Apenas</small></p>
                <p class="card-text h2 mt-n3 font-weight-bold ">R$ 129,90</p>
              </div>
              <div class="card-footer border-0 bg-transparent">
                <a href="#" class="btn btn-dark btn-block btn-comprar">Comprar</a>
              </div>
            </div>

            <div class="card text-center border-0 card-home">
              <div class="card-header border-0 bg-transparent">
                <h5 class="card-title text-uppercase h4">Grid - PS4</h5>
              </div>
              <img class="card-img-top px-5" src="<?php echo $conf['url'] ?>/images/produtos/grid-ps4.jpg"
                alt="Grid PS4">
              <div class="card-body">
                <p class="card-text">Jogo de Corrida</p>
                <p class="card-text mt-n3"><small class="text-muted">De</small></p>
                <p class="card-text mt-n4 ">R$ 159,90</p>
                <p class="card-text"><small class="text-muted">Por Apenas</small></p>
                <p class="card-text h2 mt-n3 font-weight-bold ">R$ 129,90</p>
              </div>
              <div class="card-footer border-0 bg-transparent">
                <a href="#" class="btn btn-dark btn-block btn-comprar">Comprar</a>
              </div>
            </div>

            <div class="card text-center border-0 card-home">
              <div class="card-header border-0 bg-transparent">
                <h5 class="card-title text-uppercase h4">Grid - PS4</h5>
              </div>
              <img class="card-img-top px-5" src="<?php echo $conf['url'] ?>/images/produtos/grid-ps4.jpg"
                alt="Grid PS4">
              <div class="card-body">
                <p class="card-text">Jogo de Corrida</p>
                <p class="card-text mt-n3"><small class="text-muted">De</small></p>
                <p class="card-text mt-n4 ">R$ 159,90</p>
                <p class="card-text"><small class="text-muted">Por Apenas</small></p>
                <p class="card-text h2 mt-n3 font-weight-bold ">R$ 129,90</p>
              </div>
              <div class="card-footer border-0 bg-transparent">
                <a href="#" class="btn btn-dark btn-block btn-comprar">Comprar</a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- footer site -->
  <?php include $conf['path'].'/includes/footer.php';?>
  <!-- script bootstrap -->
  <script src="<?php echo $conf['url'] ?>/js/jquery-3.4.1.min.js">
  </script>
  <script src="<?php echo $conf['url'] ?>/js/bootstrap.min.js">
  </script>
</body>

</html>