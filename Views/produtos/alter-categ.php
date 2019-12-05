<?php
/*remover o warning do include e da session**/
if (!defined('SITE_URL')) {
  include_once '../../config.php';
}

include SITE_PATH . '/Controllers/c_valida_usuario.php';

$cod_categoria = $_GET['categoria'];
$nome_categoria = $_GET['nome'];

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo SITE_URL ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo SITE_URL ?>/css/styles.css">

  <title>Alterar Categoria</title>
</head>
<?php include SITE_PATH . '/includes/menu-adm.php'; ?>

<body>
  <div class="container mt-5 min-h-50">
    <div class="row justify-content-md-center text-center">
      <h1>Alterar Categoria: <?php echo $cod_categoria; ?></h1>
    </div>
    <div class="row justify-content-md-center mt-3">
      <div class="col-md-6">
        <form class="" action='<?php echo SITE_URL ?>/Controllers/c_produto.php' method="post">
          <div class="form-group mb-3">
            <label class="sr-only" for="nome_categoria">Categoria:</label>
            <input class="form-control" type="text" name="nome_categoria" value="<?php echo $linha['nome_categoria']; ?>">
            <p class="text-muted text-center"><?php echo $nome_categoria; ?></p>
            <input class="form-control" type="hidden" name="cod_categoria" value="<?php echo $cod_categoria ?>">
          </div>
          <div class="input-group d-flex justify-content-center">
            <input type="hidden" class="btn btn-dark btn-block">
            <input class="btn btn-dark btn-block btn-comprar mx-2 col-2" type="submit" value="Atualizar" name="alterar-categoria" id="alterar-categoria">
            <input class="btn btn-dark btn-block btn-comprar mx-2 col-2" type="reset" value="Limpar" id="limpar">
            <a class="btn btn-dark btn-block btn-comprar mx-2 col-2" href="./categ-index.php">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
<?php include SITE_PATH . '/includes/footer-adm.php'; ?>

</html>