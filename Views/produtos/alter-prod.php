<?php
/*remover o warning do include e da session**/
if (!defined('SITE_URL')) {
  include_once '../../config.php';
}

$titlePage = "Alterar Produto";
$selectgenero = [];
$selectcategoria = [];
include SITE_PATH . '/Controllers/c_valida_usuario.php';

require SITE_PATH . '/Controllers/c_produto.php';
$cod_produto = $_GET['produto'];
if (isset($_GET['produto'])) {
  $selectproduto = selectalterarproduto($conn, $cod_produto);
}
$promocao1 = 1;
$promocao0 = 0;
$destaque1 = 1;
$destaque0 = 0;
$situacaoAtivo   = 0;
$situacaoInativo = 1;
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
<?php require SITE_PATH . '/includes/menu-adm.php'; ?>

<body>
  <div class="container mt-5">
    <div class="row justify-content-md-center text-center">
      <h1>Alterando Produto: <?php echo $cod_produto; ?></h1>
    </div>
    <div class="row justify-content-md-center mt-3">
      <div class="col-md-6">
        <form class="" enctype="multipart/form-data" action='<?php echo SITE_URL ?>/Controllers/c_produto.php' method="post">
          <input class="form-control input-adm" type="hidden" name="cod_produto" value="<?php echo $cod_produto; ?>">
          <div class=" form-group mb-3">
            <input class="form-control input-adm" type="hidden" value="<?php echo $cod_produto; ?>">
            <label class="sr-only" for="nome_prod">Nome Produto:</label>
            <input class="form-control input-adm" type="text" name="nome_prod" value="<?php echo $selectproduto['nome_prod']; ?>">
          </div>
          <div class="form-group mb-3">
            <label class="sr-only" for="codigobarra">Codigo de Barra:</label>
            <input class="form-control input-adm" type="text" name="codigobarra" value="<?php echo $selectproduto['codigobarra']; ?>">
          </div>
          <div class="form-group mb-3">
            <label class="sr-only" for="descricao_prod">Descrição do Produto</label>
            <input class="form-control input-adm" type="text" name="descricao_prod" value="<?php echo $selectproduto['descricao_prod']; ?>">
          </div>
          <div class="form-group mb-3">
            <label class="sr-only" for="data-lacamento">Data de Lançamento: </label>
            <input class="form-control input-adm" type="text" name="data_lancamento" value="<?php echo $selectproduto['data_lancamento']; ?>">
          </div>
          <div class="form-group mb-3">
            <label class="sr-only" for="valor_un">Valor do Produto:</label>
            <input class="form-control input-adm" type="text" name="valor_un" value="<?php echo $selectproduto['valor_un']; ?>">
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
            <input class="form-control input-adm" type="number" name="estoque" value="<?php echo $selectproduto['estoque']; ?>">
          </div>
          <div class="form-group  mb-3">
            <label class="sr-only" for="categoria">Categoria</label>
            <select class="form-control input-adm" name="cod_categoria" id="cod_categoria">
              <option>Selecione Categoria</option>
              <?php foreach ($selectcategoria as $itemcategoria) {
                $categoria_atual = '';
                if ($itemcategoria['cod_categoria'] == $selectproduto['cod_categoria']) {
                  $categoria_atual = "selected";
                } ?>
                <option <?php echo $categoria_atual ?> value="<?php echo $itemcategoria['cod_categoria'] ?>"><?php echo $itemcategoria['nome_categoria'] ?></option>
              <?php }; ?>
            </select>
          </div>
          <div class="form-group  mb-3">
            <label class="sr-only" for="genero">Gênero</label>
            <select class="form-control input-adm" name="cod_genero" id="cod_genero">
              <option>Selecione Gênero</option>
              <?php foreach ($selectgenero as $itemgenero) {
                $genero_atual = "";
                if ($itemgenero['cod_genero'] == $selectproduto['cod_genero']) {
                  $genero_atual = "selected";
                } ?>
                <option <?php echo $genero_atual; ?> value="<?php echo $itemgenero['cod_genero'] ?>"><?php echo $itemgenero['nome_genero'] ?></option>
              <?php }; ?>
            </select>
          </div>
          <div class="form-check input-adm">
            <label for="destaque" class="pl-2">Produto em Destaque?</label><br>
            <input class=" input-destaque" type="radio" name="destaque" id="destaque1" <?php $destaqueatual = "";
                                                                                        if ($destaque1 == $selectproduto['destaque']) {
                                                                                          $destaqueatual = "checked";
                                                                                        } ?><?php echo $destaqueatual; ?> value="<?php echo $destaque1; ?>">
            <label class="form-check-label " for="destaque">Sim </label><br>
            <input class="input-destaque" type="radio" name="destaque" id="destaque0" <?php
                                                                                      if ($destaque0 == $selectproduto['destaque']) {
                                                                                        $destaqueatual = "checked";
                                                                                      } ?><?php echo $destaqueatual; ?> value="<?php echo $destaque0 ?>">
            <label class=" mb-2" for="destaque">Não</label>
          </div><br>
          <div class="form-check input-adm">
            <label for="promocao" class="pl-2">Produto em Promoção?</label><br>
            <input class=" input-destaque" type="radio" name="promocao" id="promocao1" <?php $promocaoatual = "";
                                                                                        if ($promocao1 == $selectproduto['promocao']) {
                                                                                          $promocaoatual = "checked";
                                                                                        } ?><?php echo $promocaoatual; ?> value="<?php echo $promocao1 ?>">
            <label class="form-check-label " for="promocao">Sim </label><br>
            <input class="input-destaque" type="radio" name="promocao" id="promocao2" <?php $promocaoatual = "";
                                                                                      if ($promocao0 == $selectproduto['promocao']) {
                                                                                        $promocaoatual = "checked";
                                                                                      } ?><?php echo $promocaoatual; ?> value="0">
            <label class=" mb-2" for="promocao">Não</label>
          </div><br>
          <div class="form-group mb-3">
            <label class="sr-only" for="valor_promocao">Valor Promoção:</label>
            <input class="form-control input-adm" type="text" name="valor_promocao" value="<?php echo $selectproduto['valor_promocao']; ?>">
          </div>
          <div class="form-check input-adm">
            <label for="situacao" class="pl-2">Situação do Produto em Estoque: </label><br>
            <input class=" input-destaque" type="radio" name="situacao" id="situacao0" <?php $situacaoatual = "";
                                                                                        if ($situacao0 == $selectproduto['situacao']) {
                                                                                          $situacaoatual = "checked";
                                                                                        } ?><?php echo $situacaoatual; ?> value="<?php echo $situacao0; ?>">
            <label class="form-check-label " for="situacao">Ativo </label><br>
            <input class="input-destaque" type="radio" name="situacao" id="situacao1" <?php $situacaoatual = "";
                                                                                      if ($situacao1 == $selectproduto['promocao']) {
                                                                                        $situacaoatual = "checked";
                                                                                      } ?><?php echo $situacaoatual; ?>value="<?php echo $situacao1; ?>">
            <label class=" mb-2" for="situacao">Inativo</label>
          </div><br>
          <div class="input-group d-flex justify-content-center">
            <input type="hidden" class="btn btn-dark btn-block btn-adm">
            <input class="btn btn-dark btn-block btn-adm mx-2 col-3" type="submit" value="Alterar" name="alterar-produto" id="alterar-produto">
            <input class="btn btn-dark btn-block btn-adm mx-2 col-3" type="reset" value="Limpar" id="limpar">
            <a class="btn btn-dark btn-block btn-adm mx-2 col-3" href="./prod-index.php">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
<?php require SITE_PATH . '/includes/footer-adm.php'; ?>

</html>