<?php
/*remover o warning do include e da session**/
if (!defined('SITE_URL')) {
    include_once '../../config.php';
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$titlePage = "Pedido Finalizado";
$PedidoCriado = [];

require SITE_PATH . '/Controllers/c_pedido.php';
// print_r($_SESSION);
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
  <main id="bg-finalizado">
    <section>
      <div class="d-flex justify-content-center">
        <div class="card-pedido bk-escuro ft-branca mt-md-2 px-5 py-2 rounded shadow  align-items-center">
          <img class="mx-auto d-block" src="<?php echo SITE_URL ?>/images/logo.png" alt="Logo Games.com">
          <h1 class="text-center mb-4 py-4 ft-laranja ">Pedido nº <?php echo $PedidoCriado['cod_pedido'] ?>
          </h1>
          <p>Obrigado <span class="ft-laranja"><?php echo $PedidoCriado['nome_cliente'] ?></span>,
          </p>
          <p>seu pedido no valor de <span class="ft-laranja ">R$
              <?php echo number_format($PedidoCriado['valor_pedido'], 2, ',', '') ?></span>
            foi efetuado com Sucesso!</p>
          <p>A entrega esta programada até <span class="ft-laranja ">
              <?php
$dataEntrega = new DateTime($PedidoCriado['data_entrega']);
echo date_format($dataEntrega, 'd-m-Y');
?>
            </span></p>
          <p><small>Para qualquer dúvida estaremos à disposição para maiores esclarecimentos.</small> </p>
          <p class="text-right">Equipe <span class="ft-laranja ">Games.com</span></p>
          <p class="text-right "><small><a class="ft-branca" href="<?php echo SITE_URL ?>/Views/home/index.php">Voltar
                a Loja</a></small></p>

        </div>
      </div>
    </section>


  </main>

</body>

</html>