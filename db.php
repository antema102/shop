<?php
ini_set("display_errors","on");
if(!isset($_SESSION))
{
    session_start();
}

$dbroot = 'localhost';
$dbuser = 'root' ;
$dbpass = ''; 
$dbname = 'project';

$link = mysqli_connect($dbroot, $dbuser, $dbpass) or die('<h1>Impossible de trouver le serveur</h1>');
mysqli_select_db($link, $dbname) or die('<h1>Impossible de trouver la base de données</h1>');

if(!defined("url")) define('url',"http://localhost/stage-framework/");
//define("url2", "http://localhost/stage-framework/"); 

?>