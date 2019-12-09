<?php

$conf = require '../../config.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo SITE_URL ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo SITE_URL ?>/css/styles.css">

  <title>Games.com</title>
</head>

<body>
  <!-- menu do site -->
  <?php include SITE_PATH.'/includes/menu.php'; ?>
  <!--conteudo da pagina -->

<div class="container">
<!-- <body>
  <div class="container mt-5">
    <div class="row justify-content-md-center mt-5">
      <div class="col-md-9 text-center">
        <h1>Usuario Cadastrado com Sucesso!</h1>
      </div>
    </div>
  </div>
</body> -->
    <div class="row justify-content-md-center mt-5 ">
      <div class="col-md-4 mt-md-5">
        <form class="mt-5 px-md-3" action='<?php echo SITE_URL ?>/Controllers/c_cliente.php' method="post">
          <!-- <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
          <h1 class="h3 mb-3 font-weight-normal text-center mb-5">Acesse a sua conta</h1>
          <label for="login_user" class="sr-only">Usuario</label>
          <input type="text" id="login_user" class="form-control box-search input-adm mb-2" name="email" placeholder="E-mail"
            autofocus required>
          <label for="pass_user" class="sr-only">Senha</label>
          <input type="password" id="pass_user" class="form-control box-search input-adm mb-2" name="senha" placeholder="Senha" required>
          <button class="btn btn-dark btn-adm botao-cadastro box-search mt-3 mb-5" type="submit" name="acessar">Login</button>
        </form>
        <div class="mb-3 mt-3 px-md-3">
          <p> Não tem cadastro?
            <a href="<?php echo SITE_URL ?>/Views/Clientes/cadastroClientes.php">Cadastre-se
              aqui</a>
          </p>
        </div>
      </div>
    </div>
  </div>


  <!-- footer site -->
  <?php include SITE_PATH.'/includes/footer.php'; ?>
</body>

</html>