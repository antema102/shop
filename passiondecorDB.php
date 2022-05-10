<?php
session_start();

$db_host        = '51.68.35.180';
$db_user        = 'passiondecor_ro';
$db_pass        = 'cheiNechaiviix3gioz5';
$db_database    = 'passiondecor_prod'; 
$db_port        = '3306';

$link = mysqli_connect($db_host,$db_user,$db_pass,$db_database,$db_port);
var_dump($link);exit();
$dbroot = '51.68.35.180';
$dbuser = 'passiondecor_ro' ;
$dbpass = 'cheiNechaiviix3gioz5'; 
$dbname = 'passiondecor_prod';
$db_port        = '3306';
$link = mysqli_connect($dbroot, $dbuser, $dbpass) or die('<h1>Impossible de trouver le serveur</h1>');
mysqli_select_db($link, $dbname) or die('<h1>Impossible de trouver la base de données</h1>');

define("url", "/");
define("url2", "/"); 

?>