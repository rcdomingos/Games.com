<?php
/*remover o warning do include e da session**/
if (!defined('SITE_URL')) {
  include_once '../../config.php';
}

include   SITE_PATH . '/Controllers/c_valida_usuario.php';

$titlePage   = 'Usuários do ADM';
$listarusuarios = [];

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
      <div class="row justify-content-md-center">
        <h1 class="h3 pt-2">USUÁRIOS</h1>
      </div>
      <div class="row justify-content-md-center">
        <a class="col-2 btn btn-dark btn-adm my-2" href="<?php echo SITE_URL ?>/Views/adm/create.php" role="button">Cadastrar Usuário</a>
      </div>
      <div class="row justify-content-md-center">
        <table class="table text-center " style="width: 70%">
          <thead>
            <tr>
              <th scope="col-1">ID</th>
              <th scope="col-4">Nome</th>
              <th scope="col-2">Login</th>
              <th scope="col-2">Ações</th>

            </tr>
          </thead>
          <tbody>
            <?php foreach ($listarusuarios as  $linha) { ?>
              <tr>
                <td><?php echo $linha['cod_usuario'] ?>
                </td>
                <td><?php echo $linha['nome_usuario'] ?>
                </td>
                <td><?php echo $linha['logim'] ?>
                </td>
                <td><a class="btn btn-dark btn-adm" href="<?php echo SITE_URL ?>/Views/adm/alter-usuario.php?usuario=<?php echo $linha['cod_usuario']; ?>&login=<?php echo $linha['logim']; ?> " role="button">Alterar</a>
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