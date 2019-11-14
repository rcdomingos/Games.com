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
  <div class="imagem-principal-xbox">
      <div class="caixa-xbox">
        <h1 class="display-xbox">Jogos Xbox</h1>
        <h4 class="display-xbox-2">O Xbox é simplesmente o melhor console de jogos já criados. Estes são os jogos que comprovam isso:</h4>
      </div>
  </div>
</div>

    <article>
      

    </article>


  <!-- footer site -->
  <?php include $conf['path'].'/includes/footer.php';?>
</body>

</html>