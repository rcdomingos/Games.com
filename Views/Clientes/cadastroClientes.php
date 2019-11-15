<?php
include_once '../../config.php';
$titlePage = "Cadastro de Clientes";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo SITE_URL ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo SITE_URL ?>/css/styles.css">

  <title>
    Games.com | <?php echo $titlePage ;?>
  </title>
</head>

<body>
  <!-- menu do site -->
  <?php include SITE_PATH .'/includes/menu.php';?>
  <!--conteudo da pagina -->
  <div class="principal-cadastro">
    <div class="nilblock">
    </div>
    <h2 class="caixa-cadastro">
      <span>CADASTRE-SE</span>
    </h2>
    <p class="paragrafo-cadastro">Crie uma conta rápido e fácil com a gente</p>
    <p class="divisor-cadastro linhadiv">
      <span>Preencha o formulário abaixo</span>
    </p>
  </div>
  </div>

  <div class="container caixa-formulario efeito">
    <div class="row align-items-center">
      <article class="mt-5 col-6">

        <form class="cadastroForm">

          <div class="form-group inputGroup">
            <label>Nome</label>
            <input type="text" class="form-control" id="nomecliente" aria-describedby="" placeholder="Digite seu nome">
          </div>

          <div class="form-group inputGroup">
            <label>E-mail</label>
            <input type="email" class="form-control" id="emailcliente" placeholder="Digite sua senha">
          </div>

          <div class="form-group inputGroup">
            <label>CPF</label>
            <input type="number" class="form-control" id="cpfcliente" aria-describedby="" placeholder="Digite seu CPF">
          </div>

          <div class="form-group inputGroup">
            <label>Celular</label>
            <input type="number" class="form-control" id="celularcliente" placeholder="Digite seu número">
          </div>

          <div class="form-group inputGroup">
            <label>Senha</label>
            <input type="password" class="form-control" id="senha" placeholder="Digite sua senha">
          </div>

          <button type="submit" class="btn btn-success botao-cadastro">Cadastrar</button>

        </form>

      </article>
    </div>
  </div>


  <!-- footer site -->
  <?php include SITE_PATH .'/includes/footer.php';?>
</body>

</html>