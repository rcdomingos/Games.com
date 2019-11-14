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
  <div class="imagem-principal-playstation">
      <div class="caixa-playstation">
        <h1 class="display-playstation">Jogos PlayStation</h1>
        <h4 class="display-playstation-2">Aqui você encontra todos os jogos que procura!</h4>
      </div>
  </div>
</div>

<article class="mt-5">
  <div class="container">
    <div class="row">

      <div class="col-sm">
      <div class="card border-primary jogos-playstation">
        <!-- <img class="card-img-top" src="" alt="Imagem de capa do card"> -->
      </div>
      <div class="card-body">
        <h5 class="card-title">Reserva de STAR WARS Jedi: Fallen Order</h5>
        <p class="card-text">Reserve para receber o Bônus de Reserva de STAR WARS Jedi: Fallen Order™, que inclui uma série de atualizações cosméticas para seu sabre de luz e companheiro droide.</p>
        <a href="#" class="btn btn-success">Adicionar ao carrinho</a>
      </div>
      </div>
      <div class="col-sm">
      <div class="card border-primary jogos-playstation">
        <!-- <img class="card-img-top" src="" alt="Imagem de capa do card"> -->
      </div>
      <div class="card-body">
        <h5 class="card-title">Reserva de STAR WARS Jedi: Fallen Order</h5>
        <p class="card-text">Reserve para receber o Bônus de Reserva de STAR WARS Jedi: Fallen Order™, que inclui uma série de atualizações cosméticas para seu sabre de luz e companheiro droide.</p>
        <a href="#" class="btn btn-success">Adicionar ao carrinho</a>
      </div>
      </div>

      <div class="col-sm">
      <div class="card border-primary jogos-playstation">
        <!-- <img class="card-img-top" src="" alt="Imagem de capa do card"> -->
      </div>
      <div class="card-body">
        <h5 class="card-title">Reserva de STAR WARS Jedi: Fallen Order</h5>
        <p class="card-text">Reserve para receber o Bônus de Reserva de STAR WARS Jedi: Fallen Order™, que inclui uma série de atualizações cosméticas para seu sabre de luz e companheiro droide.</p>
        <a href="#" class="btn btn-success">Adicionar ao carrinho</a>
      </div>
      </div>

    </div>
  </div>

  <hr class="divisorias-games">

  <div class="container mt-5">
    <div class="row">

    <div class="col-sm">
      <div class="card border-primary jogos-playstation">
        <!-- <img class="card-img-top" src="" alt="Imagem de capa do card"> -->
      </div>
      <div class="card-body">
        <h5 class="card-title">Reserva de STAR WARS Jedi: Fallen Order</h5>
        <p class="card-text">Reserve para receber o Bônus de Reserva de STAR WARS Jedi: Fallen Order™, que inclui uma série de atualizações cosméticas para seu sabre de luz e companheiro droide.</p>
        <a href="#" class="btn btn-success">Adicionar ao carrinho</a>
      </div>
      </div>

      <div class="col-sm">
      <div class="card border-primary jogos-playstation">
        <!-- <img class="card-img-top" src="" alt="Imagem de capa do card"> -->
      </div>
      <div class="card-body">
        <h5 class="card-title">Reserva de STAR WARS Jedi: Fallen Order</h5>
        <p class="card-text">Reserve para receber o Bônus de Reserva de STAR WARS Jedi: Fallen Order™, que inclui uma série de atualizações cosméticas para seu sabre de luz e companheiro droide.</p>
        <a href="#" class="btn btn-success">Adicionar ao carrinho</a>
      </div>
      </div>

      <div class="col-sm">
      <div class="card border-primary jogos-playstation">
        <!-- <img class="card-img-top" src="" alt="Imagem de capa do card"> -->
      </div>
      <div class="card-body">
        <h5 class="card-title">Reserva de STAR WARS Jedi: Fallen Order</h5>
        <p class="card-text">Reserve para receber o Bônus de Reserva de STAR WARS Jedi: Fallen Order™, que inclui uma série de atualizações cosméticas para seu sabre de luz e companheiro droide.</p>
        <a href="#" class="btn btn-success">Adicionar ao carrinho</a>
      </div>
      </div>

    </div>
  </div>

  
</article>


  <!-- footer site -->
  <?php include $conf['path'].'/includes/footer.php';?>
</body>

</html>