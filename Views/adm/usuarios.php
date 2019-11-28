<?php
include_once '../../config.php';
include   SITE_PATH . '/Controllers/c_valida_usuario.php';

$titlePage   = 'Usuários do ADM';


require SITE_PATH . '/Controllers/c_usuario.php';

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
      <div class="row">
        <h1>USUÁRIOS</h1>
      </div>
      <div class="row">
        <a class="col-2 btn btn-dark btn-adm my-2" href="<?php echo SITE_URL ?>/Views/adm/create.php" role="button">Cadastrar Usuário</a>
        <table class=" table text-center ">
          <thead>
            <tr>
              <th scope="col-1">Código</th>
              <th scope="col-4">Nome</th>
              <th scope="col-2">Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($selectusuario as  $linha) { ?>
              <tr>
                <td><?php echo $linha['cod_usuario'] ?>
                </td>
                <td><?php echo $linha['nome_usuario'] ?>
                </td>
                <td><a class="btn btn-dark btn-adm" href="<?php echo SITE_URL ?>/Views/produtos/alter-usuario.php?produto=<?php echo $linha['cod_usuario']; ?>" role="button">Alterar</a>
                  <a class="btn btn-dark btn-adm" href="<?php echo SITE_URL ?>/Controllers/c_usuario.php?excluir=<?php echo $linha['cod_usuario']; ?>" role="button">Excluir</a>
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