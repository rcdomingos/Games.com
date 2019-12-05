<?php
include_once '../../config.php';
session_start();

if (!isset($_SESSION['cod_cliente'])) {
  header("location:" . SITE_URL . "/Views/Clientes/loginCliente.php");
}

$cod_jogo = $_GET['jogo'];
$nome_jogo = $_GET['nome'];

$titlePage = "Adicionar Comentario";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet"
        href="<?php echo SITE_URL ?>/css/bootstrap.min.css">
  <link rel="stylesheet"
        href="<?php echo SITE_URL ?>/css/styles.css">

  <title><?php echo $titlePage; ?>
  </title>
</head>

<body>

<?php include SITE_PATH . '/includes/menu.php'; ?>

<main class="min-h-50 pb-5">
  <div class="container col-8 mt-5 pt-5 pb-5 ">
    <div class="row justify-content-md-center text-center ">
      <h1>Avalie o jogo: <?php echo $nome_jogo ?>
      </h1>
    </div>
    <div class="row justify-content-md-center mt-3">
      <div class="col-md-6">
        <form
          action='<?php echo SITE_URL ?>/Controllers/c_comentario.php'
          method="post">
          <div class="form-group mb-3">
            <label class="sr-only" for="titulo">Titulo</label>
            <input class="form-control input-adm" type="text" name="titulo_comentario"
                   placeholder="Titulo do Comentário" required>
          </div>
          <div class="form-group mb-3">
            <label class="sr-only" for="avaliacao">Avaliação</label>
            <select class="form-control input-adm" name="avaliacao" required>
              <option value="">Selecione uma Nota</option>
              <option value="1">1-Ruim</option>
              <option value="2">2-Mais ou Menos</option>
              <option value="3">3-Legalzinho</option>
              <option value="4">4-Da hora</option>
              <option value="5">5-Muito Top</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label class="sr-only" for="comentario">Comentário</label>
            <textarea class="form-control input-adm" name="comentario" id="comentario" cols="49" rows="5"
                      aria-describedby="comentariohelp" placeholder="Escreva seu Comentário" required></textarea>
            <small id="passwordHelpInline" class="text-right text-muted">
              Comentário Maximo 255 caracteres. Restan <span id="qtdComentario">255</span> caracteres.
            </small>
          </div>
          <div class="d-flex justify-content-center">
            <input class="btn btn-dark btn-block " type="hidden">
            <input class="btn btn-dark btn-block btn-adm mx-2 col-3" type="submit" value="Avaliar"
                   name="AddComentario" id="AddComentario">
            <input class="btn btn-dark btn-block btn-adm mx-2 col-3" type="reset" value="Limpar" id="limpar">
            <a class="btn btn-dark btn-block btn-adm mx-2 col-3"
               href="<?php echo SITE_URL ?>/Views/produtos/detalhe.php?jogo=<?php echo $cod_jogo ?>">Cancelar</a>
          </div>
          <input type="hidden" name="cod_cliente" value="<?php echo $_SESSION['cod_cliente'] ?>">
          <input type="hidden" name="data_comentario" value="<?php echo date("Y-m-d") ?>">
          <input type="hidden" name="cod_produto" value="<?php echo $cod_jogo ?>">
        </form>
      </div>
    </div>
  </div>
</main>

<!-- footer site -->
<?php include SITE_PATH . '/includes/footer.php'; ?>
<script src="../../js/jquery-3.4.1.min.js"></script>
<script>
  // validação para bloquear os comentarios muito grande
    $('#comentario').keyup(function (e) {
        var qtdDigitada = $(this).val().length;
        $('#qtdComentario').html(255 - qtdDigitada);
        if(qtdDigitada >= 255){
            $(this).attr('disabled', 'disabled');
        }
    });
    
    $('#limpar').click(function (e) {
        $(this).attr('disabled', 'enable');
        
    })
</script>
</body>

</html>