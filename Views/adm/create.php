<?php
include_once '../../config.php';

$titlePage = "Criar Usuário";
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

  <body>
    <div class="container col-8 mt-5 pt-3 pb-5 ">
      <div class="row justify-content-md-center text-center ">
        <h1>Novo Usuário</h1>
      </div>
      <div class="row justify-content-md-center mt-3">
        <div class="col-md-6">
          <form action='<?php echo SITE_URL ?>/Controllers/c_usuario.php' method="post">
            <div class="form-group mb-3">
              <label class="sr-only" for="nome_usuario">Nome:</label>
              <input class="form-control input-adm" type="text" name="nome_usuario" placeholder="Nome Completo">
            </div>
            <div class="form-group mb-3">
              <label class="sr-only" for="telefone">Telefone:</label>
              <input class="form-control input-adm" type="text" name="telefone" placeholder="Telefone">
            </div>
            <div class="form-group mb-3">
              <label class="sr-only" for="cpf">CPF:</label>
              <input class="form-control input-adm" type="text" name="cpf" placeholder="CPF">
            </div>
            <div class="form-group mb-3">
              <label class="sr-only" for="email">E-Mail:</label>
              <input class="form-control input-adm" type="text" name="email" placeholder="E-Mail">
            </div>
            <div class="form-group mb-3">
              <label class="sr-only" for="logim">Login:</label>
              <input class="form-control input-adm" type="text" name="logim" placeholder="Login">
            </div>
            <div class="form-row">
              <div class="form-group col-6 mb-3">
                <label class="sr-only" for="senha">Senha:</label>
                <input class="form-control input-adm" type="password" name="senha" placeholder="Senha">
              </div>
              <div class="form-group col-6 mb-3">
                <label class="sr-only" for="password">Confirmar senha:</label>
                <input class="form-control input-adm" type="password" placeholder="Confirmar Senha">
              </div>
            </div>
            <div class="d-flex justify-content-center">
              <input class="btn btn-dark btn-block " type="hidden">
              <input class="btn btn-dark btn-block btn-adm mx-2 col-3" type="submit" value="Cadastrar" name="cadastrar-usuario" id="cadastrar-usuario">
              <input class="btn btn-dark btn-block btn-adm mx-2 col-3" type="reset" value="Limpar" id="limpar">
              <a class="btn btn-dark btn-block btn-adm mx-2 col-3" href="./index.php">Cancelar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>

</body>

</html>