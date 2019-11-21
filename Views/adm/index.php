<?php
session_start();
include_once '../../config.php';
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

  <body>
    <div class="container">
      <div class="row justify-content-md-center mt-5">
        <div class="col-md-4 mt-md-5  rounded quadro-adm bk-escuro">
          <form class="mt-3 px-md-3 " action='<?php echo SITE_URL ?>/Controllers/c_usuario.php' method="post">
            <h1 class="h3 mb-3 font-weight-normal text-center ft-branca">ADM GAMES.COM</h1>
            <label for="login_usuario" class="sr-only">Usuário</label>
            <input type="text" id="logim" class="form-control mb-2 input-adm" name="logim" placeholder="Usuário" autofocus>
            <label for="senha" class="sr-only">Senha</label>
            <input type="password" id="senha" class="form-control mb-2 input-adm" name="senha" placeholder="Senha">
            <button class="btn btn-light btn-adm btn-block mt-3" type="submit" name="acessar-usuario">Login</button>
          </form>
          <div class="mb-3 mt-3 px-md-6">
            <a class="btn btn-light btn-adm ml-5" href="<?php echo SITE_URL ?>/Views/adm/create.php">Criar
              Usuário</a>
            <a class="btn btn-light btn-adm ml-3" href="<?php echo SITE_URL ?>/Views/home/index.php">Sair do ADM</a>
          </div>
        </div>
      </div>
    </div>

  </body>
</body>

</html>