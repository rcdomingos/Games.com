<?php
/*remover o warning do include e da session**/
if (!defined('SITE_URL')) {
  include_once '../../config.php';
}

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (isset($_GET['page'])) {
  $urlApi = $_GET['page'];
  $apiJogosLancamentos = buscarJogosApiRawg($urlApi);
} else {
  $apiJogosLancamentos = buscarJogosApiRawg(null);
}

$DtAtual = new DateTime();
$DtFinal = new DateTime('-1 month');
$titlePage = "Ultimos Lançamentos";

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
      Games.com | <?php echo $titlePage; ?>
    </title>
  </head>

  <body class="bk-escuro">
  <!-- menu do site -->
  <?php include SITE_PATH . '/includes/menu.php'; ?>
  <!--conteudo da pagina -->
  <main class="bk-escuro">
    <section>
      <div class="container mt-5">
        <div class="row">
          <div class="col-12">
            <div class="tt-header-wrap">
              <div class="tt-header">
                <h2>Lançamentos</h2>
                <p>Confira os últimos lançamentos de <?php echo $DtFinal->format('d-m-Y') ?>
                  até <?php echo $DtAtual->format('d-m-Y') ?>.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-around">
          <?php foreach ($apiJogosLancamentos['jogos'] as $jogo) { ?>
            <div class="col-sm-6 ">
              <a class="link-none" href="./jogosLancamentosDetalhe.php?id=<?php echo $jogo['id'] ?>">
                <div class="card bg-transparent mb-5 text-center border-0 card-jogo pt-2">
                  <img class="card-img-top px-3 " src="<?php echo $jogo['img'] ?>"
                       alt="Cover: <?php echo $jogo['nome'] ?>">
                  <div class="card-body">
                    <h5 class="card-title ft-branca "> <?php echo $jogo['nome'] ?>
                    </h5>
                    <p class="card-text ft-branca">Plataforma(s): <?php echo $jogo['console'] ?>
                    </p>
                    <p class="card-text ft-branca">Avaliação: <?php echo $jogo['rating'] ?>
                    </p>
                    <p class="card-text"><small class="text-muted">Lançamento:
                        <?php
                        $dataLancamento = new DateTime($jogo['released']);
                        echo date_format($dataLancamento, 'd-m-Y'); ?>
                      </small>
                    </p>
                    </p>
                  </div>
                </div>
              </a>
            </div>

          <?php } ?>
        </div>
        <p class="text-muted text-right"><small>Fonte dos lançamentos direto do rawg.io</small></p>
      </div>
    </section>
    <!-- paginação dos lançamentos -->
    <nav aria-label="Navegação de página exemplo">
      <ul class="pagination justify-content-center ">
        <li class="page-item">
          <a class="page-link bk-laranja ft-escuro"
             href="./jogosLancamentos.php<?php echo $apiJogosLancamentos['previous'] ?>">Anterior</a>
        </li>
        <li class="page-item">
          <a class="page-link bk-laranja ft-escuro"
             href="./jogosLancamentos.php<?php echo $apiJogosLancamentos['next'] ?>">Próximo</a>
        </li>
      </ul>
    </nav>
  </main>
  <!-- footer site -->
  <?php include SITE_PATH . '/includes/footer.php'; ?>
  </body>

  </html>


<?php
// FUÇÃO PARA BUSCAR OS JOGOS NA API
function buscarJogosApiRawg($pagina)
{
  $DtAtual = new DateTime();
  $DtFinal = new DateTime('-1 month');

  $dataIn = $DtFinal->format('Y-m-d');
  $dataFim = $DtAtual->format('Y-m-d');
  $platforms = '1,7,18';
  $page = $pagina;

  if ($page == null) {
    $urlRawg = "https://api.rawg.io/api/games?dates=$dataIn,$dataFim&platforms=$platforms";
  } else {
    $urlRawg = "https://api.rawg.io/api/games?dates=$dataIn,$dataFim&platforms=$platforms&page=$page";
  }

  $json = file_get_contents($urlRawg);
  $dados = json_decode($json, false);

  $next = verificarUrlPage($dados->next);
  $previous = verificarUrlPage($dados->previous);

  foreach ($dados->results as $key => $jogo) {
    $console = '';
    foreach ($jogo->platforms as $platfom) {
      $console .= $platfom->platform->name . ", ";
    }
    $jogos[$key] = array('id' => $jogo->id, 'nome' => $jogo->name, 'img' => $jogo->background_image,
      'released' => $jogo->released, 'rating' => $jogo->rating, 'console' => rtrim($console, ", "));
  }
  $listaJogos = array('jogos' => $jogos, 'next' => $next, 'previous' => $previous);

  return $listaJogos;
}

// FUNÇÃO PARA VERIFICAR AS PAGINAS NEXT E PREVIEW
function verificarUrlPage($urlNext)
{
  $page = false;
  $paginasArray = explode("&", $urlNext);
  foreach ($paginasArray as $key => $value) {
    if (strpos($value, "page=") !== false) {
      $page = "?" . $value;
    }
  }
  if (!$page) {
    $page = null;
  }
  return $page;
}