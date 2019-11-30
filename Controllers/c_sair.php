<?php
/* LOGOUT DA SISTEMA ADMINISTRATIVO || THAIS M. */
/*remover o warning do include e da session**/
if (!defined('SITE_URL')) {
    include_once '../config.php';
}

session_start();
session_destroy();
header("location:" . SITE_URL . "/Views/adm/index.php");
