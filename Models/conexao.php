<?php

$conf=[
  'host' => 'localhost',
  'user' => 'root',
  'pass' => 'usbw',
  'data' => 'games_com'];

  
$conn = new mysqli($conf['host'], $conf['user'], $conf['pass'], $conf['data']);
$conn->set_charset('utf8');

if ($conn->connect_error) {
    die('Conexão Falhou: '.$conn->connect_error);
}

return $conn;