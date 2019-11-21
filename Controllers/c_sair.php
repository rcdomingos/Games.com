<?php
/* LOGOUT DA SISTEMA ADMINISTRATIVO || THAIS M. */
include_once '../config.php';
session_start();
session_destroy();
header("location:" . SITE_URL . "/Views/adm/index.php");
