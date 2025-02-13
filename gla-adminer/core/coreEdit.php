<?php session_start();

if(!isset($_GET['id'])) header('location:../../index.php');

require dirname(__DIR__) . '/core/Autoload.php';
Autoload::register('load');

define('WEBROOT',Config::get('url'));

$db = BDD\App::getBDD();