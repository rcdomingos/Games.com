<?php

include_once '../../config.php';
session_start();

$DetalheProduto = $_GET['jogo'];

require SITE_PATH .'/Controllers/c_produto.php';

/**Titulo da pagina mudar de acordo com a pagina rederenciada */
$titlePage =  "Jogo " . $infoProduto['nome_prod'];
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
  <main>
    <div class="container">

      <div class="row">
        <div class="col-12 col-md-6 mb-5">
          <img src="<?php echo SITE_URL ?>/images/produtos/<?php echo $infoProduto['cover_img']?>"
            class="img-fluid img-detalhe" alt="Capa do jogo <?php echo $infoProduto['nome_prod']?>">
        </div>
        <div class="col-12 col-md-5 align-self-center">
          <!-- link para adicionar o jogo aos favoritos -->
          <a class="text-right" href="#?idcliente=1&cod_jogo=23">
            <img class="text-right ico-favoritos" src="<?php echo SITE_URL ?>/images/icones/add-favoritos.svg"
              alt="Adicionar a Favoritos" title="Adicionar aos Favoritos">
          </a>
          <!-- card com a opção de comprar -->
          <div class="card box-detalhe-jogo p-2 bk-escuro mt-1">
            <div class="card-body text-center">
              <h1 class="card-title h3 text-uppercase ft-branca">Jogo
                <?php echo $infoProduto['nome_prod'] ."-" . $infoProduto['nome_categoria']?>
              </h1>
              <?php if ($infoProduto['promocao']) { ?>
              <p class="card-text ft-laranja">Promoção de: <s>R$ <?php echo $infoProduto['valor_un']?></s>
              </p>
              <p class="card-text"><small class="text-muted">Por Apenas</small></p>
              <p class="card-text h2 mt-n3 ft-laranja"><small>R$</small>
                <?php echo number_format($infoProduto['valor_promocao'], 2, ',', '.') ?>
              </p>
              <?php } else {?>
              <p class="card-text pt-2"><small class="text-muted">Por Apenas</small></p>
              <p class="card-text h2 mt-n3 ft-laranja"><small>R$</small>
                <?php echo number_format($infoProduto['valor_un'], 2, ',', '.')?>
              </p>
              <?php } ?>
              <p class="card-text ft-branca">Em Estoque: <?php echo $infoProduto['estoque']?>
              </p>
            </div>
            <div class="card-footer border-0 bg-transparent">
              <a href="<?php echo SITE_URL ?>/Controllers/c_pedido.php?addProduto=<?php echo $infoProduto['cod_produto']?>"
                class="btn btn-dark btn-block btn-comprar btn-lg">Adicionar ao Carrinho</a>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-12">
          <div class="tt-header-wrap">
            <div class="tt-header">
              <h2>Informações do Produto</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row px-4 pt-2">
        <div class="col-12">
          <p><?php echo $infoProduto['descricao_prod']?>
          </p>
        </div>
        <div class="col-md-6 col-12">
          <h3 class="h4">Especificações</h3>
          <table class="table table-sm">
            <tbody>
              <tr>
                <th scope="row">Categoria</th>
                <td>
                  <?php echo $infoProduto['nome_categoria'];?>
                </td>
              </tr>
              <tr>
                <th scope="row">Gênero</th>
                <td>
                  <?php echo $infoProduto['nome_genero'];?>
                </td>
              </tr>
              <tr>
                <th scope="row">Lançamento</th>
                <td>
                  <?php echo $infoProduto['data_lancamento'];?>
                </td>
              </tr>
              <tr>
                <th scope="row">Código</th>
                <td>
                  <?php echo $infoProduto['cod_produto'];?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="w-100 d-none d-md-block"></div>
        <div class="col-12">
          <img class="img-fluid shadow  rounded"
            src="<?php echo SITE_URL ?>/images/produtos/<?php echo $infoProduto['banner_img']?>" class="img-fluid"
            alt="Poster do jogo <?php echo $infoProduto['nome_prod']?>">
        </div>
      </div>

    </div>
  </main>

  <!-- parte dos comentarios -->
  <aside class="mt-5">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="tt-header-wrap">
            <div class="tt-header">
              <h2>Comentários e Avaliações</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row px-4 pt-2">
        <div class="col-12">
          <p>Parte separado para as Avalições e Comentários</p>
        </div>
      </div>
    </div>

  </aside>

  <!-- footer site -->
  <?php include SITE_PATH .'/includes/footer.php';?>
</body>

</html>