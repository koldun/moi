<?php
session_start();
error_reporting(E_ALL);
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/db_connect.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/functions/universal.php');

$items = isset($_GET['q']) && $_GET['q'] ? explode('/',trim($_GET['q'],'/')) : array();

if (!count($items)) $items[0] = 'index';

if (is_file($_SERVER['DOCUMENT_ROOT'].'/content/'.$items[0].'.php')) {
  require($_SERVER['DOCUMENT_ROOT'].'/content/'.$items[0].'.php');
} else {
  $error404 = true;
  require($_SERVER['DOCUMENT_ROOT'].'/content/404.php');
}

if (isset($error404) && $error404) {
  header("HTTP/1.0 404 Not Found");
}

require($_SERVER['DOCUMENT_ROOT'].'/content/blocks/template.php');
?>
