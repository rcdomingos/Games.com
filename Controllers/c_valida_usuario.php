<?php

include_once '../config.php';
session_start();
if (!isset($_SESSION['cod_usuario'])) {
  session_destroy();
  header("location:" . SITE_URL . "/Views/adm");
  exit;
}
