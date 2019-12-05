<?php
/*remover o warning do include e da session**/
if (!defined('SITE_URL')) {
  include_once '../../config.php';
}

include SITE_PATH . '/Controllers/c_valida_usuario.php';

$titlePage = 'Cadastrar Produtos';
// $linha = [];
$itensProdHome = [];

require SITE_PATH . '/Controllers/c_produto.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo SITE_URL ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo SITE_URL ?>/css/styles.css">

  <title><?php $titlePage; ?>
  </title>
</head>

<body>
  <?php require SITE_PATH . '/includes/menu-adm.php'; ?>
  <main class="min-h-75">
    <div class="container">
      <div class="row justify-content-md-center">
        <h1>Produtos</h1>
      </div>
      <div class="row justify-content-md-center">
        <a class="col-2 btn btn-dark btn-adm my-2" href="<?php echo SITE_URL ?>/Views/produtos/create-prod.php" role="button">Cadastrar Produto</a>
      </div>
      <div class="row justify-content-md-center">
        <table class=" table text-center ">
          <thead>
            <tr>
              <th scope="col-1">Código</th>
              <th scope="col-4">Nome</th>
              <th scope="col-2">Gênero</th>
              <th scope="col-3">Categoria</th>
              <th scope="col-2">Estoque</th>
              <th scope="col-2">Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($itensProdHome as $linha) { ?>
              <tr>
                <td><?php echo $linha['cod_produto'] ?>
                </td>
                <td><?php echo $linha['nome_prod'] ?>
                </td>
                <td><?php echo $linha['nome_genero'] ?>
                </td>
                <td><?php echo $linha['nome_categoria'] ?>
                </td>
                <td><?php echo $linha['estoque'] ?>
                </td>
                <td><a class="btn btn-dark btn-adm" href="<?php echo SITE_URL ?>/Views/produtos/alter-prod.php?produto=<?php echo $linha['cod_produto']; ?>" role="button">Alterar</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <?php require SITE_PATH . '/includes/footer-adm.php'; ?>
</body>

</html>