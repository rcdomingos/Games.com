<?php
/*remover o warning do include e da session**/
if (!defined('SITE_URL')) {
    include_once '../config.php';
}

session_start();
if (!isset($_SESSION['cod_usuario'])) {
    session_destroy();
    header("location:" . SITE_URL . "/Views/adm");
    exit;
}
