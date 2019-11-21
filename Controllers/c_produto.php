<?php

include_once '../config.php';


$conn = require SITE_PATH . '/Models/conexao.php';


// var_dump($conn);
/**funçoes usadas nos produtos*/
include SITE_PATH . '/Models/m_produto.php';


/**Verificar se foi selecionado o produto para mostrar */
if (isset($DetalheProduto)) {
    if ($DetalheProduto) {
        $infoProduto = listarProduto($DetalheProduto, $conn);
    } else {
        header("location:" . SITE_URL . "/Views/home/index.php");
    }
}

/**verificar se esta na pagina todos os jogos e se teve pesquisa */
if ($jogoPesquisa) {
    $listaTodosJogos = pesquisarJogo($conn, $jogoPesquisa);
} elseif (isset($listaTodosJogos)) {
    $listaTodosJogos = carregarJogos($conn);
}

/**Listar os jogos da pagina playtation */
if (isset($listaJogosPlaystation)) {
    $listaJogosPlaystation = carregarJogosCategoria($conn, $codCategoria);
}

/**Listar os jogos da pagina xbox */
if (isset($listaJogosXbox)) {
    $listaJogosXbox = carregarJogosCategoria($conn, $codCategoria);
}

/**Listar os jogos da pagina nintendo */
if (isset($listaJogosNintendo)) {
    $listaJogosNintendo = carregarJogosCategoria($conn, $codCategoria);
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

/* ALTERAR GENERO NO BANCO */
if (isset($_POST['alterar-genero'])) {
    $dados = [];
    foreach ($_POST as $key => $value) {
        if ($key != "alterar-genero") {
            $dados[$key] = ($value);
        }
    }
    if (alterargenero($dados, $conn)) {
        header("location:" . SITE_URL . "/Views/produtos/genero-index.php");
    } else {
        echo 'Erro ao alterar o cadastro no banco';
    }
    exit;
}

/* LISTAR OS GÊNEROS CADASTRADOS NA INDEX GÊNERO */
$generos = listargenero($conn);

/* ================================================================================ */

/*  CADASTRAR CATEGORIA DO PRODUTO */
if (isset($_POST['cadastrar-categoria'])) {
    $dados = [];
    foreach ($_POST as $key => $value) {
        if ($key != "cadastrar-categoria") {
            $dados[$key] = ($value);
        }
    }

    if (cadastarcategoria($dados, $conn)) {
        header("location:" . SITE_URL . "/Views/produtos/categoria-index.php");
    } else {
        echo 'Erro para cadastrar dado no Banco';
    }
    exit;
}

/* LISTAR AS CATEGORIAS CADASTRADAS NA INDEX CATEGORIA */
$categorias = listarcategoria($conn);


/* FUNÇÃO PARA ALTERAR GENERO */
// if (isset($_POST['alterar-genero'])) {
//   $dados = [];
//   foreach ($_POST as $key => $value) {
//     if ($key != "alterar") {
//       $dados[$key] = utf8_decode($value);
//     }
//   }
//   if (alterargenero($dados, $conn)) {
//     header("location:$conf[url]/Views/produtos/genero-index.php");
//   } else {
//     echo 'Erro para alterar o genero no banco';
//   }
//   exit;
// }

/* ================================================================================ */
