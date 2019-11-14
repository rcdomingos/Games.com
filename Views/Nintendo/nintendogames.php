<?php
$conf = include $_SERVER['DOCUMENT_ROOT'] . '/Games.com/config.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet"
    href="<?php echo $conf['url'] ?>/css/bootstrap.min.css">
  <link rel="stylesheet"
    href="<?php echo $conf['url'] ?>/css/styles.css">

  <title>Games.com</title>
</head>

<body>
  <!-- menu do site -->
  <?php include $conf['path'].'/includes/menu.php';?>
  <!--conteudo da pagina -->
<div>
  <div class="imagem-principal-nintendo">
      <div class="caixa-nintendo">
        <h1 class="display-nintendo">Jogos Nintendo</h1>
        <h4 class="display-nintendo-2">Aqui você encontra todos os jogos que procura!</h4>
      </div>
  </div>
</div>

    <article>
      

    </article>


  <!-- footer site -->
  <?php include $conf['path'].'/includes/footer.php';?>
</body>

</html>