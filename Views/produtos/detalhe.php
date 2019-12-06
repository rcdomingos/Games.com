<?php
/*remover o warning do include e da session**/
if (!defined('SITE_URL')) {
  include_once '../../config.php';
}

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$DetalheProduto = $_GET['jogo'];
$clienteLogado = isset($_SESSION['cod_cliente']) ? $_SESSION['cod_cliente'] : false;

require SITE_PATH . '/Controllers/c_produto.php';

include SITE_PATH . '/Controllers/c_favorito.php';

/**Titulo da pagina mudar de acordo com a pagina rederenciada */
$titlePage = "Jogo " . $infoProduto['nome_prod'];
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
    Games.com | <?php echo $titlePage; ?>
  </title>
</head>

<body>
<!-- menu do site -->
<?php include SITE_PATH . '/includes/menu.php'; ?>
<!--conteudo da pagina -->
<main>
  <div class="container">

    <div class="row">
      <div class="col-12 col-md-6 mb-5">
        <img
          src="<?php echo SITE_URL ?>/images/produtos/<?php echo $infoProduto['cover_img'] ?>"
          class="img-fluid img-detalhe"
          alt="Capa do jogo <?php echo $infoProduto['nome_prod'] ?>">
      </div>
      <div class="col-12 col-md-5 align-self-center">
        <!-- link para adicionar o jogo aos favoritos -->
        <div class="text-right ico-favoritos">
          <?php if (isset($jogoNosFavorito) and ($jogoNosFavorito)) { ?>
            <a class="link-none text-right ft-laranja"
               href="<?php echo SITE_URL ?>/Controllers/c_favorito.php?idcliente=<?php echo $clienteLogado ?>&rm_favorito_jogo=<?php echo $DetalheProduto ?>">
              <span class="ft-laranja">Remover dos Favoritos</span>
              <img src="<?php echo SITE_URL ?>/images/icones/remover-favorito.svg"
                   alt="Remover dos Favoritos" title="Remover dos Favoritos">
            </a>
          <?php } else { ?>
            <a class="link-none text-right ft-escuro"
               href="<?php echo SITE_URL ?>/Controllers/c_favorito.php?idcliente=<?php echo $clienteLogado ?>&add_favorito_jogo=<?php echo $DetalheProduto ?>">
              <span class="ft-escuro">Adicionar aos Favoritos</span>
              <img src="<?php echo SITE_URL ?>/images/icones/add-favoritos.svg"
                   alt="Adicionar a Favoritos" title="Adicionar aos Favoritos">
            </a>
          <?php } ?>
        </div>
        <!-- card com a opção de comprar -->
        <div class="card box-detalhe-jogo p-2 bk-escuro mt-1">
          <div class="card-body text-center">
            <h1 class="card-title h3 text-uppercase ft-branca">Jogo
              <?php echo $infoProduto['nome_prod'] . "-" . $infoProduto['nome_categoria'] ?>
            </h1>
            <?php if ($infoProduto['promocao']) { ?>
              <p class="card-text ft-laranja">Promoção de: <s>R$ <?php echo $infoProduto['valor_un'] ?></s>
              </p>
              <p class="card-text"><small class="text-muted">Por Apenas</small></p>
              <p class="card-text h2 mt-n3 ft-laranja"><small>R$</small>
                <?php echo number_format($infoProduto['valor_promocao'], 2, ',', '.') ?>
              </p>
            <?php } else { ?>
              <p class="card-text pt-2"><small class="text-muted">Por Apenas</small></p>
              <p class="card-text h2 mt-n3 ft-laranja"><small>R$</small>
                <?php echo number_format($infoProduto['valor_un'], 2, ',', '.') ?>
              </p>
            <?php } ?>
            <p class="card-text ft-branca">Em Estoque: <?php echo $infoProduto['estoque'] ?>
            </p>
          </div>
          <div class="card-footer border-0 bg-transparent">
            <a
              href="<?php echo SITE_URL ?>/Controllers/c_pedido.php?addProduto=<?php echo $infoProduto['cod_produto'] ?>"
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
        <p><?php echo $infoProduto['descricao_prod'] ?>
        </p>
      </div>
      <div class="col-md-6 col-12">
        <h3 class="h4">Especificações</h3>
        <table class="table table-sm">
          <tbody>
          <tr>
            <th scope="row">Categoria</th>
            <td>
              <?php echo $infoProduto['nome_categoria']; ?>
            </td>
          </tr>
          <tr>
            <th scope="row">Gênero</th>
            <td>
              <?php echo $infoProduto['nome_genero']; ?>
            </td>
          </tr>
          <tr>
            <th scope="row">Lançamento</th>
            <td>
              <?php echo $infoProduto['data_lancamento']; ?>
            </td>
          </tr>
          <tr>
            <th scope="row">Código</th>
            <td>
              <?php echo $infoProduto['cod_produto']; ?>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
      <div class="w-100 d-none d-md-block"></div>
      <div class="col-12">
        <img class="img-fluid shadow  rounded"
             src="<?php echo SITE_URL ?>/images/produtos/<?php echo $infoProduto['banner_img'] ?>"
             class="img-fluid"
             alt="Poster do jogo <?php echo $infoProduto['nome_prod'] ?>">
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
    <div class="row pt-2">
      <div class="col-6">
        <p class="text-left font-weight-bold"><span
            class="h5">Nota do Jogo: <?php echo $notaMedia['notaMedia']; ?></span>
          <br><small class="font-italic">Total de Avaliações: <?php echo $notaMedia['TotalAvaliacao']; ?> </small></p>
      </div>
      <div class="col-6 text-right">
        <p class="text-right">
          <a class=" btn btn-dark btn-comprar btn-lg"
             href="<?php echo SITE_URL ?>/Views/Clientes/cadastroComentario.php?jogo=<?php echo $infoProduto['cod_produto']; ?>&nome=<?php echo $infoProduto['nome_prod']; ?>">Adicionar</a>
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <?php foreach ($Comentarios as $comentario) {
          if ($comentario['avaliacao'] == 1) {
            $corAvaliacao = 'aval-ruim ';
          } elseif ($comentario['avaliacao'] >= 4) {
            $corAvaliacao = 'aval-bom';
          } else {
            $corAvaliacao = 'aval-legal';
          }
          ?>
          <div class="media p-3 rounded mb-2 bk-escuro">
            <div class="align-self-start mr-4">
              <img class=" bk-laranja  rounded-circle"
                   src="<?php echo SITE_URL ?>/images/icones/utilizador.svg"
                   style="width:50px" alt="...">
              <p class="font-italic text-muted"><small>
                  <?php $nomeClienteComentario = explode(" ", $comentario['nome_cliente']);
                  echo current($nomeClienteComentario) ?></small></p>
              <p class="text-muted font-italic mt-n4">
                <small><?php echo date('d-m-Y', strtotime($comentario['data_comentario'])) ?></small></p>
            </div>
            <div class="media-body">
              <h5
                class="font-weight-bold ft-laranja mt-0 titulo-comentario"><?php echo $comentario['titulo_comentario'] ?> </h5>
              <div class="avaliacao <?php echo $corAvaliacao ?>"><span><?php echo $comentario['avaliacao'] ?></span>
              </div>
              <p class="ft-branca"><?php echo $comentario['comentario'] ?></p>
            </div>
            <?php if ($comentario['cod_cliente'] == $clienteLogado) { ?>
              <div><a class="h4"
                      href="<?php echo SITE_URL ?>/Controllers/c_comentario.php?cod_comentario=<?php echo $comentario['cod_comentario'] ?>&cod_produto=<?php echo $comentario['cod_produto'] ?>">X</a>
              </div>
            <?php } ?>
          </div>
        <?php } ?>

      </div>
    </div>

  </div>

</aside>

<!-- footer site -->
<?php include SITE_PATH . '/includes/footer.php'; ?>
</body>

</html>