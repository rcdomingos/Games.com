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

$titlePage = "Meus Pedidos";

$listaMeuspedidos = array();
$ListaItensMeusPedidos = array();
$cod_cliente = isset($_SESSION['cod_cliente']) ? $_SESSION['cod_cliente'] : false;
require SITE_PATH . '/Controllers/c_pedido.php';


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
<main class="min-h-60 mt-4 ">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="tt-header-wrap">
          <div class="tt-header">
            <h1>Meus Pedidos</h1>
            <p>Acompanhe a situação dos seus pedidos realizados no site.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php if ($listaMeuspedidos) { ?>
    <div class="container px-4 mb-5">
      <p class="text-muted font-italic text-right"><small>Clique no pedido para ver o detalhe dos itens</small></p>
      <div class="accordion " id="listaMeusPedidos">
        <?php foreach ($listaMeuspedidos as $detalhePedido) { ?>
          <div class="card">
            <div class="card-header bk-escuro" id="heading<?php echo $detalhePedido['cod_pedido'] ?>">
              <h5 class="mb-0 ">
                <button class="btn btn-link" type="button" data-toggle="collapse"
                        data-target="#collapse<?php echo $detalhePedido['cod_pedido'] ?>"
                        aria-expanded="true" aria-controls="heading<?php echo $detalhePedido['cod_pedido'] ?>">
                  Pedido n° <?php echo $detalhePedido['cod_pedido'] ?>
                </button>
                <?php $situacao = $detalhePedido['situacao'] ? 'Finalizado' : 'Aberto' ?>
                <p class="text-right mt-n4"><span
                    class="text-right text-muted"> Situação - <?php echo $situacao ?></span></php></p>
              </h5>
              <p class="text-left  ft-branca mt-n4">Pedido realizado no dia <?php echo $detalhePedido['data_pedido'] ?>
                no
                Valor Total de R$ <?php echo $detalhePedido['valor_pedido'] ?></p>
            </div>
            <div id="collapse<?php echo $detalhePedido['cod_pedido'] ?>" class="collapse"
                 aria-labelledby="heading<?php echo $detalhePedido['cod_pedido'] ?>" data-parent="#listaMeusPedidos">
              <div class="card-body bg-light">
                <ul class="list-group ">
                  <?php
                  foreach ($ListaItensMeusPedidos as $listaDosPedidosItens) {
                    foreach ($listaDosPedidosItens as $key => $detalheItensPedido) {
                      if ($detalheItensPedido['cod_pedido'] == $detalhePedido['cod_pedido']) { ?>
                        <li class="list-group-item list-group-item-action">
                          <div class="row align-items-center">
                            <div class="col-12 col-sm-6"><img
                                src="<?php echo SITE_URL ?>/images/produtos/<?php echo $detalheItensPedido['cover_img'] ?>"
                                alt="Imagem do jogo">
                              <strong>Produto: </strong><?php echo $detalheItensPedido['nome_prod'] . " - " . $detalheItensPedido['nome_categoria'] ?>
                            </div>
                            <div class="col-6 col-sm-3 text-right">
                              <strong>Quantidade: </strong><?php echo $detalheItensPedido['quantidade'] ?></div>
                            <div class="col-6 col-sm-3 text-right"><strong>Valor
                                Un: </strong><?php echo $detalheItensPedido['valor_item'] ?></div>
                          </div>
                        </li>
                      <?php }
                    }
                  } ?>
                </ul>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  <?php } else { ?>
    <div class="container mt-5">
      <div class="row align-items-center mt-5">
        <div class="col">
          <p class="text-center">Você ainda não possui nenhum pedido, não perca tempo e aproveite nossas promoções!</p>
        </div>
      </div>
    </div>
  <?php } ?>
</main>

<!-- footer site -->
<?php include SITE_PATH . '/includes/footer.php'; ?>
<!-- script bootstrap -->
<script src="<?php echo SITE_URL ?>/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo SITE_URL ?>/js/bootstrap.min.js"></script>
</body>

</html>