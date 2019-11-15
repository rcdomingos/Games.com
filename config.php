<?php

// $dir = '/Games.com';
// $DIRNAME = explode("/", $_SERVER['REQUEST_URI']);
// $dir = rtrim("/". $DIRNAME[1], "/");

//print_r($DIRNAME);
$dir = "/Games.com";

// if (realpath("../root")) {
//     $dir = "/";
// } else {
//     $DIRNAME = explode('\\', realpath("config.php"));
//     $dir = $DIRNAME[count($DIRNAME)-2];
// }



define('DS', DIRECTORY_SEPARATOR);
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('SITE_ROOT', ROOT.$dir);
define('SITE_PATH', ROOT.$dir);
define('SITE_URL', 'http://'.$_SERVER['HTTP_HOST'].$dir);
