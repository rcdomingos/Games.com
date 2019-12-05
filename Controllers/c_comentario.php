<?php
/*remover o warning do include e da session**/
if (!defined('SITE_URL')) {
    include_once '../config.php';
}

$conn = require SITE_PATH . '/Models/conexao.php';

include SITE_PATH . '/Models/m_comentario.php';

if (isset($_POST['AddComentario'])) {
    $dados = $_POST;
    if (cadastrarComentario($conn, $dados)) {
        header("location:" . SITE_URL . "/Views/produtos/detalhe.php?jogo=" . $_POST['cod_produto']);
    } else {
        /** max 250 char */
        $msgErro = "Ocorreu um erro para inserir seu comentario no banco, tente novamente";
        header("location:" . SITE_URL . "/Views/home/PaginaErro.php?erro=$msgErro");
    }
}

if (isset($_GET['cod_comentario'])) {
   $codComentario = $_GET['cod_comentario'];
    if (deletarComentario($conn, $codComentario)) {
        header("location:" . SITE_URL . "/Views/produtos/detalhe.php?jogo=" . $_GET['cod_produto']);
    } else {
        /** max 250 char */
        $msgErro = "Ocorreu um erro para excluir seu comentario, tente novamente";
        header("location:" . SITE_URL . "/Views/home/PaginaErro.php?erro=$msgErro");
    }
}
