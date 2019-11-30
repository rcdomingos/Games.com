<?php
/*remover o warning do include e da session**/
if (!defined('SITE_URL')) {
    include_once '../../config.php';
}
include SITE_PATH . '/Controllers/c_valida_usuario.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo SITE_URL ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo SITE_URL ?>/css/styles.css">

  <title>Cadastrar Categoria</title>
</head>

<body>
  <?php include SITE_PATH . '/includes/menu-adm.php';?>
  <main class="min-h-50">
    <div class="container mt-5">
      <div class="row justify-content-md-center text-center">
        <h1>Cadastrar novo Categoria</h1>
      </div>
      <div class="row justify-content-md-center mt-4">
        <div class="col-md-6">
          <form class="" action='<?php echo SITE_URL ?>/Controllers/c_produto.php' method="post">
            <div class="form-group mb-3">
              <label class="sr-only" for="nome_categoria">Categoria:</label>
              <input class="form-control input-adm" type="text" name="nome_categoria" placeholder="Categoria">
            </div>
            <div class="input-group d-flex justify-content-center">
              <input class="btn btn-dark btn-block btn-adm mx-2 col-2" type="hidden">
              <input class="btn btn-dark btn-block btn-adm mx-2 col-2" type="submit" value="Cadastrar" name="cadastrar" id="criar">
              <input class="btn btn-dark btn-block btn-adm mx-2 col-2" type="reset" value="Limpar" id="limpar">
              <a class="btn btn-dark btn-block btn-adm mx-2 col-2" href="./categ-index.php">Cancelar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>

  <?php include SITE_PATH . '/includes/footer-adm.php';?>

</body>

</html>