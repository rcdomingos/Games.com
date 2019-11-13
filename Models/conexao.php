<?php

$conf = include $_SERVER['DOCUMENT_ROOT'] . '/Games.com/config.php';

$conn = new mysqli($conf['host'], $conf['user'], $conf['pass'], $conf['data']);
$conn->set_charset('utf8');

if ($conn->connect_error) {
    die('Conexão Falhou: '.$conn->connect_error);
}

return $conn;