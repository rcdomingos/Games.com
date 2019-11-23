<?php
include_once '../../config.php';

$listaJogosPlaystation =[];
$codCategoria = 1; /** 1-Plastation */
$limit = 12;/** quantidade de jogo por pagina */
$Nextpg = (isset($_GET['page']))? ($_GET['page'] + 1) : 1;
$Prevpg = (isset($_GET['page']) && $Nextpg > 1)? ($_GET['page'] - 1) : 0;
$offset = (isset($_GET['page']))? ($_GET['page'] * 16) : 0;


require SITE_PATH .'/Controllers/c_produto.php';

$titlePage = "Jogos Playstation";

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
    Games.com | <?php echo $titlePage ;?>
  </title>
</head>

<body>
  <!-- menu do site -->
  <?php include SITE_PATH .'/includes/menu.php';?>
  <!--conteudo da pagina -->

  <!-- header da pagina -->
  <header>
    <div class="imagem-principal-playstation">
      <div class="caixa-playstation">
        <h1 class="display-playstation">Jogos PlayStation</h1>
        <h4 class="display-playstation-2">Aqui você encontra todos os jogos que procura!</h4>
      </div>
    </div>
  </header>
  <main>
    <!-- section com a lista dos jogos  -->
    <section>
      <div class="container mt-5">
        <div class="row">
          <?php foreach ($listaJogosPlaystation as $jogo) { ?>
          <div class="col-sm-3 mb-3">
            <a href="<?php echo SITE_URL ?>/Views/produtos/detalhe.php?jogo=<?php echo $jogo['cod_produto']?>"
              class="linkCardsGames">
              <div class="card text-center border-0 card-jogo">
                <div class="card-header border-0 bg-transparent">
                  <h5 class="card-title text-uppercase">
                    <?php echo $jogo['nome_prod']?>
                  </h5>
                  <p class="text-muted mt-n3"><?php echo $jogo['nome_categoria']  ?>
                  </p>
                </div>
                <img class="card-img-top px-5 img-cover"
                  src="<?php echo SITE_URL  ?>/images/produtos/<?php echo $jogo['cover_img']?>"
                  alt="Cover: <?php echo $jogo['nome_prod']?>">
                <div class="card-body">
                  <p class="card-text">Jogo de <?php echo $jogo['nome_genero']?>
                  </p>
                  <p class="card-text mt-n3"><small class="text-muted">Por Apenas</small></p>
                  <p class="card-text h2 font-weight-bold"><small>R$ </small><?php echo number_format($jogo['valor_un'], 2, ',', '.') ?>
                  </p>
                </div>
                <div class="card-footer border-0 bg-transparent">
                  <a href="<?php echo SITE_URL ?>/Controllers/c_pedido.php?addProduto=<?php echo $jogo['cod_produto']?>"
                    class="btn btn-dark btn-block btn-comprar">Comprar</a>
                </div>
              </div>
            </a>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>
    <!-- menu de navegação das paginas -->
    <nav aria-label="Navegação de página exemplo">
      <ul class="pagination justify-content-center ">
        <li class="page-item <?php if ($Nextpg == 1) {
    echo 'disabled';
}  ?>">
          <a class="page-link bk-escuro ft-branca" href="./playstation.php?page=<?php echo $Prevpg?>">Anterior</a>
        </li>
        <li class="page-item <?php if (count($listaJogosPlaystation) < $limit) {
    echo 'disabled';
}  ?>">
          <a class="page-link bk-escuro ft-branca" href="./playstation.php?page=<?php echo $Nextpg ?>">Próximo</a>
        </li>
      </ul>
    </nav>
  </main>

  <!-- footer site -->
  <?php include SITE_PATH .'/includes/footer.php';?>
</body>

</html>