<?php
$dbhost="localhost";
$dbport=3306;
$dbuser="moi_mysql";
$dbpassword="384646m";
mysql_connect($dbhost, $dbuser, $dbpassword) or die("Ошибка подключения к базе данных: " . mysql_error());
mysql_query("SET NAMES 'utf8'");
mysql_select_db("moi");
?>
