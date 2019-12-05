<?php
/*remover o warning do include e da session**/
if (!defined('SITE_URL')) {
  include_once '../config.php';
}

$conn = require SITE_PATH . '/Models/conexao.php';

// var_dump($conn);
/**funçoes usadas nos produtos*/
include SITE_PATH . '/Models/m_produto.php';
include SITE_PATH . '/Models/m_comentario.php';


/**Verificar se foi selecionado o produto para mostrar */
if (isset($DetalheProduto)) {
    if ($DetalheProduto) {
        $infoProduto = listarProduto($DetalheProduto, $conn);
        $Comentarios = carregarComentarios($conn, $DetalheProduto);
        $notaMedia = calculaNotaMedia($Comentarios);
    } else {
        header("location:" . SITE_URL . "/Views/home/index.php");
    }
}

/**verificar se esta na pagina todos os jogos e se teve pesquisa */
if (isset($jogoPesquisa)) {
    $listaTodosJogos = pesquisarJogo($conn, $jogoPesquisa);
} elseif (isset($listaTodosJogos)) {
    $listaTodosJogos = carregarJogos($conn, $limit, $offset);
}

/**Listar os jogos da pagina playtation */
if (isset($listaJogosPlaystation)) {
    $listaJogosPlaystation = carregarJogosCategoria($conn, $codCategoria, $limit, $offset);
}

/**Listar os jogos da pagina xbox */
if (isset($listaJogosXbox)) {
    $listaJogosXbox = carregarJogosCategoria($conn, $codCategoria, $limit, $offset);
}

/**Listar os jogos da pagina nintendo */
if (isset($listaJogosNintendo)) {
    $listaJogosNintendo = carregarJogosCategoria($conn, $codCategoria, $limit, $offset);
}

if (isset($itensProdHome)) {
  $itensProdHome = carregarprodutos($conn);
}
// if (isset($listaTodosJogos)) {
//   $listaTodosJogos = carregarJogos($conn);
//   // print_r($listaTodosJogos);
// }

/* ================================================================================ */

/*  CADASTRAR O GÊNERO DO PRODUTO */
if (isset($_POST['cadastrar-genero'])) {
    $dados = [];
    foreach ($_POST as $key => $value) {
        if ($key != "cadastrar-genero") {
            $dados[$key] = ($value);
        }
    }

    //  print_r($dados);
    if (cadastargenero($dados, $conn)) {
        header("location:" . SITE_URL . "/Views/produtos/genero-index.php");
    } else {
        echo 'Erro para cadastrar dado no Banco';
    }
    exit;
}

/* ================================================================================ */

/* ALTERAR GENERO NO BANCO */
if (isset($_POST['alterar-genero'])) {
    $dados = [];
    foreach ($_POST as $key => $value) {
        if ($key != "alterar-genero") {
            $dados[$key] = ($value);
        }
    }
    // print_r($dados);
    // print_r($_POST);
    if (alterargenero($dados, $conn)) {
        header("location:" . SITE_URL . "/Views/produtos/genero-index.php");
    } else {
        echo 'Erro ao alterar o cadastro no banco';
    }
    exit;
}

/* LISTAR OS GÊNEROS CADASTRADOS NA INDEX GÊNERO */
if (isset($generos)) {
  $generos = listargenero($conn);
}

/* LISTAR GÊNERO NO FORMULARIO DE CADASTRO DE PRODUTOS */
if (isset($selectgenero)) {
  $selectgenero = selectgenero($conn);
}

/* ================================================================================ */

/*  CADASTRAR CATEGORIA DO PRODUTO */
if (isset($_POST['cadastrar-categoria'])) {
  $dados = [];
  foreach ($_POST as $key => $value) {
    if ($key != "cadastrar-categoria") {
      $dados[$key] = ($value);
    }
  }

  if (cadastrarcategoria($dados, $conn)) {
    header("location:" . SITE_URL . "/Views/produtos/categoria-index.php");
  } else {
    echo 'Erro para cadastrar dado no Banco';
  }
  exit;
}

/* ALTERAR CATEGORIA NO BANCO */
if (isset($_POST['alterar-categoria'])) {
    $dados = [];
    foreach ($_POST as $key => $value) {
        if ($key != "alterar-categoria") {
            $dados[$key] = ($value);
        }
    }
    // print_r($dados);
    // print_r($_POST);
    if (alterarcategoria($dados, $conn)) {
        header("location:" . SITE_URL . "/Views/produtos/categ-index.php");
    } else {
        echo 'Erro ao alterar o cadastro no banco';
    }
    exit;
}

/* FUNÇÃO LISTAR CATEGORIA NA INDEX */
if (isset($categorias)) {
  $categorias = listarcategoria($conn);
}

/* FUNÇÃO PARA LISTAR AS CATEGORIAS NA PAGINA DE CADASTRO DE PRODUTOS || THAIS M. */
if (isset($selectcategoria)) {
  $selectcategoria = selectcategoria($conn);
}


/*  CADASTRAR OS PRODUTOS NO BANCO || THAIS M. */
if (isset($_POST['cadastrar-produto'])) {
  $dados = [];
  foreach ($_POST as $key => $value) {
    if ($key != "cadastrar-produto") {
      $dados[$key] = ($value);
    }
  }

  $nomecover = publicarImagem($_FILES['cover_img']);
  $nomebanner = publicarImagem($_FILES['banner_img']);

  $dados['cover_img'] = $nomecover;
  $dados['banner_img'] = $nomebanner;

  //print_r($dados);

    // print_r($nomecover);

    if (cadastarproduto($dados, $conn)) {
        header("location:" . SITE_URL . "/Views/produtos/prod-index.php");
    } else {
        echo 'Erro para cadastrar dado no Banco';
    }
    exit;
}

/* ALTERAR PRODUTO NO BANCO  ||  THAIS M.  */
if (isset($_GET['produto'])) {
  $selectproduto = selectalterarproduto($conn, $cod_produto);
}
if (isset($_POST['alterar-produto'])) {
  $dados = [];
  foreach ($_POST as $key => $value) {
    if ($key != "alterar-produto") {
      $dados[$key] = ($value);
    }
  }

  $alternomecover = alterImagem($_FILES['cover_img']);
  $alternomebanner = alterImagem($_FILES['banner_img']);

  $dados['cover_img'] =  $alternomecover;
  $dados['banner_img'] = $alternomebanner;

  // print_r($alternome_banner);

  // print_r($dados);
  // print_r($_FILES);
  // print_r($_POST);
  if (alterarproduto($conn, $dados)) {
    header("location:" . SITE_URL . "/Views/produtos/prod-index.php");
  } else {
    echo 'Erro ao alterar o cadastro no banco';
  }
  exit;
}
