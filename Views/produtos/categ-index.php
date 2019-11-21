<?php
include_once '../../config.php';
$categorias = [];
include   SITE_PATH . '/Controllers/c_valida_usuario.php';

require SITE_PATH . '/Controllers/c_produto.php';
// $linha = [];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo SITE_URL ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo SITE_URL ?>/css/styles.css">

  <title>Categoria</title>
</head>

<body>
  <?php include SITE_PATH . '/includes/menu-adm.php'; ?>
  <main class="min-h-75">
    <div class="container">
      <div class="row">
        <h1>Categoria Produtos</h1>
      </div>
      <div class="row">
        <a class="col-2 btn btn-dark btn-block btn-comprar my-2" href="<?php echo SITE_URL ?>/Views/produtos/create-categ.php" role="button">Cadastrar Categoria</a>
        <table class=" table text-center " style="width: 100%">
          <thead>
            <tr>
              <th scope="col-5 text-center">Código</th>
              <th scope="col-5 text-center">Nome</th>
              <th scope="col-2 text-center">Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($categorias as $linha) { ?>
              <tr>
                <td><?php echo $linha['cod_categoria'] ?>
                </td>
                <td><?php echo $linha['nome_categoria'] ?>
                <td><a class="btn btn-dark btn-adm-lista col-2" href="<?php echo SITE_URL ?>/Views/produtos/alter-categ.php?categoria=<?php echo $linha['cod_categoria']; ?>" role="button">Alterar</a>
                  <a class="btn btn-dark btn-adm-lista col-2" href="<?php echo SITE_URL ?>/Controllers/c_produto.php?excluir=<?php echo $linha['cod_categoria']; ?>" role="button">Excluir</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <?php include SITE_PATH . '/includes/footer-adm.php'; ?>
</body>

</html>