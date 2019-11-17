<?php
include_once '../../config.php';

$titlePage  = 'Cadastrar Gênero';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo SITE_URL ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo SITE_URL ?>/css/styles.css">

  <title><?php $titlePage; ?></title>
</head>

<body>
  <?php require SITE_PATH . '/includes/menu-adm.php'; ?>
  <main>
    <div class="container">
      <div class="row">
        <h1>Gênero Produtos</h1>
      </div>
      <div class="row">
        <a class="col-2 btn btn-dark btn-block btn-comprar my-2" href="<?php echo SITE_URL ?>/Views/produtos/create-genero.php" role="button">Cadastrar Gênero</a>
        <table class=" table text-center ">
          <thead>
            <tr>
              <th scope="col-1">Código</th>
              <th scope="col-4">Nome</th>
              <th scope="col-4">Ações</th>

            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $linha['cod_genero'] ?>
              </td>
              <td><?php echo $linha['nome_genero'] ?>
              <td class="col-3"><a class=" btn btn-dark btn-comprar" href="<?php echo SITE_URL ?>/Views/produto/alter-genero.php?genero=<?php echo $linha['cod_genero']; ?>" role="button">Alterar</a>
                <a class=" btn btn-dark btn-comprar" href="<?php echo SITE_URL ?>/Controllers/c_produto.php?excluir=<?php echo $linha['cod_genero']; ?>" role="button">Excluir</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <?php require SITE_PATH . '/includes/footer-adm.php'; ?>
</body>

</html>