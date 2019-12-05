<?php
/*remover o warning do include e da session**/
if (!defined('SITE_URL')) {
  include_once '../../config.php';
}

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$jogoID = $_GET['id'];
$infosJogo = buscarDetalhesJogo($jogoID);

$titlePage = ($infosJogo['name']);

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
    <article>
      <header id="headerLançamentos" class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div id="box-jogo-shadow">
              <span>
                <h1><?php echo $infosJogo['name'] ?> </h1>
                <p><?php echo $infosJogo['developers'] ?></p>
              </span>
              <div id="box-jogo-img" style="background-image: url('<?php echo $infosJogo['background'] ?>')">
              </div>
            </div>
          </div>
        </div>
      </header>

      <div class="container">
        <div class="row">
          <div class="col">
            <p class="text-right ft-laranja"><?php echo $infosJogo['genres'] ?> </p>
            <span>
              <p class="text-muted"><small>website: </small><?php echo $infosJogo['website'] ?></p>
              <p class="mt-n3 text-muted"><small>released: </small><?php echo $infosJogo['released'] ?></p>
            </span>
            <span class="ft-branca">
              <p><?php echo $infosJogo['description'] ?></p>
            </span>
            <p class="ft-laranja"><small>TAGs: <?php echo $infosJogo['tags'] ?></small></p>
          </div>
        </div>
        <div class="row">
          <p class="text-muted text-right"><small>Fonte dos lançamentos direto do rawg.io</small></p>
        </div>
      </div>

    </article>
  </main>
  <!-- footer site -->
  <?php include SITE_PATH . '/includes/footer.php'; ?>
  </body>

  </html>


<?php
// FUÇÃO PARA BUSCAR OS JOGOS NA API
function buscarDetalhesJogo($jogoID)
{
  $urlRawg = "https://api.rawg.io/api/games/$jogoID";
  $json = file_get_contents($urlRawg);
  $dados = json_decode($json, false);

  if ($dados) {
    /**Montar as variaveis com genero e tags do jogo */
    $genres = '';
    $tags = '';
    foreach ($dados->genres as $genre) {
      $genres .= $genre->name . ", ";
    };

    foreach ($dados->tags as $tag) {
      $tags .= $tag->name . ", ";
    };

    $infosJogo = array('id' => $dados->id,
      'name' => $dados->name,
      'description' => $dados->description,
      'released' => $dados->released,
      'website' => $dados->website,
      'background' => $dados->background_image,
      'developers' => $dados->developers[0]->name,
      'genres' => rtrim($genres, ", "),
      'tags' => rtrim($tags, ", "));
    return $infosJogo;
  } else {
    echo "Erro na busca do jogo usando a API";
    return false;
  }
}