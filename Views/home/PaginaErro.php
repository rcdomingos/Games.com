<?php

/*remover o warning do include e da session**/
if (!defined('SITE_URL')) {
    include_once '../../config.php';
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$titlePage = 'Game Over';
$msgErro = ($_GET['erro']) ? $_GET['erro'] : "Erro inesperado no processamento da requisição.";
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
  <?php include SITE_PATH . '/includes/menu.php';?>
  <!--conteudo da pagina -->
  <main class="min-h-60 mx-4">
    <article>
      <div class="container mb-md-n4">
        <div class="row align-items-center">
          <div class="col-md-5 col-12">
            <img class="img-fluid" src="<?php echo SITE_URL ?>/images/img-gameOver.webp" alt="GAME OVER">
          </div>
          <div class="col-md-7">
            <h1 class="ft-laranja">Ops, algo deu errado... =( </h1>
            <p>Desculpe mas não foi possivel realizar a sua solicitação devido ao erro:</p>
            <samp><?php echo $msgErro ?></samp>
            <p class="h4 text-right pt-4">
              <a href="<?php echo SITE_URL ?>/Views/home">Voltar a
                Home</a>
            </p>
          </div>
        </div>
      </div>
    </article>
  </main>

  <!-- footer site -->
  <?php include SITE_PATH . '/includes/footer.php';?>
</body>

</html>