<?php

include_once '../config.php';
session_start();
if (!isset($_SESSION['cod_usuario'])) {
  header("location:" . SITE_URL . "/Views/adm");
  session_destroy();
  exit;
}
