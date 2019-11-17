<?php
// session_start();
include_once '../../config.php';
$titlePage = 'ADM Games.com'
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo SITE_URL ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo SITE_URL ?>/css/styles.css">

  <title><?php echo $titlePage; ?></title>
</head>

<body>
  <?php require SITE_PATH . '/includes/menu-adm.php'; ?>
  <main>
    <div class="container">
      <div class="row justify-content-md-center mt-3 ">
        <div class="col-md-4 mt-md-5">
          <a class="btn btn-dark btn-block btn-adm py-4 my-3 col align-self-center" href="<?php echo SITE_URL ?>/Views/produtos/prod-index.php"><strong class="h5">CADASTRAR PRODUTO</strong></a>
          <a class="btn btn-dark btn-block btn-adm py-4 my-3 col align-self-center" href="<?php echo SITE_URL ?>/Views/produtos/genero-index.php"><strong class="h5">CADASTRAR GÊNERO</strong></a>
          <a class="btn btn-dark btn-block btn-adm py-4 my-3 col align-self-center" href="<?php echo SITE_URL ?>/Views/produtos/categ-index.php"><strong class="h5">CADASTRAR CATEGORIA</strong></a>
        </div>
      </div>
    </div>

  </main>
  <?php require SITE_PATH . '/includes/footer-adm.php'; ?>
</body>

</html>