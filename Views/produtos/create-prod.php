<?php
/*remover o warning do include e da session**/
if (!defined('SITE_URL')) {
    include_once '../../config.php';
}

$titlePage = "Cadastrar Produto";
$selectgenero = [];
$selectcategoria = [];
include SITE_PATH . '/Controllers/c_valida_usuario.php';

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

  <title><?php $titlePage;?></title>
</head>
<?php require SITE_PATH . '/includes/menu-adm.php';?>

<body>
  <div class="container mt-5">
    <div class="row justify-content-md-center text-center">
      <h1>Cadastrar novo Produto</h1>
    </div>
    <div class="row justify-content-md-center mt-3">
      <div class="col-md-6">
        <form class="" enctype="multipart/form-data" action='<?php echo SITE_URL ?>/Controllers/c_produto.php' method="post">
          <div class="form-group mb-3">
            <label class="sr-only" for="nome_prod">Nome Produto:</label>
            <input class="form-control input-adm" type="text" name="nome_prod" placeholder="Nome Produto">
          </div>
          <div class="form-group mb-3">
            <label class="sr-only" for="codigobarra">Codigo de Barra:</label>
            <input class="form-control input-adm" type="text" name="codigobarra" placeholder="Codigo de Barra">
          </div>
          <div class="form-group mb-3">
            <label class="sr-only" for="descricao_prod">Descrição do Produto</label>
            <input class="form-control input-adm" type="text" name="descricao_prod" placeholder="Descrição do Produto">
          </div>
          <div class="form-group mb-3">
            <label class="sr-only" for="valor_un">Valor do Produto:</label>
            <input class="form-control input-adm" type="date" name="data_lancamento">
          </div>
          <div class="form-group mb-3">
            <label class="sr-only" for="data-lacamento">Data de lançamento:</label>
            <input class="form-control input-adm" type="text" name="valor_un" placeholder="Valor R$">
          </div>
          <div class="form-group mb-3">
            <label class="sr-only" for="cover_img">Imagem do Produto:</label>
            <input class="form-control input-adm" type="file" name="cover_img" placeholder="Anexar imagem">
          </div>
          <div class="form-group  mb-3">
            <label class="sr-only" for="banner_img">Banner do Produto:</label>
            <input class="form-control input-adm" type="file" name="banner_img" placeholder="Anexar imagem">
          </div>
          <div class="form-group  mb-3">
            <label class="sr-only" for="estoque">Quantidade do Produto:</label>
            <input class="form-control input-adm" type="number" name="estoque" placeholder="Quantidade">
          </div>
          <div class="form-check input-adm">
            <label for="destaque" class="pl-2">Produto em Destaque?</label><br>
            <input class=" input-destaque" type="radio" name="destaque" id="destaque1" value="1">
            <label class="form-check-label " for="destaque">Sim </label><br>
            <input class="input-destaque" type="radio" name="destaque" id="destaque0" value="0">
            <label class=" mb-2" for="destaque">Não</label>
          </div><br>
          <div class="form-group  mb-3">
            <label class="sr-only" for="categoria">Categoria</label>
            <select class="form-control input-adm" name="cod_categoria" id="cod_categoria">
              <option value="">Selecione Categoria</option>
              <?php foreach ($selectcategoria as $itemcategoria) {?>
                <option value="<?php echo $itemcategoria['cod_categoria'] ?>"><?php echo $itemcategoria['nome_categoria'] ?></option>
              <?php }
;?>
            </select>
          </div>
          <div class="form-group  mb-3">
            <label class="sr-only" for="genero">Gênero</label>
            <select class="form-control input-adm" name="cod_genero" id="cod_genero">
              <option value="">Selecione Gênero</option>
              <?php foreach ($selectgenero as $itemgenero) {?>
                <option value="<?php echo $itemgenero['cod_genero'] ?>"><?php echo $itemgenero['nome_genero'] ?></option>
              <?php }
;?>
            </select>
          </div>
          <div class="input-group d-flex justify-content-center">
            <input type="hidden" class="btn btn-dark btn-block btn-comprar">
            <input class="btn btn-dark btn-block btn-adm mx-2 col-3" type="submit" value="Cadastrar" name="cadastrar-produto" id="cadastrar-produto">
            <input class="btn btn-dark btn-block btn-adm mx-2 col-3" type="reset" value="Limpar" id="limpar">
            <a class="btn btn-dark btn-block btn-adm mx-2 col-3" href="./prod-index.php">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
<?php require SITE_PATH . '/includes/footer-adm.php';?>

</html>