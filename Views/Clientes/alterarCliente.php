<?php
include_once '../../config.php';
session_start();
if(isset( $_SESSION['cod_cliente'])){
  $idCLiente = $_SESSION['cod_cliente'];
}


$titlePage = "Alteração de Cadastro";
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

</main>

  <!-- footer site -->
  <?php include SITE_PATH .'/includes/footer.php';?>
</body>

</html>